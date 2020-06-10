<?php

namespace App\Http\Controllers\Admin;

use App\Control;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Blog, Feature, Filter, Intro, Menu, Slider, Video};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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


        return view('admin.control.slider.slider_control', [
            'sliders' => $profile_sliders,
        ]);
    }

    public function indexAddSlider(Slider $slider, Request $request)
    {

        // Добавление
        if ($request->isMethod('post')) {
            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'mimes' => 'Изображения могут быть только формата: jpg, jpeg, png'

            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:100',
                'text' => 'required',
                'img' => 'required|mimes:jpg,jpeg,png',

            ], $massages);

            if ($validator->fails()) {
                // withInput сохраняет данные в сессию, и будет работать метод old
                return redirect()->route('sliderAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('img')) {
                $file = $request->file('img'); // имя поля загрузки на сервер

                $fileName = $file->getClientOriginalName(); // Получить оригинальное имя файла, без пути
                $input['img'] = 'assets/img/' . $fileName;

                // Куда, Откуда
                $file->move(public_path().'/assets/img', $fileName); // сохраняем в каталог

            }




            $slider->fill($input); // Заполняет поля модели данными

            if ($slider->save()) {
                return redirect('profile/slider-control')->with('status', 'Слайд успешно добавлен');
            }

            abort(404);
        }

        return view('admin.control.slider.sliderAdd_control');


    }

    public function indexEditSlider(Slider $slider, Request $request) {

        // Удаление
        if($request->isMethod('delete')) {
            File::delete($slider->img);
            $slider->delete();
            return redirect('profile/slider-control')->with('status','Слайд успешно удален');
        }

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'mimes' => 'Изображения могут быть только формата: jpg ,jpeg, png'

            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:50',
                'text' => 'required',
                'img' => 'mimes:jpg,jpeg,png',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('sliderEdit',['slider'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('img')) {
                // Удаляем старое изображение
                File::delete($input['old_images']);
                // Добавляем новое изображение
                $file = $request->file('img');
                $fileName = $file->getClientOriginalName();
                $input['img'] = 'assets/img/' . $fileName;
                $file->move(public_path().'/assets/img', $fileName);
            }
            else {
                // Если файл не загружен пользователем, используем старое из БД
                $input['img'] = $input['old_images'];
            }

            // при сохранении удаляем лишнее в нашем случае старое изображение
            unset($input['old_images']);


            $slider->fill($input); // заполняем поля из переменной $input

            if($slider->update()) {
                return redirect('profile/slider-control')->with('status','Слайд отредактирован');
            }

        }


        $old = $slider->toArray();
        if(view()->exists('admin.control.slider.sliderEdit_control')) {

            $data = [
                'data' => $old
            ];
            return view('admin.control.slider.sliderEdit_control',$data);

        }

    }

    // Интро

    public function indexIntro()
    {
        $profile_intros = Intro::where('id', '>=', 1)->paginate(2);


        return view('admin.control.intro.intro_control', [
            'intros' => $profile_intros,
        ]);
    }

    public function indexAddIntro(Intro $intro, Request $request)
    {
        // Выбираем все категории для <select>
        $intros = Intro::get('category');

        // Добавление
        if ($request->isMethod('post')) {
            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'not_in' => 'Выберите категорию из списка'

            ];


            $validator = Validator::make($input, [

                'category' => 'required|not_in:Выберите категорию',
                'title' => 'required|max:100',
                'text' => 'required',

            ], $massages);

            if ($validator->fails()) {
                // withInput сохраняет данные в сессию, и будет работать метод old
                return redirect()->route('introAdd')->withErrors($validator)->withInput();
            }


            $intro->fill($input); // Заполняет поля модели данными

            if ($intro->save()) {
                return redirect('profile/intro-control')->with('status', 'Блок "Интро" успешно добавлен');
            }

            abort(404);
        }

        return view('admin.control.intro.introAdd_control', ['intros' => $intros]);


    }

    public function indexEditIntro(Intro $intro, Request $request) {

        // distinct - уникальные значения (работает через DB)
        $intros = DB::table('intros')->select('category')->distinct()->get();

        // Удаление
        if($request->isMethod('delete')) {
            $intro->delete();
            return redirect('profile/intro-control')->with('status','Блок "Интро" успешно удален');
        }

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input, [

                'category' => 'required',
                'title' => 'required|max:100',
                'text' => 'required',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('introEdit',['intro'=>$input['id']])
                    ->withErrors($validator);
            }


            $intro->fill($input); // заполняем поля из переменной $input

            if($intro->update()) {
                return redirect('profile/intro-control')->with('status','Блок "Интро" отредактирован');
            }

        }


        $old = $intro->toArray();
        if(view()->exists('admin.control.intro.introEdit_control')) {

            $data = [
                'data' => $old,
                'intros' => $intros
            ];
            return view('admin.control.intro.introEdit_control',$data);

        }

    }

    // Блог

    public function indexBlog()
    {
        $profile_blogs = Blog::where('id', '>=', 1)->paginate(2);
        $profile_filters = Filter::where('id', '>=', 1)->paginate(4);


        return view('admin.control.blog.blog_control', [
            'blogs' => $profile_blogs,
            'filters' => $profile_filters,
        ]);
    }

    public function indexAddBlog(Blog $blog, Request $request)
    {

        // Добавление
        if ($request->isMethod('post')) {
            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'mimes' => 'Изображения могут быть только формата: jpg, jpeg, png',
                'min' => 'Текст слишком короткий',
                'max' => 'Заголовок слишком длинный',
            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:50',
                'text' => 'required|min:250',
                'img' => 'required|mimes:jpg,jpeg,png',

            ], $massages);

            if ($validator->fails()) {
                // withInput сохраняет данные в сессию, и будет работать метод old
                return redirect()->route('blogAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('img')) {
                $file = $request->file('img'); // имя поля загрузки на сервер

                $fileName = $file->getClientOriginalName(); // Получить оригинальное имя файла, без пути
                $input['img'] = 'assets/img/' . $fileName;

                // Куда, Откуда
                $file->move(public_path().'/assets/img', $fileName); // сохраняем в каталог

            }




            $blog->fill($input); // Заполняет поля модели данными

            if ($blog->save()) {
                return redirect('profile/blog-control')->with('status', 'Раздел "Блог" успешно добавлен');
            }

            abort(404);
        }

        return view('admin.control.blog.blogAdd_control');


    }

    public function indexEditBlog(Blog $blog, Request $request) {

        // Удаление
        if($request->isMethod('delete')) {
            File::delete($blog->img);
            $blog->delete();
            return redirect('profile/blog-control')->with('status','Раздел "Блог" успешно удален');
        }

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'mimes' => 'Изображения могут быть только формата: jpg, jpeg, png',
                'min' => 'Текст слишком короткий',
                'max' => 'Заголовок слишком длинный',

            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:50',
                'text' => 'required|min:250',
                'img' => 'mimes:jpg,jpeg,png',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('blogEdit',['blog'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('img')) {
                // Удаляем старое изображение
                File::delete($input['old_images']);
                // Добавляем новое изображение
                $file = $request->file('img');
                $fileName = $file->getClientOriginalName();
                $input['img'] = 'assets/img/' . $fileName;
                $file->move(public_path().'/assets/img', $fileName);
            }
            else {
                // Если файл не загружен пользователем, используем старое из БД
                $input['img'] = $input['old_images'];
            }

            // при сохранении удаляем лишнее в нашем случае старое изображение
            unset($input['old_images']);


            $blog->fill($input); // заполняем поля из переменной $input

            if($blog->update()) {
                return redirect('profile/blog-control')->with('status','Раздел "Блог" отредактирован');
            }

        }


        $old = $blog->toArray();
        if(view()->exists('admin.control.blog.blogEdit_control')) {

            $data = [
                'data' => $old
            ];
            return view('admin.control.blog.blogEdit_control',$data);

        }

    }

    // Видео

    public function indexVideo()
    {
        $profile_videos = Video::get(['id', 'title', 'text', 'img', 'video_link'])->first();


        return view('admin.control.video.video_control', [
            'videos' => $profile_videos,
        ]);
    }

    public function indexEditVideo(Video $video, Request $request) {

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'mimes' => 'Изображения могут быть только формата: jpg, jpeg, png',
                'min' => 'Текст слишком короткий',
                'max' => 'Заголовок слишком длинный',
                'url' => 'Значение должно быть ссылкой на видео',

            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:50',
                'text' => 'required|min:50',
                'img' => 'mimes:jpg,jpeg,png',
                'video_link' => 'url',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('videoEdit',['video'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('img')) {
                // Удаляем старое изображение
                File::delete($input['old_images']);
                // Добавляем новое изображение
                $file = $request->file('img');
                $fileName = $file->getClientOriginalName();
                $input['img'] = 'assets/img/' . $fileName;
                $file->move(public_path().'/assets/img', $fileName);
            }
            else {
                // Если файл не загружен пользователем, используем старое из БД
                $input['img'] = $input['old_images'];
            }

            // при сохранении удаляем лишнее в нашем случае старое изображение
            unset($input['old_images']);


            $video->fill($input); // заполняем поля из переменной $input

            if($video->update()) {
                return redirect('profile/video-control')->with('status','Видео отредактировано');
            }

        }


        $old = $video->toArray();
        if(view()->exists('admin.control.video.videoEdit_control')) {

            $data = [
                'data' => $old
            ];
            return view('admin.control.video.videoEdit_control', $data);

        }

    }

    // Слайдер

    public function indexFeature()
    {
        $profile_features = Feature::where('id', '>=', 1)->paginate(2);


        return view('admin.control.feature.feature_control', [
            'features' => $profile_features,
        ]);
    }

    public function indexEditFeature(Feature $feature, Request $request) {

        // Удаление
        if($request->isMethod('delete')) {
            File::delete($feature->img);
            $feature->delete();
            return redirect('profile/feature-control')->with('status','Блок "Feature" успешно удален');
        }

        // Редактирование
        if($request->isMethod('post')) {


            $input = $request->except('_token');


            $massages = [

                'required' => 'Поле :attribute обязательно к заполнению',
                'unique' => 'Поле :attribute должно быть уникальным',
                'mimes' => 'Изображения могут быть только формата: jpg ,jpeg, png'

            ];


            $validator = Validator::make($input, [

                'title' => 'required|max:50',
                'text' => 'required',
                'img' => 'mimes:jpg,jpeg,png',

            ], $massages);

            if($validator->fails()) {
                return redirect()
                    ->route('featureEdit',['feature'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('img')) {
                // Удаляем старое изображение
                File::delete($input['old_images']);
                // Добавляем новое изображение
                $file = $request->file('img');
                $fileName = $file->getClientOriginalName();
                $input['img'] = 'assets/img/' . $fileName;
                $file->move(public_path().'/assets/img', $fileName);
            }
            else {
                // Если файл не загружен пользователем, используем старое из БД
                $input['img'] = $input['old_images'];
            }

            // при сохранении удаляем лишнее в нашем случае старое изображение
            unset($input['old_images']);


            $feature->fill($input); // заполняем поля из переменной $input

            if($feature->update()) {
                return redirect('profile/feature-control')->with('status','Блок "Feature" отредактирован');
            }

        }


        $old = $feature->toArray();
        if(view()->exists('admin.control.feature.featureEdit_control')) {

            $data = [
                'data' => $old
            ];
            return view('admin.control.feature.featureEdit_control',$data);

        }

    }
}
