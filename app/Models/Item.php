<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the Item PK
     * $this->attributes['quantity'] - int - contains the quantity of bikes
     * 
     */

     protected $fillable = ['id', 'quantity'];

     public function getId(): int
     {
         return $this->attributes['id'];
     }
 
     public function setId(int $id): void
     {
         $this->attributes['id'] = $id;
     }

     public function getQuantity(): int
     {
         return $this->attributes['quantity'];
     }
 
     public function setQuantity(int $quantity): void
     {
         $this->attributes['quantity'] = $quantity;
     }
}
