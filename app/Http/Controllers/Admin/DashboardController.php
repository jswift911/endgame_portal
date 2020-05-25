<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class DashboardController extends Controller
{
    // Dashboard (profile)
    public function dashboard() {

        //Чтобы сработал метод paginate, необходимо возвращать не коллекцию, поэтому используем метод where
        $profile = User::where('id','>=',1)->orderBy('role', 'asc')->paginate(3);


        return view('admin.dashboard', [
            'profile_admin' => $profile,
        ]);
    }



}
