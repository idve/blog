<?php

namespace App\Http\Controllers;

use App\Cate;
use App\Hot;
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
        $position=Post::where('status','=','1')->where('cid','=','1')->orderBy('id','desc')
            ->first();//获取推荐文章

        $data=array();
            //调用诗歌
        if($position){
            $data['position']=$position;
        }
            //调用热点文章
        $hots = Post::whereHas('Hot', function ($query) {
            $query->orderBy('clicks','desc');
        })->limit(4)->get();
        //dd($hots);
        if($hots){
            $data['hots']=$hots;
        }
            return view('home.index', compact('data'));
    }

    public function showArticleList()
    {
        $posts = Post::where('status', '=', 1)->orderBy('id', 'desc')->paginate(config('blog.posts_per_page'));
        return view('home.articleList', compact('posts'));
    }

    public function showArticleDetail($id)
    {
        $detail = Post::where('status', '=', 1)->findOrFail($id);
        //记录热点
        $time=Carbon::now();
        if($hid=$detail->hid){
            $hots=Hot::where('status','=','1')->find($hid);
            if($hots->date<Carbon::today()){
                $hots->clicks=0;
            }else{
                $hots->clicks+=1;
            }
        }else{
            $hots=new Hot();
            $hots->clicks+=1;
        }

           $hots->date=$time;
           $hots->nid=$detail->id;
           $hots->save();
        $detail->hid=$hots->id;
        $detail->save();
        $detail->content= ($detail->content);
        return view('home.articleDetail')->withPosts($detail);
    }

    public function addArticle()
    {
        $cates = Cate::all();
        return view('home.addArticle', compact('cates'));
    }

    public function storeArticle(StoreBlogPost $request)
    {
        $posts = $request->all();
        //存个缩略图
        $pattern = '/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?/i';
        $a = preg_match($pattern, $posts['content'], $matches);
        if ($a) {
            $path = explode("\"", $matches[0]);
            if ($path !== false) {
                $posts['thumb'] = $path[1];
            }
        }else{
            $posts['thumb'] =asset('images/zg.jpg');
        }
        $posts['published_at'] = Carbon::now();
        //默认个发布时间
        $posts['published_at'] = Carbon::now();
        if ($request->method() === 'POST') {
            //新增
            $posts['content']=($posts['content']);
            $re = Post::create($posts);
        } elseif ($request->method() === 'PUT') {
            //更新
            $posts['content']=($posts['content']);
            $posts = array_only($posts, ['title', 'content', 'slug', 'published_at', 'thumb', 'status', 'user_id', 'cid','position']);
            $re = Post::where('id', '=', $request->id)->update($posts);
        }

        if ($re) {
            return redirect('/article');
        }
    }

    public function editArticle($id)
    {
        //展示没删除的
        $article = Post::where('status', '=', 1)->findOrFail((int)$id);
        $article['cates']=Cate::all();
        return view('home.editArticle', $article);
    }

    public function delArticle($id)
    {
        $article = Post::where('status', '=', 1)->findOrFail((int)$id);
        $article->status=0;
        $article->save();
       return redirect()->back();
    }

    public function storeCate(Request $request)
    {
        $cname = $request->input('cname');
        $re = Cate::create(compact('cname'));
        if ($re) {
            //添加成功
            $data['code'] = 200;
            $data['data'] = $re;
            return $data;
        } else {
            $data['code'] = 100;
            return $data;
        }
    }
}
