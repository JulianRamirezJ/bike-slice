<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Review;
use App\Models\Order;
use App\Models\Bike;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the User PK
     * $this->attributes['name'] - string - contains the name of the user
     * $this->attributes['email'] - string - contains the email of the user 
     * $this->attributes['password'] - string - contains the password of the user 
     * $this->attributes['role'] - string - contains the role of the user 
     * $this->attributes['address'] - string - contains the address of the user 
     * $this->attributes['balance'] - string - contains the balance of the user
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     * $this->orders - Order[] - contains the associated orders
     * $this->reviews - Review[] - contains the associated reviews
     * $this->bikes - Bike[] - contains the associated bikes
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'address',
        'balance'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    public function getReviews(): Collection
    {
        return $this->reviews;
    }
    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    } 
    public function hasReviewForBike(int $bike_id): bool
    {
        return $this->reviews()->where('bike_id', $bike_id)->exists();
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function getOrders(): Collection
    {
        return $this->orders;
    }
    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }
    public function bikes(): HasMany
    {
        return $this->hasMany(Bike::class);
    }
    public function getBikes(): Collection
    {
        return $this->bikes;
    }
    public function setBikes(Collection $bikes): void
    {
        $this->bikes = $bikes;
    }

}
