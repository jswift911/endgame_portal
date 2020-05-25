<?php

namespace App\Providers;

use App\Blog;
use App\Feature;
use App\Filter;
use App\Intro;
use App\Menu;
use App\Slider;
use App\Video;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Общие переменные для всех видов
//        $menus = Menu::get(['id','name','alias','submenu']);
//        $sliders = Slider::get(['id','text', 'title', 'img']);
//        $intros = Intro::where('id','<',20)->get();
//        $blogs = Blog::take(3)->get();
//        $filters = Filter::get(['id','name']);
//        $videos = Video::get(['id', 'title', 'text', 'promo_img', 'video_link'])->first();
//        $features = Feature::get(['id','text', 'title', 'img', 'created_at']);
//        View::share( [
//            'menu' => $menus,
//            'sliders' => $sliders,
//            'intros' => $intros,
//            'blogs' => $blogs,
//            'videos' => $videos,
//            'features' => $features,
//            'filters' => $filters,
//        ] );
    }
}
