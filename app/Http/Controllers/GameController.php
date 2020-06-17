<?php

namespace App\Http\Controllers;

use App\{Menu, Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function execute() {

        // Получить последний элемент url (будет равен номеру id)
        $game_id = last(request()->segments());

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();
        $game_one = DB::table('blogs')->where('id', '=', $game_id)->first();

            return view('site.category.category_game', [
                'menu' => $menus,
                'sliders' => $sliders,
                'game' => $game_one,
            ]);

    }
}
