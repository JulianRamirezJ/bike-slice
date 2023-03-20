<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Item;


class Order extends Model
{

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the Order PK
     * $this->attributes['total'] - int - contains the Order Total
     * $this->attributes['status'] - string - contains the Order Status
     * $this->attributes['address'] - string - contains the Order Address
     * $this->attributes['place_date'] - date - contains the Order Place_date
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     * $this->user - User - contains the associated user
     * $this->items - Items[] - contains the associated items
     */

    protected $fillable = ['total', 'status', 'address', 'place_date'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }
    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function getTotal(): int
    {
        return $this->attributes['total'];
    }
    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }
    public function getStatus(): string
    {
        return $this->attributes['status'];
    }
    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }
    public function getAddress(): string
    {
        return $this->attributes['address'];
    }
    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }
    public function getPlaceDate(): string
    {
        return $this->attributes['place_date'];
    }
    public function setPlaceDate(string $place_date): void
    {
        $this->attributes['place_date'] = $place_date;
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
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
    public function getItems(): Collection
    {
        return $this->items;
    }
    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }
}