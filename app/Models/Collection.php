<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;

class Collection extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_ARCHIVED = 'archived';

    public const TYPE_LISTING = 'listing';
    public const TYPE_BLOG = 'blog';
    public const TYPE_MIXED = 'mixed';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'collection_type',
        'status',
        'is_featured',
        'published_at',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'bool',
        'published_at' => 'datetime',
        'metadata' => 'array',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(CollectionItem::class);
    }

    public function listings(): MorphedByMany
    {
        return $this->morphedByMany(Listing::class, 'item', 'collection_items')->using(CollectionItem::class)->withPivot(['sort_order', 'meta']);
    }

    public function blogPosts(): MorphedByMany
    {
        return $this->morphedByMany(BlogPost::class, 'item', 'collection_items')->using(CollectionItem::class)->withPivot(['sort_order', 'meta']);
    }
}
