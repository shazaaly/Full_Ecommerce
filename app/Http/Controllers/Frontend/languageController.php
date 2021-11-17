<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class languageController extends Controller
{
    //
    public function englishLang()
    {
        session()->get('language');
//        forget the previous language
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();

    }

    public function arabicLang()
    {
        session()->get('language');
//        forget the previous language
        session()->forget('language');
        Session::put('language', 'arabic');
        return redirect()->back();

    }
}
