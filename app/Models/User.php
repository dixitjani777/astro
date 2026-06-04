<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'dob',
        'location',
        'state',
        'city',
        'pincode',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'dob' => 'date',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return ($this->role ?? 'user') === 'admin';
    }

    public function roleRecord(): ?Role
    {
        $slug = $this->role ?? 'user';
        if ($slug === 'user') {
            return null;
        }

        return Cache::remember("roles.by_slug.{$slug}", 300, function () use ($slug) {
            return Role::query()->where('slug', $slug)->first();
        });
    }

    public function hasPermission(string $permissionKey): bool
    {
        if (($this->role ?? 'user') === 'admin') {
            return true;
        }

        $role = $this->roleRecord();
        if (!$role) {
            return false;
        }

        return $role->permissions()->where('key', $permissionKey)->exists();
    }
}
