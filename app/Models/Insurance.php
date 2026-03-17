<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Insurance extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'insurances';

    protected $fillable = [
        'full_name',
        'avatar',
        'amount',
        'insurance_date',
        'expired_at',
        'contact_info',
        'payment_accounts',
        'services',
        'status',
        'slug',
    ];

    protected $casts = [
        'contact_info' => 'array',
        'payment_accounts' => 'array',
        'services' => 'array',
        'amount' => 'decimal:2',
        'insurance_date' => 'date',
        'expired_at' => 'date',
    ];

    /**
     * ------------------------------------------------------
     * Helper Methods
     * ------------------------------------------------------
     */
    public function isActive(): bool
    {
        return $this->status === 1;
    }

    public function isExpired(): bool
    {
        return $this->expired_at && $this->expired_at->isPast();
    }

    public function isExpiringSoon(int $days = 7): bool
    {
        return $this->expired_at
            && ! $this->expired_at->isPast()
            && $this->expired_at->diffInDays(now()) <= $days;
    }

    public function getStatusLabelAttribute(): string
    {
        if (! $this->isActive()) {
            return 'Tạm dừng';
        }

        if ($this->isExpired()) {
            return 'Đã hết hạn';
        }

        if ($this->isExpiringSoon()) {
            return 'Sắp hết hạn';
        }

        return 'Hoạt động';
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 200, 200)
            ->nonQueued();

        $this->addMediaConversion('optimized')
            ->fit(Fit::Max, 800, 800)
            ->nonQueued();
    }

    public function getAvatarUrlAttribute(): ?string
    {
        if ($this->hasMedia('avatar')) {
            return $this->getFirstMediaUrl('avatar', 'thumb');
        }

        if (! $this->avatar) {
            return null;
        }

        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return $this->avatar;
        }

        return asset('storage/'.$this->avatar);
    }
}
