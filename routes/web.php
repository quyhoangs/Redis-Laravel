<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redis;


class CacheableArticles
{
    protected $articles;

    public function __construct(Articles $articles)
    {   
        $this->articles=$articles;
    }

    public function all()
    {   
        return Cache::remember ('articles.all',60*60,function(){
            return  $this->articles->all();
        });
    }
}
class Articles
{  
    public function all()
    {
        return App\Article::all();
    }
}

Route::get('/',function(){

    $articles = new CacheableArticles(new Articles);
    return $articles->all();
});