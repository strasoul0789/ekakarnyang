<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\ArticleProduct;

class ArticleController extends Controller
{
    public function article(Request $request){
        $NUM_PAGE = 20;
        $articles = Article::where('status',"เปิด")->orderBy('id','desc')->paginate();
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/newSystem/frontendMain/article/article')->with('articles',$articles);
    }

    public function articleDetail($id){
        $article = Article::findOrFail($id);
        return view('/newSystem/frontendMain/article/article-detail')->with('article',$article);
    }

    public function productArticle(){
        $articles = ArticleProduct::where('status',"เปิด")->get();
        return view('/newSystem/frontendMain/article/article-product')->with('articles',$articles);
    }

    public function productArticleDetail($id){
        $article = ArticleProduct::findOrFail($id);
        return view('/newSystem/frontendMain/article/article-product-detail')->with('article',$article);
    }
}
