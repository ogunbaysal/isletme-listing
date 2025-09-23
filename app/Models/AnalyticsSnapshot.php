<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsSnapshot extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'metric',
        'value',
        'captured_at',
        'dimensions',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'value' => 'decimal:2',
        'captured_at' => 'datetime',
        'dimensions' => 'array',
        'metadata' => 'array',
    ];
}
