<?php

use NINACORE\Core\Routing\NINARouter;
NINARouter::group(['namespace' => 'Web','prefix' => config('app.web_prefix'),'middleware' => [\NINACORE\Middlewares\LangRequest::class,\NINACORE\Middlewares\CheckRedirect::class]], function ($language='vi') {
    NINARouter::get('/change-lang/{lang}', function ($lang) {
        if(\Illuminate\Support\Arr::has(config('app.langs'),$lang)){
            session()->set('locale',$lang);
            app()->make('config')->set('app.seo_default',$lang);
            response()->redirect(url('home',['language'=>$lang]));
        }
    })->name('changelang');
    
    // Intro Router
    NINARouter::get('/', 'HomeController@intro')->name('intro');

    // NINARouter::get('/', 'HomeController@index')->name('home');
    NINARouter::get('/index', 'HomeController@index')->name('home');
        
    // Api - Ajax Router
    NINARouter::get('/load-token', 'ApiController@token')->name('token');

    // Products Router
    NINARouter::get('/san-pham', 'ProductController@index')->name('san-pham');
    NINARouter::get('/hang', 'ProductController@allBrand')->name('hang');
    NINARouter::get('/thu-vien-anh', 'ProductController@index')->name('thu-vien-anh');

    // News Router
    NINARouter::get('/dich-vu', 'NewsController@index')->name('dich-vu');
    NINARouter::get('/su-kien', 'NewsController@index')->name('su-kien');
    NINARouter::get('/tin-tuc', 'NewsController@index')->name('tin-tuc');
    NINARouter::get('/uu-dai', 'NewsController@index')->name('uu-dai');
    NINARouter::get('/video', 'NewsController@index')->name('video');

    // Static Router
    NINARouter::get('/gioi-thieu', 'StaticController@index')->name('gioi-thieu');

    // Contact Router
    NINARouter::get('/lien-he', 'ContactController@index')->name('lien-he');

    // Submit Form Router
    NINARouter::post('/lien-he-post', 'ContactController@submit')->name('lien-he-post');
    NINARouter::post('/dang-ky-nhan-tin', 'HomeController@letter')->name('letter');

    // Search Router
    NINARouter::get('/tim-kiem', 'ProductController@searchProduct')->name('tim-kiem');

    NINARouter::get('/{slug}', 'SlugController@handle')->where([ 'slug' => '.*' ])->name('slugweb');
});