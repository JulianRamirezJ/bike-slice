<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Bike;
use App\Models\Part;

class Assembly extends Model
{
    /**
     * ASSEMBLY ATTRIBUTES
     * $this->attributes['id'] - int - contains the Assembly PK
     * $this->attributes['created_at'] - string - contains date of creation
     * $this->attributes['updated_at '] - string - contains date of last modification
     * $this->bike - Bike - contains the associated bike
     * $this->part - Part - contains the associated part
     */

    protected $fillable = [];

    public function getId(): int
    {
        return $this->attributes['id'];
    }
    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
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
    public function part(): BelongsTo
    {
        return $this->belongsTo(Part::class);
    }
    public function getPart(): Part
    {
        return $this->part;
    }
    public function setPart(Part $part): void
    {
        $this->part = $part;
    }
}