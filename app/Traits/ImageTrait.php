<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;


Trait ImageTrait
{


    function saveMultipleImages($requestHasFile , $requestFile , $path , $num=1){
        if($requestHasFile)
        {
            $i = $num;
            $i++;

            foreach($requestFile as $file)
            {
                $i++;
                $name = time().$i.'.'.$file->extension();
                $file->move(public_path().$path, $name);

                $data[] = $name;
            }
            return json_encode($data);

        }

    }


    function saveImage($photo , $folder , $unique=''){

//        $file_extension = $request->left_first_image-> getClientOriginalExtension();
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time() . $unique .'.' . $file_extension;

        $path = $folder;

        $photo->move(public_path().$path , $file_name);

        return $file_name;

    }
    /***********************************************************/
    function deleteUploadedImage($image  ,$path){
        //deleting from path

        if ($image != null) {
            unlink(public_path() . $path . $image);
        }
    }


    /******************************************/


//( $request->bg_photo , '/assets/images_front/bg_photos/' , $main->getOriginal('bg_photo') , $request , $request->hasFile('bg_photo'));

    function updatePhoto( $imageVar , $path , $varGetOriginal , $request ,$imageHasFile , $file , $imageModel){

        if($imageHasFile && $imageVar != '' || $imageVar != null) {
            $imagePath2 = public_path($path.$imageModel);
            if($file::exists($imagePath2)){
                unlink($imagePath2);
            }
            $name = time()  . '.' . $imageVar->extension();
            $imageVar->move(public_path() . $path, $name);
            $image_value = $name;

//             = $this->saveImage($imageVar, $path);
        }else{
            $image_value = $varGetOriginal;
        }

        return $image_value;
    }



    //updateNow for updating multiple images
    function updateNow( $modelGetOriginal , $requestFile , $requestImage  , $modelImage , $path , $filePath , $num = 1){

        if($requestFile && $requestImage != '')
        {
            $i = $num;
            $i++;

            if(is_array($requestImage) ||  is_object($requestImage)) {

                    if($modelImage != null){
                        foreach ($modelImage as $photo) {
                            $imagePath2 = public_path($path . '/' . $photo);
                            if ($filePath::exists($imagePath2)) {
                                unlink($imagePath2);

                            }
                    }
                }

                foreach ($requestImage as $file) {



                    $i++;
                    $name = time() . $i . '.' . $file->extension();
                    $file->move(public_path() . $path, $name);
                    $data[] = $name;


                }
            }elseif(is_string($requestImage)){
                dd($requestImage);
                if ($filePath::exists($requestImage)) {
                    unlink($requestImage);
                }
                $name = time() . $i . '.' . $requestImage->extension();
                $requestImage->move(public_path() . $path, $name);
                $data[] = $name;

            }
        }else{
            $data = $modelGetOriginal;

        }

            return $data;
    }



    /*******************************************start pattern of updatenow******************/

//            updateNow( $modelGetOriginal , $requestFile , $requestImage  , $modelImage , $path)

//            if($request->hasfile('image') && request('image') != '')
//            {
//                $i = 1;
//                $i++;
//
//                foreach(request('image') as $file)
//                {
//
//                    foreach (json_decode($category->image,true) as $photo) {
//                        $imagePath2 = public_path('/assets/images_front/category/' . $photo);
//                        if(File::exists($imagePath2)){
//                            unlink($imagePath2);
//                        }
//                    }
//
//
//                    $i++;
//                    $name = time().$i.'.'.$file->extension();
//                    $file->move(public_path().'/assets/images_front/category/', $name);
//                    $data[] = $name;
//
//
//                }
//            }else{
//                $data = $category->getOriginal('image');
//
//            }
//

/*******************************************pattern of updatenow******************/

}
