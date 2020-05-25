<?php

namespace App\Http\Controllers\Admin;

use App\Control;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Blog, Feature, Filter, Intro, Menu, Slider, Video};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMenu()
    {
        $profile_menus = Menu::where('id', '>=', 1)->paginate(5);
        $profile_sliders = Slider::where('id', '>=', 1)->paginate(5);
        $profile_intros = Intro::where('id', '>=', 1)->paginate(5);
        $profile_blogs = Blog::where('id', '>=', 1)->paginate(5);
        $profile_filters = Filter::where('id', '>=', 1)->paginate(5);
        $profile_videos = Video::where('id', '>=', 1)->paginate(5);
        $profile_features = Feature::where('id', '>=', 1)->paginate(5);

        return view('admin.control.menu.menu_control', [
            'menu' => $profile_menus,
            'sliders' => $profile_sliders,
            'intros' => $profile_intros,
            'blogs' => $profile_blogs,
            'videos' => $profile_videos,
            'features' => $profile_features,
            'filters' => $profile_filters,
        ]);
    }

    public function indexAddMenu(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            // Автоматическое создание алиаса и транслитерация автоматом внедрена
            $input['alias'] = Str::slug($request->name, '-');

            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input, [

                'name' => 'required|unique:menus|max:255',

            ], $massages);

            if ($validator->fails()) {
                // withInput сохраняет данные в сессию, и будет работать метод old
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            $menu = new Menu();

            $menu->fill($input); // Заполняет поля модели данными

            if ($menu->save()) {
                return redirect('profile/menu-control')->with('status', 'Пункт меню добавлен');
            }

            abort(404);
        }

        return view('admin.control.menu.menuAdd_control');


    }

}
