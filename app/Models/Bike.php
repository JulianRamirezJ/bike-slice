<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * $this->user - User - contains the associated user
     * $this->assemblies - Assembly[] - contains the associated assemblies
     * $this->items - Item[] - contains the associated itemsss
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

    public static function validateUserCreation(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'type' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'description' => 'required|max:1024',
        ]);
    }

    public static function validateAdminCreation(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'description' => 'required|max:1024',
        ]);
    }

    public static function validateUserUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'type' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'description' => 'required|max:1024',
        ]);
    }

    public static function validateAdminUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'type' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'brand' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
            'description' => 'required|max:1024',
        ]);
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

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }

    public function hasReviewFromUser(int $user_id): bool
    {
        return $this->reviews()->where('user_id', $user_id)->exists();
    }
}
