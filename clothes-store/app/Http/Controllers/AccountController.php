<?php

namespace App\Http\Controllers;

use App\Services\IAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    private $accountService;
    public function __construct(IAccountService $iAccountService)
    {
        $this->accountService = $iAccountService;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        //
        return view("admin.account.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        DB::beginTransaction();
        try {
            $dataProductUpdate=[
                'name'=>$request->input('email'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ];
            $this->accountService->createRegister($dataProductUpdate);
            DB::commit();
            return redirect(route("account.login"));
        } catch (\Throwable $ex) {
            //throw $th;
            DB::rollBack();
            Log::error('Message '.$ex->getMessage().' Line '.$ex->getLine());
        }
        return view("account.register");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
        if(auth()->check()){
            return redirect(route("home"));
        }
        return view('admin.account.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        //
        $remember = $request->has('remember_me') ? true : false;
        $data = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'remember'=>$remember
        ];
        if($this->accountService->checkLogin($data)){
            return redirect(route("home"));
        }
        else {
            return view('admin.account.login');
        }
    }
     /**
    * Log the user out of the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function logout(Request $request)
    {
        auth()->logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect(route("home"));
    }
}
