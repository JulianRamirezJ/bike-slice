<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Bike extends Model
{
    /**
     * BIKE ATTRIBUTES
     * $this->attributes['id'] - int - contains the bike PK
     * $this->attributes['name'] - string - contains name of the bike 
     * $this->attributes['price'] - int - contains price of the bike 
     * $this->attributes['stock'] - int - contains stock of the bike 
     * $this->attributes['shareable'] - bool - tells if a bike can be seen by other users
     * $this->attributes['type'] - string - contains the type of bike (prefabricated or created by users)
     * $this->attributes['brand'] - string - contains the brand of the bike 
     * $this->attributes['description'] - string - contains a description of the bike
     * $this->attributes['img'] - string - contains name of the bikes image
     * $this->attributes['user_id'] - string - id of user who created the bike
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     */

     protected $fillable = ['price', 'img', 'name', 'stock', 'share', 'type', 'brand', 'description', 'user_id'];

     public function getId(): int
     {
         return $this->attributes['id'];
     }

     public function getName(): string
     {
         return $this->attributes['name'];
     }

     public function getUserId(): int
     {
         return $this->attributes['user_id'];
     }
 
     public function setName(string $name): void
     {
         $this->attributes['name'] = $name;
     }

     public function getPrice(): int
     {
         return $this->attributes['price'];
     }
 
     public function setPrice(int $price): void
     {
         $this->attributes['price'] = $price;
     }
 
     public function getStock(): int
     {
         return $this->attributes['stock'];
     }
 
     public function setStock(int $stock): void
     {
         $this->attributes['stock'] = $stock;
     }
 
     public function getShare(): bool
     {
         return $this->attributes['share'];
     }
 
     public function setShare(bool $share): void
     {
         $this->attributes['share'] = $share;
     }
 
     public function getType(): string
     {
         return $this->attributes['type'];
     }
 
     public function setType(string $type): void
     {
         $this->attributes['type'] = $type;
     }
 
     public function getBrand(): string
     {
         return $this->attributes['brand'];
     }
 
     public function setBrand(string $brand): void
     {
         $this->attributes['brand'] = $brand;
     }
 
     public function getDescription(): string
     {
         return $this->attributes['description'];
     }
 
     public function setDescription(string $description): void
     {
         $this->attributes['description'] = $description;
     }

     public function getImage(): string
     {
         return $this->attributes['img'];
     }
 
     public function setImage(string $img): void
     {
         $this->attributes['img'] = $img;
     }

     public function getCreatedAt(): string
     {
         return $this->attributes['created_at'];
     }

     public function getUpdatedAt(): string
     {
         return $this->attributes['updated_at'];
     }

     public static function validateCreation(Request $request)
     {
        $request->validate([
            "name" => "required|max:30",
            "stock" => "required|integer|min:0",
            "price" => "required|integer|min:0",
            "type" => "required",
            "brand" => "required|max:30",
            "image" => "required|mimes:jpg,png,jpeg|max:5048",
            "description" => "required|max:1024"
        ]);
     }

}
