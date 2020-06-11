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
        $intro_one = DB::table('intros')->where('category', '=', $category)->first();


        if (isset($intro_one->category) && $intro_one->category == $category) {
            return view('site.category.category_index', [
                'menu' => $menus,
                'sliders' => $sliders,
                'intro' => $intro_one,
                'category' => $category,
            ]);
        }
        abort(404);
    }
}
