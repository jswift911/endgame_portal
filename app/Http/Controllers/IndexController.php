<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Blog, Feature, Filter, Intro, Menu, Slider, Video};

class IndexController extends Controller
{
    public function execute(Request $request) {

        // Выборка всех данных из БД. Везде можно использовать метод all();
        $menus = Menu::get(['id','name','alias','submenu']);
        $sliders = Slider::get(['id','text', 'title', 'img']);
        $intros = Intro::take(3)->orderBy('created_at','desc')->get();
        $blogs = Blog::take(3)->orderBy('created_at','desc')->get();
        $filters = Filter::get(['id','name']);
        $videos = Video::get(['id', 'title', 'text', 'img', 'video_link'])->first();
        $features = Feature::get(['id','text', 'title', 'img', 'created_at']);

        // Формируем меню
//        $menu = [];
//        foreach ($menus as $menu_link) {
//            $item = ['title' => $menu_link->name, 'alias' => $menu_link->alias, 'submenu' => $menu_link->submenu];
//            $menu[] = $item;
//        }


        // Возвращаем вид с данными
        return view('site.index', [
            'menu' => $menus,
            'sliders' => $sliders,
            'intros' => $intros,
            'blogs' => $blogs,
            'videos' => $videos,
            'features' => $features,
            'filters' => $filters,
            ]);
    }
}
