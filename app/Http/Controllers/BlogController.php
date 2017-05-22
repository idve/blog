<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Psy\Output\PassthruPager;

class BlogController extends Controller
{
    //

    public function index(Request $request)
    {
        //dd(Session::all());
      return view('home.index');
    }

    public function showArticleList()
    {
          $posts=Post::where('status','=',1)->orderBy('id','desc')->paginate(config('blog.posts_per_page'));
          return view('home.articleList',compact('posts'));
    }

    public function showArticleDetail($id)
    {
        $detail=Post::findOrFail($id);

        return view('home.articleDetail')->withPosts($detail);

    }

    public function addArticle()
    {
        return view('home.addArticle');
    }

    public function storeArticle(StoreBlogPost $request)
    {

     $posts=$request->all();
     //存个缩略图
     $pattern='/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?/i';
            $a=preg_match($pattern,$posts['content'],$matches);
            if($a)
            {
                $path=explode("\"",$matches[0]);
                if($path!==false){
                    $posts['thumb']=$path[1];
                }
            }
            //默认个发布时间
        $posts['publish_at']=Carbon::now();
     $re=Post::create($posts);
     if($re){
         return redirect('/article');
     }



    }

    public function editArticle($id)
    {

       $article=Post::findOrFail((int)$id);

        return view('home.editArticle',$article);

}

    
}
