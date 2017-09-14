<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    //
    public function index() {
        //echo "hello";
        $articles = Article::latest()->get();//$articles = Article::oldest()->get();
        //print_r($articles);
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

        Article::create($request->all());
//        DB::insert('insert into articles (author, title, content) values (?,?,?)', [$request->author, $request->title, $request->content]);
        return redirect('articles');
    }
}
