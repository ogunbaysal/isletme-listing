<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingMedia extends Model
{
    use HasFactory;

    public const TYPE_IMAGE = 'image';
    public const TYPE_VIDEO = 'video';
    public const TYPE_VIRTUAL_TOUR = 'virtual_tour';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'listing_id',
        'disk',
        'path',
        'type',
        'caption',
        'alt_text',
        'sort_order',
        'is_primary',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_primary' => 'bool',
        'metadata' => 'array',
    ];

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
