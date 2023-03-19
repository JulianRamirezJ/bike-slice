<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Util\ImageLocalStorage;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function (){
            return new ImageLocalStorage();
        });
    }
}
