<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;

class ImageGcpStorage implements ImageStorage
{
    public function store(Request $request): void
    {

            try {
                $storage = new StorageClient([
                    'keyFilePath' => base_path('topicos-software.json'),
                ]);

                $bucketName = 'project-bike';
                $fileName = $request->file('image')->getClientOriginalName();
                $bucket = $storage->bucket($bucketName);
                $object = $bucket->upload(
                    fopen($request->file('image')->getRealPath(), "r"), ['name'=> $fileName]
                );
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        
    }
}
