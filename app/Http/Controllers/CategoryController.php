<?php

namespace App\Http\Controllers;

use App\{Menu, Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function execute() {

        // Получить последний элемент url (Games, Reviews, Playstation)
        $category = last(request()->segments());

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();
        $intros = DB::table('intros')->where('category', '=', $category)->get();

        //dd($intros->first());


        if (isset($intros->first()->category) && $intros->first()->category == $category) {
            return view('site.category.category_index', [
                'menu' => $menus,
                'sliders' => $sliders,
                'intro' => $intros,
                'category' => $category,
            ]);
        }
        abort(404);
    }
}
