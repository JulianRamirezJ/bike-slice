<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface ImageStorage {
    public function store(Request $image): void;
}
