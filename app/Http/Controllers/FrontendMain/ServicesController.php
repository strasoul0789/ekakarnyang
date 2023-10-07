<?php

namespace App\Http\Controllers\FrontendMain;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\ArticleService;

class ServicesController extends Controller
{
    public function service($category){
        return view('/newSystem/frontendMain/services/'.$category);
    }

    public function serviceArticle(){
        $article_services = ArticleService::where('status',"เปิด")->get();
        return view('/newSystem/frontendMain/services/article')->with('article_services',$article_services);
    }

    public function serviceArticleDetail($id){
        $service = ArticleService::findOrFail($id);
        return view('/newSystem/frontendMain/services/article-detail')->with('service',$service);
    }
}
