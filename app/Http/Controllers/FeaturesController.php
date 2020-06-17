<?php

namespace App\Http\Controllers;

use App\{Feature, Menu, Slider};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    public function execute() {

        $menus = Menu::get(['id', 'name', 'alias', 'submenu']);
        $sliders = Slider::get(['id', 'text', 'title', 'img'])->first();
        $features = Feature::get(['id', 'text', 'title', 'img', 'created_at'])->first();

        return view('site.category.category_features', [
            'menu' => $menus,
            'sliders' => $sliders,
            'features' => $features,
        ]);

    }
}
