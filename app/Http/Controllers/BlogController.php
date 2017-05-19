<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
          $posts=Post::orderBy('id','desc')->paginate(config('blog.posts_per_page'));
          $pattern='/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i';
          foreach ($posts as $v){
              $a=preg_match($pattern,$v->content,$matches);
          }
          //$posts->thumb=$matches[1];
          dd($posts);

          return view('home.articleList',compact('posts'));
    }

    public function showArticleDetail($slug)
    {
        $detail=Post::whereSlug($slug)->firstOrFail();

        return view('home.articleDetail')->withPosts($detail);

    }

    public function addArticle()
    {
        return view('home.addArticle');
    }

    public function storeArticle(StoreBlogPost $request)
    {
     $posts=$request->all();


     $re=Post::create($posts);
     if($re){
         return redirect('home/article');
     }
    }


    
}
