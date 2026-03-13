<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'report_id',
        'full_name',
        'content',
        'ip_address',
        'is_anonymous',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'created_at' => 'datetime',
    ];

    /**
     * ------------------------------------------------------
     * Relationship (BelongsTo)
     * ------------------------------------------------------
     */
    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * -------------------------------------------------------
     * Helpers
     * -------------------------------------------------------
     */
    public function canModify(string $ip): bool
    {
        return $this->ip_address === $ip
            && $this->created_at->diffInMinutes(now()) <= 15;
    }

    public function getDisplayNameAttribute(): string
    {
        if ($this->is_anonymous || empty($this->full_name)) {
            return 'Người dùng ẩn danh';
        }

        return $this->full_name;
    }
}
