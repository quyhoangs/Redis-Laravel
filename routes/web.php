<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redis;

Route::get('/',function(){
    return Cache::remember ('articles.all',60*60,function(){
        return App\Article::all();
    });
});