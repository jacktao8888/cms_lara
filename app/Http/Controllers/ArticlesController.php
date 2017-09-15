<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Redis;

class ArticlesController extends Controller
{
    //
    public function index() {
        //echo "hello";
        //$articles = Article::oldest()->get();//排序
        //$articles = Article::latest()->where('created_at', '<=', Carbon::now())->get();//排序

//        $articles = Article::all();
        $articles = Article::latest()->created()->get();//queryScope,Models/Article::scopeCreated()
        //print_r($articles);

        Redis::set('articles',1);

        return view('articles.index', compact('articles'));
    }

    public function show($id) {
        $article = Article::findOrFail($id);
//        dd($article);

        return view('articles.show', compact('article'));
    }

    public function create() {
        return view('articles.change');
    }

    public function save(Request $request) {
       // print_r($request);
        //print_r($request->author);

//        $request->get('title');
        Article::create($request->all());
//        DB::insert('insert into articles (author, title, content) values (?,?,?)', [$request->author, $request->title, $request->content]);
        return redirect('articles');
    }
}
