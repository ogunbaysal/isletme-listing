<?php

namespace Database\Seeders;

use App\Models\AdminProfile;
use App\Models\Amenity;
use App\Models\AnalyticsSnapshot;
use App\Models\Announcement;
use App\Models\AuditLog;
use App\Models\BlogApprovalLog;
use App\Models\BlogCategory;
use App\Models\BlogMedia;
use App\Models\BlogPost;
use App\Models\Collection;
use App\Models\Invoice;
use App\Models\Listing;
use App\Models\ListingApprovalLog;
use App\Models\ListingDraft;
use App\Models\ListingMedia;
use App\Models\ListingView;
use App\Models\OwnerProfile;
use App\Models\PlaceType;
use App\Models\PaymentTransaction;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use App\Models\Tag;
use App\Models\TicketAssignment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUsers = User::factory()->count(3)->create();
        $adminUsers->first()->update([
            'name' => 'Platform Admin',
            'email' => 'admin@example.com',
        ]);

        $adminUsers->each(fn (User $admin) => AdminProfile::factory()->for($admin)->create());

        $ownerUsers = User::factory()->count(8)->create();
        $ownerUsers->each(fn (User $owner) => OwnerProfile::factory()->for($owner)->create());

        // Create place types first using specific seeder
        $this->call([PlaceTypeSeeder::class]);
        $placeTypes = PlaceType::all();

        // Create real Muğla listings after setting up users and place types
        $this->call([MuglaListingSeeder::class]);
        $amenities = Amenity::factory()->count(12)->create();
        $tags = Tag::factory()->count(10)->create();
        $plans = SubscriptionPlan::factory()->count(3)->create();

        $ownerUsers->each(function (User $owner) use ($plans) {
            $subscription = Subscription::factory()
                ->for($owner, 'owner')
                ->for($plans->random(), 'plan')
                ->create();

            $subscription->invoices()->saveMany(
                Invoice::factory()->count(2)->make()
            )->each(fn (Invoice $invoice) => $invoice->transactions()->save(PaymentTransaction::factory()->make()));
        });

        $listings = Listing::factory()
            ->count(15)
            ->state(function () use ($ownerUsers, $placeTypes) {
                $owner = $ownerUsers->random();
                $placeType = $placeTypes->random();

                return [
                    'owner_id' => $owner->id,
                    'place_type_id' => $placeType->id,
                    'status' => Arr::random([
                        Listing::STATUS_PENDING,
                        Listing::STATUS_APPROVED,
                        Listing::STATUS_DRAFT,
                    ]),
                ];
            })
            ->create();

        $listings->each(function (Listing $listing) use ($amenities, $tags, $adminUsers) {
            ListingMedia::factory()->count(3)->for($listing, 'listing')->create();
            ListingApprovalLog::factory()->for($listing, 'listing')->for($adminUsers->random(), 'admin')->create();
            ListingView::factory()->count(5)->for($listing, 'listing')->create();

            $listing->amenities()->syncWithoutDetaching(
                $amenities->random(rand(3, 6))->mapWithKeys(fn ($amenity, $index) => [
                    $amenity->id => ['sort_order' => $index],
                ])->all()
            );

            $listing->tags()->syncWithoutDetaching(
                $tags->random(rand(2, 4))->mapWithKeys(fn ($tag) => [
                    $tag->id => ['added_by' => $listing->owner_id],
                ])->all()
            );

            ListingDraft::factory()->for($listing->owner, 'owner')->create([
                'listing_id' => fake()->boolean(30) ? $listing->id : null,
            ]);
        });

        $blogCategories = BlogCategory::factory()->count(4)->create();
        $blogPosts = BlogPost::factory()->count(10)->state(function () use ($adminUsers, $ownerUsers, $blogCategories) {
            return [
                'author_id' => $adminUsers->random()->id,
                'owner_id' => $ownerUsers->random()->id,
                'category_id' => $blogCategories->random()->id,
            ];
        })->create();

        $blogPosts->each(function (BlogPost $post) use ($adminUsers) {
            BlogMedia::factory()->count(2)->for($post, 'post')->create();
            BlogApprovalLog::factory()->for($post, 'post')->for($adminUsers->random(), 'admin')->create();
        });

        $collections = Collection::factory()->count(3)->create();
        $collections->each(function (Collection $collection) use ($listings, $blogPosts) {
            $listingItems = $listings->random(3)->map(fn (Listing $listing) => [
                'item_type' => Listing::class,
                'item_id' => $listing->id,
                'sort_order' => rand(1, 10),
                'meta' => ['source' => 'seed'],
            ]);

            $blogItems = $blogPosts->random(2)->map(fn (BlogPost $post) => [
                'item_type' => BlogPost::class,
                'item_id' => $post->id,
                'sort_order' => rand(1, 10),
                'meta' => ['source' => 'seed'],
            ]);

            $collection->items()->createMany($listingItems->merge($blogItems)->all());
        });

        SupportTicket::factory()->count(5)->create()->each(function (SupportTicket $ticket) {
            SupportMessage::factory()->count(3)->for($ticket, 'ticket')->create();
            TicketAssignment::factory()->for($ticket, 'ticket')->create();
        });

        Announcement::factory()->count(3)->create();
        AuditLog::factory()->count(10)->create();
        AnalyticsSnapshot::factory()->count(6)->create();
    }
}
