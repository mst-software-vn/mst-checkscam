<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'type',
        'reporter_name',
        'reporter_contact',
        'target_id',
        'target_name',
        'target_bank',
        'category',
        'description',
        'evidence_images',
        'status',
        'rejection_reason',
        'view_count',
        'search_count',
        'moderator_id',
        'slug'
    ];

    protected $casts = [
        'evidence_images' => 'array',
        'view_count' => 'integer',
        'search_count' => 'integer'
    ];

    /**
     * ------------------------------------------------------
     * Relationship (BelongsTo & HasMany)
     * ------------------------------------------------------
     */
    public function moderator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }

    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'report_id');
    // }

    /**
     * ------------------------------------------------------
     * Helper Methods
     *
     * @return boolean
     * ------------------------------------------------------
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }

    public function incrementSearchCount(): void
    {
        $this->increment('search_count');
    }
}
