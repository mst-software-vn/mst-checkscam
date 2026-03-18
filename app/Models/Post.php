<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'thumbnail',
        'is_featured',
        'view_count',
        'hashtags',
        'author_id',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'view_count' => 'integer',
    ];

    /**
     * ------------------------------------------------------
     * Relationship (BelongsTo)
     * ------------------------------------------------------
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * ------------------------------------------------------
     * Scopes
     * ------------------------------------------------------
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', 1);
    }

    /**
     * ------------------------------------------------------
     * Helper Methods
     * ------------------------------------------------------
     */
    public function isFeatured(): bool
    {
        return $this->is_featured == true;
    }

    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();

        $this->addMediaConversion('optimized')
            ->fit(Fit::Max, 1200, 1200)
            ->nonQueued();
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if ($this->hasMedia('thumbnail')) {
            return $this->getFirstMediaUrl('thumbnail', 'optimized');
        }

        if (! $this->thumbnail) {
            return null;
        }

        if (filter_var($this->thumbnail, FILTER_VALIDATE_URL)) {
            return $this->thumbnail;
        }

        return asset('storage/'.$this->thumbnail);
    }
}
