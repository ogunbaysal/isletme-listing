<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CollectionItem extends MorphPivot
{
    /**
     * @var string
     */
    protected $table = 'collection_items';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'collection_id',
        'item_id',
        'item_type',
        'sort_order',
        'meta',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'meta' => 'array',
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }

    public function item(): MorphTo
    {
        return $this->morphTo();
    }
}
