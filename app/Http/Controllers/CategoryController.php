<?php

namespace App\Http\Controllers;

use App\{Menu, Slider, Intro};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function execute(Request $request) {

        // Получить последний элемент url (Games, Reviews, Playstation)
        $category = last(request()->segments());

        $menus = Menu::get(['id','name','alias','submenu']);
        $sliders = Slider::get(['id','text', 'title', 'img'])->first();
        $intros = Intro::get('id','category','title','text')->where('category','=', $category);


        return view('site.category.category_index', [
            'menu' => $menus,
            'sliders' => $sliders,
            'intro' => $intros,
            'category' => $category,
        ]);
    }
}
