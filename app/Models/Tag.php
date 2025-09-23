<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'context',
        'description',
        'is_active',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'bool',
        'metadata' => 'array',
    ];

    public function listings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class)
            ->using(ListingTag::class)
            ->withPivot(['added_by']);
    }
}
