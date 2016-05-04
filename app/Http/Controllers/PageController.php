<?php
/**
 * Created by PhpStorm.
 * User: Lely
 * Date: 18/02/2016
 * Time: 8:56
 */

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['getLogin']]);
        $this->middleware('auth', ['only' => ['dashboard']]);
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function token()
    {
        return csrf_token();
    }

    public function dashboard()
    {
        return view('pages.index');
    }

//    public function backoffice()
//    {
//        if (session('level') >= 100) {
//            return view('back.dashboard');
//        } else {
//            return redirect('api/v1/logout');
//        }
//    }
//
//    public function frontoffice()
//    {
//        if (session('level') <= 99) {
//            return view('front.dashboard');
//        } else {
//            return redirect('api/v1/logout');
//        }
//    }
}