<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Dashboard (profile)
    public function dashboard() {

        //Чтобы сработал метод paginate, необходимо возвращать не коллекцию, поэтому используем метод where
        $profile = User::where('id','>=',1)->paginate(3);

        return view('admin.dashboard', ['profile_admin' => $profile]);
    }



}
