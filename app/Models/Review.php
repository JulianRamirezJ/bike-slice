<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Bike;

class Review extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the Review PK
     * $this->attributes['stars'] - int - contains the stars of the review
     * $this->attributes['description'] - string - contains the description of the review 
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     * $this->user - User - contains the associated user
     * $this->bike - Bike - contains the associated bike
     */

    protected $fillable = ['stars', 'description'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getStars(): int
    {
        return $this->attributes['stars'];
    }

    public function setStars(int $stars): void
    {
        $this->attributes['stars'] = $stars;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getUser(): User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    public function bike(): BelongsTo
    {
        return $this->belongsTo(Bike::class);
    }
    public function getBike(): Bike
    {
        return $this->bike;
    }
    public function setBike(Bike $bike): void
    {
        $this->bike = $bike;
    }
}