<?php
namespace App\Traits;

use App\Models\Banner\Image as ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
/**
 *
 */
trait FileUploadable
{
   public function saveFiles(Request $request)
   {
       ini_set('memory_limit', '-1');
       if (!file_exists(public_path('storage/uploads'))) {
           mkdir(public_path('storage/uploads'), 0777);
           mkdir(public_path('storage/uploads/thumb'),0777);
       }
       $finalRequest = $request;
       foreach($request->all()as $key => $value){
           if ($request->hasFile($key)) {
               if ($request->has($key. '_max_width') && $request->has($key. '_max_height')) {
                   $extension = Arr::last(explode('.', $request->file($key)->getClientOriginalName()));
                   $name      = Arr::first(explode('.', $request->file($key)->getClientOriginalName()));
                   $filename  = time(). '-' . Str::slug($name). '.' .$extension;
                   $file     = $request->file($key);
                   $image    = Image::make($file);
                   if (! file_exists(public_path('storage/uploads/thumb'))) {
                       mkdir(public_path('storage/uploads/thumb'),0777, true);
                   }
                   Image::make($file)->resize(50,50)->save(public_path('storage/uploads/thumb'). '/'. $filename);
                   $width  = $image->width();
                   $height = $image->height();
                   if ($width > $request->{$key. 'max_width'} && $height > $request->{$key. '_max_height'}) {
                        $image->resize($request->{$key. '_max_width'}, $request->{$key. '_max_height'});
                   }elseif ($width > $request->{$key. '_max_width'}) {
                       $image->resize($request->{$key. '_max_width'}, null, function ($constraint){
                           $constraint->aspectRatio();
                       });
                   } elseif ($height > $request->{$key . '_max_width'}) {
                        $image->resize(null, $request->{$key . '_max_height'}, function ($constraint) {
                           $constraint->aspectRatio();
                       });
                   }
                   $image->save(public_path('storage/uploads'). '/'. $filename);
                   $finalRequest = new Request(array_merge($finalRequest->all(), [$key=>$filename]));



               }else {
                   $extension = Arr::last(explode('.', $request->file($key)->getClientOriginalName()));
                   $name      = Arr::first(explode('.', $request->file($key)->getClientOriginalName()));
                   $filename  = time(). '-' . Str::slug($name). '.' .$extension;
                   $request->file($key)->move(public_path('storage/uploads'). $filename);
               }
           }
       }
       return $finalRequest;

   }

   public function saveAllFiles(Request $request, $downloadable_file_input = null, $imageable_type = null, $imageable = null)
    {
        if (!file_exists(public_path('storage/uploads'))) {
            mkdir(public_path('storage/uploads'), 0777);
            mkdir(public_path('storage/upload/thumb'), 0777);
        }
        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {

            if ($request->hasFile($key)) {

                if ($key == $downloadable_file_input) {
                    foreach ($request->file($key) as $item) {
                        $extension = Arr::last(explode('.',$item->getClientOriginalName()));
                        $name = Arr::first(explode('.',$item->getClientOriginalName()));
                        $filename = time() . '-' . Str::slug($name).'.'.$extension;
                        $size = $item->getSize() / 1024;
                        $item->move(public_path('storage/uploads'), $filename);
                        ImageModel::create([
                            'imageable_type' => $imageable_type,
                            'imageable_id'   => $imageable->id,
                            'path' => $filename,
                            'extention' => $item->getClientMimeType(),
                            'name' => $filename,
                            'size' => $size,
                        ]);
                    }
                    $finalRequest = $finalRequest = new Request($request->except($downloadable_file_input));


                }
            }
        }

        return $finalRequest;
    }
    /**
     * $path= 'storage/logo'
     * if(!Storage::exists($path);)
     * Storage::makeDirectory($path);
     * @param Request $request
     * @return void
     */
    public function saveLogos(Request $request){
        if (!file_exists(public_path('storage/logos'))) {
            mkdir(public_path('storage/logos'), 0777);
        }
        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {
                    $filename = time() . '-' . Str::slug($request->file($key)->getClientOriginalName());
                    $request->file($key)->move(public_path('storage/logos'), $filename);
                    $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));

            }
        }

        return $finalRequest;
    }



}


?>
