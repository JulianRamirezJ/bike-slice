<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the Item PK
     * $this->attributes['quantity'] - int - contains the quantity of bikes
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
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

}
