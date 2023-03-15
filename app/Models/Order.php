<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the Order PK
     * $this->attributes['total'] - int - contains the Order Total
     * $this->attributes['status'] - string - contains the Order Status
     * $this->attributes['address'] - string - contains the Order Address
     * $this->attributes['place_date'] - date - contains the Order Place_date
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
}