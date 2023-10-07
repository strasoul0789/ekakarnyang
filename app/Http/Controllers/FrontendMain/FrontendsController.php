<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Width;
use App\Model\ArticleService;
use App\Model\Article;
use App\Model\ArticleProduct;

class FrontendsController extends Controller
{
    public function index(){
        $widths = Width::get();
        $article_services = ArticleService::where('status',"เปิด")->paginate(3);
        $articles = Article::where('status',"เปิด")->orderBy('id','desc')->paginate(6);
        $article_products = ArticleProduct::where('status',"เปิด")->paginate(3);
        return view('/newSystem/frontendMain/index')->with('widths',$widths)
                                                    ->with('article_services',$article_services)
                                                    ->with('articles',$articles)
                                                    ->with('article_products',$article_products);
    }
    
}
