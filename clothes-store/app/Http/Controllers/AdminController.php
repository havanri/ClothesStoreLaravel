<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        if(auth()->check()){
            return redirect(route("product.index"));
        }
        return view('admin.account.login');
    }
}
