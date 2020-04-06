<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companies = Company::get()->random(3);

        $array = json_decode(Storage::get('worker.json'), true);
        $workers = collect($array['workers'])->random(3);

        return view(
            'home',
            compact('companies', 'workers')
        );
    }
}
