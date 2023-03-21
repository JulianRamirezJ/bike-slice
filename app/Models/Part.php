<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Assembly;

class Part extends Model
{
    /**
     * PART ATTRIBUTES
     * $this->attributes['id'] - int - contains the Part PK
     * $this->attributes['stock'] - int - contains the Part Stock
     * $this->attributes['price'] - int - contains the Part Price
     * $this->attributes['name'] - string - contains the Part Name
     * $this->attributes['type'] - string - contains the Part Type
     * $this->attributes['img'] - string - contains the Part Img
     * $this->attributes['brand'] - string - contains the Part Brand
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     */

    protected $fillable = ['stock', 'price', 'name', 'type', 'img', 'brand'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }
    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }
    public function getStock(): int
    {
        return $this->attributes['stock'];
    }
    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }
    public function getPrice(): int
    {
        return $this->attributes['price'];
    }
    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }
    public function getName(): string
    {
        return $this->attributes['name'];
    }
    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }
    public function getType(): string
    {
        return $this->attributes['type'];
    }
    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }
    public function getImage(): string
    {
        return $this->attributes['img'];
    }
    public function setImage(string $img): void
    {
        $this->attributes['img'] = $img;
    }
    public function getBrand(): string
    {
        return $this->attributes['brand'];
    }
    public function setBrand(string $brand): void
    {
        $this->attributes['brand'] = $brand;
    }
    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }
    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getAdmin(){
        return $this->belongsTo(User::class);
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
        ]);
    }


    public static function validateUpdate(Request $request)
    {
        $request->validate([
            "name" => "required|max:30",
            "stock" => "required|integer|min:0",
            "price" => "required|integer|min:0",
            "type" => "required",
            "brand" => "required|max:30",
        ]);
    }
    
    public function assemblies(): HasMany 
    {
        return $this->hasMany(Assembly::class);
    }
    public function getAssemblies(): Collection
    {
        return $this->assemblies;
    }
    public function setAssemblies(Collection $assemblies): void
    {
        $this->assemblies = $assemblies;
    }
}