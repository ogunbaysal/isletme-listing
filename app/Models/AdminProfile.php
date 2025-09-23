<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminProfile extends Model
{
    use HasFactory;

    public const ROLE_MANAGER = 'manager';
    public const ROLE_MODERATOR = 'moderator';
    public const ROLE_SUPPORT = 'support';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'role',
        'permissions',
        'department',
        'metadata',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'permissions' => 'array',
        'metadata' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
