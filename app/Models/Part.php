<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function getImg(): string
    {
        return $this->attributes['img'];
    }
    public function setImg(string $img): void
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
}