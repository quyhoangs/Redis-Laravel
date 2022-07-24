<?php

use Illuminate\Support\Facades\Redis;

Route::get('articles/trending', function () {
    $trending = Redis::zrevrange('trending_articles',0,2) ; 
    $trending = App\Article::hydrate(
        array_map('json_decode',$trending)
    );
    dd($trending);
});
Route::get('articles/{article}', function (App\Article $article ) {
    Redis::zincrby('trending_articles',1,$article);
    return $article;
});
