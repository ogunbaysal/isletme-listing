<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class BlogPost extends Model
{
    use HasFactory;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PENDING = 'pending';
    public const STATUS_SCHEDULED = 'scheduled';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_ARCHIVED = 'archived';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'author_id',
        'owner_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'body',
        'language',
        'status',
        'is_featured',
        'published_at',
        'approved_at',
        'featured_at',
        'meta',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'bool',
        'published_at' => 'datetime',
        'approved_at' => 'datetime',
        'featured_at' => 'datetime',
        'meta' => 'array',
        'metadata' => 'array',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function media(): HasMany
    {
        return $this->hasMany(BlogMedia::class);
    }

    public function approvalLogs(): HasMany
    {
        return $this->hasMany(BlogApprovalLog::class);
    }

    public function collections(): MorphToMany
    {
        return $this->morphToMany(Collection::class, 'item', 'collection_items')->using(CollectionItem::class)->withPivot(['sort_order', 'meta']);
    }
}
