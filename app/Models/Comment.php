<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'report_id',
        'full_name',
        'content'
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
}
