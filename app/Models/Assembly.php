<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assembly extends Model
{
    /**
     * ASSEMBLY ATTRIBUTES
     * $this->attributes['id'] - int - contains the Assembly PK
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
}