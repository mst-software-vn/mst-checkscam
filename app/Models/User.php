<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'full_name',
        'role',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isModerator(): bool
    {
        return $this->role === 'moderator';
    }

    public function isActive(): bool
    {
        return $this->status === 1;
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 150, 150)
            ->nonQueued();

        $this->addMediaConversion('optimized')
            ->fit(Fit::Max, 800, 800)
            ->nonQueued();
    }

    public function getAvatarUrlAttribute(): string
    {
        if ($this->hasMedia('avatar')) {
            return $this->getFirstMediaUrl('avatar', 'thumb');
        }

        if (! $this->avatar) {
            return 'https://ui-avatars.com/api/?name='.urlencode($this->full_name ?? $this->username ?? 'User').'&background=0068FF&color=fff';
        }

        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return $this->avatar;
        }

        return asset('storage/'.$this->avatar);
    }
}
