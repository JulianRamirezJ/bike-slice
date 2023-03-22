<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use App\Models\Bike;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the Item PK
     * $this->attributes['quantity'] - int - contains the quantity of bikes
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     * $this->order - Order - contains the associated order
     * $this->bike - Bike - contains the associated bike
     */

    protected $fillable = ['quantity'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function getOrder(): Order
    {
        return $this->order;
    } 
    public function setOrder(Order $order): void
    {
        $this->order = $order;
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