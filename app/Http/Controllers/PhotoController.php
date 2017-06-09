<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    //
    public function index($cid=0)
    {
        $photo=Photo::where('status','=',1)->where('cid','=',$cid)->limit(5)->get();
        if(!$photo){
            $photo=array(0=>array('position'=>"",'cid'=>"0",'msg'=>""));
        }
        return view('home.photo_index',compact('photo'));
    }


    public function addPhoto()
    {
        return view('home.addPhoto');
    }

    public function upload(Request $request)
    {

        //dd($request->photo[0]->path());
         $month=date("Ym");
         $exts=['jpeg','png','gif','jpg'];
         if($request->isMethod('post')){
            $photos=$request->file('photo');
             foreach ($photos as $k=>$photo){
                 if($photo->isValid()){
                     $ext=$photo->extension();
                     if(in_array($ext,$exts)){
                         $name=time().rand(1000,9999).'.'.$ext;
                         $path =$photo->store('photo','public');
                         $phs[$k]['position']=asset(Storage::url($path));
                         $phs[$k]['cid']=$request->cid;
                         //加水印，and调整大小


                     }else{
                         echo '文件不合法';
                     }
                 }
             }
             $re=DB::table('photos')->insert($phs);
             if($re){
                 return redirect()->back();
             }

         }

    }


}
