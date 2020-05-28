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

    // Меню

    public function indexMenu()
    {
        $profile_menus = Menu::where('id', '>=', 1)->paginate(4);


        return view('admin.control.menu.menu_control', [
            'menu' => $profile_menus,
        ]);
    }

    public function indexAddMenu(Menu $menu, Request $request)
    {

        // Добавление
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            // Автоматическое создание алиаса и транслитерация автоматом внедрена
            $input['alias'] = Str::slug($request->name, '-');

            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input, [

                'name' => 'required|unique:menus|max:100',

            ], $massages);

            if ($validator->fails()) {
                // withInput сохраняет данные в сессию, и будет работать метод old
                return redirect()->route('menuAdd')->withErrors($validator)->withInput();
            }


            $menu->fill($input); // Заполняет поля модели данными

            if ($menu->save()) {
                return redirect('profile/menu-control')->with('status', 'Пункт меню добавлен');
            }

            abort(404);
        }

        return view('admin.control.menu.menuAdd_control');


    }

    public function indexEditMenu(Menu $menu, Request $request) {

        // Удаление
        if($request->isMethod('delete')) {
            $menu->delete();
            return redirect('profile/menu-control')->with('status','Пункт меню успешно удален');
        }

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');
            // Автоматическое создание алиаса и транслитерация автоматом внедрена
            $input['alias'] = Str::slug($request->name, '-');

            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input, [

                'name' => 'required|unique:menus|max:100',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('menuEdit',['menu'=>$input['id']])
                    ->withErrors($validator);
            }


            $menu->fill($input); // заполняем поля из переменной $input

            if($menu->update()) {
                return redirect('profile/menu-control')->with('status','Пункт меню отредактирован');
            }

        }


        $old = $menu->toArray();
        if(view()->exists('admin.control.menu.menuEdit_control')) {

            $data = [
                'data' => $old
            ];
            return view('admin.control.menu.menuEdit_control',$data);

        }

    }

    // Слайдер

    public function indexSlider()
    {
        $profile_sliders = Slider::where('id', '>=', 1)->paginate(2);
        $profile_intros = Intro::where('id', '>=', 1)->paginate(4);
        $profile_blogs = Blog::where('id', '>=', 1)->paginate(4);
        $profile_filters = Filter::where('id', '>=', 1)->paginate(4);
        $profile_videos = Video::where('id', '>=', 1)->paginate(4);
        $profile_features = Feature::where('id', '>=', 1)->paginate(4);

        return view('admin.control.slider.slider_control', [
            'sliders' => $profile_sliders,
            'intros' => $profile_intros,
            'blogs' => $profile_blogs,
            'videos' => $profile_videos,
            'features' => $profile_features,
            'filters' => $profile_filters,
        ]);
    }

    public function indexAddSlider(Slider $slider, Request $request)
    {

        // Добавление
        if ($request->isMethod('post')) {
            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:100',
                'text' => 'required',
                'img' => 'required',

            ], $massages);

            if ($validator->fails()) {
                // withInput сохраняет данные в сессию, и будет работать метод old
                return redirect()->route('sliderAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('img')) {
                $file = $request->file('img'); // имя поля загрузки на сервер

                $input['img'] = '123'; // Получить оригинальное имя файла, без пути
//
//                $file->move(public_path(),$input['img']); // сохраняем в каталог

            }

            dd($request->hasFile('img'));


            $slider->fill($input); // Заполняет поля модели данными

            if ($slider->save()) {
                return redirect('profile/slider-control')->with('status', 'Слайд успешно добавлен');
            }

            abort(404);
        }

        return view('admin.control.slider.sliderAdd_control');


    }

    public function indexEditSlider(Menu $menu, Request $request) {

        // Удаление
        if($request->isMethod('delete')) {
            $menu->delete();
            return redirect('profile/menu-control')->with('status','Пункт меню успешно удален');
        }

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input, [

                'name' => 'required|unique:menus|max:100',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('menuEdit',['menu'=>$input['id']])
                    ->withErrors($validator);
            }


            $menu->fill($input); // заполняем поля из переменной $input

            if($menu->update()) {
                return redirect('profile/menu-control')->with('status','Пункт меню отредактирован');
            }

        }


        $old = $menu->toArray();
        if(view()->exists('admin.control.menu.menuEdit_control')) {

            $data = [
                'data' => $old
            ];
            return view('admin.control.menu.menuEdit_control',$data);

        }

    }
}
