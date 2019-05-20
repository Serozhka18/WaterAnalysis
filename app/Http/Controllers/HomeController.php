<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $results = auth()->user()->results()->with('region')->get();

        return view('home', ['results' => $results]);
    }
}
