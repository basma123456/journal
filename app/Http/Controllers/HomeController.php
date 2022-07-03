<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use ImageTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

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
