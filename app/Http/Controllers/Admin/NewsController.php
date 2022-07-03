<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageUpload;
use App\Models\Journalist;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;


class NewsController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $journalists = Journalist::latest()->get();
        return view('admin.news' , compact('journalists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }




    //  dropzone packge and ckeditor package

// We are submitting are image along with userid and with the help of user id we are updateing our record
    public function fileCreate($id)
    {
        return view('admin.imageupload' , compact('id'));
    }

    //https://appdividend.com/2022/02/28/laravel-dropzone-image-upload/
    public function fileStore(Request $request , $id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->groups = $id;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }



    ######################################################################



    /*********************test***********************/
    public function dropzoneform()
    {
        return view('dropzone');
    }


    public function storeData(Request $request)
    {
        try {
//            dd($request->all());
            if($request->hasFile('main_image')) {

                $img = $this->saveImage($request->main_image, '/images', '345645');
//            $photo = $this->saveImage($request->photo , '/assets/images_front/bg_photos' , '1');
            }else{
                $img = null;
            }
            $user = new News;
            $user->main_title = $request->main_title;
            $user->image_title = $request->image_title;
            $user->journalist_name = $request->journalist_name;
//            $user->editor = $request->editor;
            $user->editor =  $request->input('summary_ckeditor');
//                $request->input('summary-ckeditor');
            $user->tags = json_encode(explode(',' , $request->tagsIds) , true);
            $user->category_id = $request->category_id;
            $user->main_image = $img;


            $user->save();
            $user_id = $user->id; // this give us the last inserted record id
        }
        catch (\Exception $e) {
            return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
        }
        return response()->json(['status'=>"success", 'user_id'=>$user_id]);
    }


    #####################################################################################

    public function storeImage(Request $request)
    {
        if ($request->file('file')) {
            $userid = $request->userid;

            $imagesArr = $request->file('file') ;
            foreach($imagesArr as $img) {

                //here we are geeting userid alogn with an image

                $imageName = strtotime(now()) . rand(11111, 99999) . '.' . $img->getClientOriginalExtension();
                $user_image = new ImageUpload();
                $original_name = $img->getClientOriginalName();
                $user_image->filename = $imageName;
                $user_image->groups = $userid;
                $user_image->save();


                if (!is_dir(public_path() . '/images/')) {
                    mkdir(public_path() . '/images/', 0777, true);
                }

                $img->move(public_path() . '/images/', $imageName);
            }

            // we are updating our image column with the help of user id
//            $user_image->where('id', $userid)->update(['image' => $imageName]);

            return response()->json(['status' => "success", 'imgdata' => $original_name, 'userid' => $userid]);
        }
    }
    ####################################################################################
    public function storeTags(Request $request)
    {

        $tagsArr = explode(',',$request->tags) ;
        $tagsArrIds = [];
        foreach($tagsArr as $tag2) {

            $tag = trim(strtolower($tag2) , ' ');
            //here we are geeting userid alogn with an image

            $user_tag = Tag::where('title' , $tag)->value('id');
            if(isset($user_tag) && $user_tag > 0){
                $tagsArrIds[] = $user_tag;
            }else {
                $user_tag = new Tag();
                $user_tag->title = $tag;
                $user_tag->save();
                $tagsArrIds[] = $user_tag->id;
            }
        }


        // we are updating our image column with the help of user id
//            $user_image->where('id', $userid)->update(['image' => $imageName]);

        return response()->json(['status' => "success", 'tagsArrIds' => $tagsArrIds]);
    }


    /**********************test*********************/


}
