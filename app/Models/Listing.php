<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Listing extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_SUSPENDED = 'suspended';

    public const VISIBILITY_PUBLIC = 'public';
    public const VISIBILITY_PRIVATE = 'private';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'owner_id',
        'place_type_id',
        'title',
        'slug',
        'summary',
        'description',
        'location',
        'coordinates',
        'address_line1',
        'address_line2',
        'city',
        'region',
        'country',
        'postal_code',
        'contact_email',
        'contact_phone',
        'website_url',
        'status',
        'visibility',
        'primary_language',
        'is_featured',
        'published_at',
        'expires_at',
        'seo',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'location' => 'array',
        'coordinates' => 'array',
        'seo' => 'array',
        'metadata' => 'array',
        'is_featured' => 'bool',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function placeType(): BelongsTo
    {
        return $this->belongsTo(PlaceType::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(ListingMedia::class);
    }

    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class)
            ->using(ListingAmenity::class)
            ->withPivot(['sort_order']);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
            ->using(ListingTag::class)
            ->withPivot(['added_by']);
    }

    public function approvalLogs(): HasMany
    {
        return $this->hasMany(ListingApprovalLog::class);
    }

    public function drafts(): HasMany
    {
        return $this->hasMany(ListingDraft::class);
    }

    public function collections(): MorphToMany
    {
        return $this->morphToMany(Collection::class, 'item', 'collection_items')->using(CollectionItem::class)->withPivot(['sort_order', 'meta']);
    }

    public function views(): HasMany
    {
        return $this->hasMany(ListingView::class);
    }
}
