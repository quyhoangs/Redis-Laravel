<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
//     $user3Stats=[
//                   "favorites"	=>$user->favorites()->count(),
//                   "watchLaters"	=>$user->watchLaters()->count(),
//                   "completion"	=>$user->completion()->count()
//                ];
//     Redis::hmset('user.3.stats',$user3Stats);

    // return Redis::hgetall('user.1.stats'); 



Cache::put('foo',['name'=>'quy','age'=> 27],10);

return cache::get('foo');

});

Route::get('favorite-video',function(){

     Redis::hincrby('user.1.stats','favorites',1);
     return redirect('/');
});

