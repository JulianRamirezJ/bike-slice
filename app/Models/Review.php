<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the Item PK
     * $this->attributes['stars'] - int - contains the stars of the review
     * $this->attributes['description'] - string - contains the description of the review 
     * 
     */

     protected $fillable = ['id', 'stars', 'description'];

     public function getId(): int
     {
         return $this->attributes['id'];
     }
 
     public function setId(int $id): void
     {
         $this->attributes['id'] = $id;
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
}
