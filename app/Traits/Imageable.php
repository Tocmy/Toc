<?php
namespace App\Traits;

use App\Models\Banner\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


/**
 *
 */
trait Imageable
{
   public function hasImage() {
       return (bool) $this->image()->count();
   }

   public function images()
   {
       return $this->morphMany(Image::class, 'imageable')
                   ->where(function ($q){
                       $q->whereNull('status')
                         ->orWhere('status', 0);
                   })->orderBy('position', 'asc');
   }

   public function image()
   {
       return $this->morphOne(Image::class, 'imageable')->orderBy('position', 'asc');
   }

   public function logo()
   {
    return $this->morphOne(Image::class, 'imageable')->orderBy('status','!=', 1);
   }

   public function deleteImage($image = Null)
   {
       if (!$image) {
           $image = $this->image;
       }
       if (optional($image)->path) {
           Storage::delete($image->path);
           Storage::deleteDirectory($image->path);
           return $image->delete();
       }
       return;
   }

   public function deleteMainImage()
   {
       if ($img = $this->mainImage) {
           $this->deleteImage($img);
       }

       return;
   }

   public function deleteLogo()
   {
       if ($img = $this->logo) {
           $this->deleteImage($img);
       }
       return;
   }

   public function flushImages()
   {
       foreach($this->images as $image){
           $this->deleteImage($image);
       }
       $this->deleteLogo();
       $this->deleteMainImage();
       return;
   }

}


?>
