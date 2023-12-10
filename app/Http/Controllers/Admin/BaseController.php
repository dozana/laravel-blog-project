<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BaseController extends Controller
{
    public function __construct()
    {
        View::share('locales', LaravelLocalization::getSupportedLocales());
    }
}
