<?php

namespace App\Traits;

use Illuminate\Support\Str;


trait  ImageTrait
{
    /**
     * Return a success JSON response.
     *
     * 
     * @param  file  $file
     * @param  string $path
     * @return \Illuminate\Http\JsonResponse
     */

    public function uploadImage($file, $path)
    {

        $filename = Str::random(6) . '_' . time() . '_' . $file->getClientOriginalName();
        $uploads_folder =  getcwd() . $path;
        if (!file_exists($uploads_folder)) {
            mkdir($uploads_folder, 0777, true);
        }
        $file->move($uploads_folder, $filename);

        $image = $path . '/' . $filename;
        
        return $image;

    }

    
//    public function uploadImage($file, $path)
//    {

//         $filename = Str::random(6) . '_' . time() . '_' . $file->getClientOriginalName();
//         $image = Image::make($file);
//         $image->resize(300, 300);
//         if (!file_exists($path)) {
//             File::makeDirectory($path, 0755, true, true);
//         }
//         $image->save($path."/".$filename,50,"jpg");
//         return $path."/".$filename;
//     }

//     public function deleteImage($filename){
//         File::delete($filename);
//     }

}
