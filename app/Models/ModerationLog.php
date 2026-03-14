<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModerationLog extends Model
{
    protected $table = 'moderation_logs';

    protected $fillable = [
        'report_id',
        'admin_id',
        'action',
        'reason',
    ];

    /**
     * -------------------------------------------
     * Relationship
     * -------------------------------------------
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
