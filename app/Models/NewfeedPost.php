<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewfeedPost extends Model
{
    use SoftDeletes;

    protected $table = 'newfeed_posts';

    protected $fillable = [
        'user_id',
        'category',
        'content',
        'price',
        'image_path',
        'image_paths',
        'is_hidden',
        'hidden_by_admin',
        'report_count',
    ];

    protected $casts = [
        'price' => 'decimal:0',
        'image_paths' => 'array',
        'is_hidden' => 'boolean',
        'hidden_by_admin' => 'boolean',
        'report_count' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(NewfeedPostReport::class, 'post_id');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_hidden', 0);
    }
}
