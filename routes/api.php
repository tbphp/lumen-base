<?php

use Laravel\Lumen\Routing\Router;

app()->router->group(['prefix' => 'v1'], function (Router $router) {
    /*
    |--------------------------------------------------------------------------
    | 公开放路由 - 不需要登录即可访问的路由
    |--------------------------------------------------------------------------
    */
    // 登录创建token
    $router->post('tokens', 'TokenController@create');
    // 更新token
    $router->put('tokens', 'TokenController@update');

    $router->group(['middleware' => 'jwt'], function (Router $router) {
        /*
        |--------------------------------------------------------------------------
        | 权鉴路由 - 需要登录jwt授权之后才能访问的路由
        |--------------------------------------------------------------------------
        */
        // 退出
        $router->delete('tokens', 'TokenController@delete');
        // 修改密码
        $router->put('tokens/password', 'TokenController@password');
        // 获取当前登录用户信息
        $router->get('tokens/users', 'TokenController@userInfo');
    });
});
