<?php

namespace App\Http\Controllers;

use App\{Menu, Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function execute() {

        // Получить последний элемент url (Games, Reviews, Playstation)
        $category = last(request()->segments());

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();
        $intros = DB::table('intros')->where('category', '=', $category)->get();
        $menu_alias = DB::table('menus')->where('alias', '=', $category)->get();




        if (isset($intros->first()->category) && $intros->first()->category == $category) {

            return redirect()->route('category', [
                'category' => $category,
            ]);

        }

        if (isset($menu_alias->first()->alias) && $menu_alias->first()->alias == $category) {

            return view('site.category.category_menu', [
                'menu' => $menus,
                'menu_alias' => $menu_alias,
                'sliders' => $sliders,
            ]);

        }

       abort(404);
    }

    public function single() {

        // Получить последний элемент url (Games, Reviews, Playstation)
        $category = last(request()->segments());

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();
        // Где submenu !== null (orWhereNotNull)
        $menus_submenu = DB::table('menus')->where('submenu', '=', $category)->orWhereNotNull('submenu')->get()->first();
        $submenu = str_replace(" ", "-", $menus_submenu->submenu);

        if (isset($submenu) && $submenu == $category) {

            return view('site.category.category_submenu', [
                'menu' => $menus,
                'sliders' => $sliders,
                'category' => $category,
            ]);

        }

        abort(404);
    }

    public function contacts() {

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();


        return view('site.contacts', [
            'menu' => $menus,
            'sliders' => $sliders,
        ]);

    }

}
