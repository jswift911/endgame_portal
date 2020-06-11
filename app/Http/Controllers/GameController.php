<?php

namespace App\Http\Controllers;

use App\{Menu, Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function execute() {

        // Получить последний элемент url (Games, Reviews, Playstation)

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();
        $game_one = DB::table('blogs')->where('id', '=', $category)->first();


            return view('site.category.category_game', [
                'menu' => $menus,
                'sliders' => $sliders,
                'game' => $game_one,
            ]);

    }
}
