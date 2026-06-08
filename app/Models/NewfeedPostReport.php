<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewfeedPostReport extends Model
{
    public $timestamps = false;

    protected $table = 'newfeed_post_reports';

    protected $fillable = [
        'post_id',
        'reporter_id',
        'reason',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(NewfeedPost::class, 'post_id');
    }

    public function reporter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}
