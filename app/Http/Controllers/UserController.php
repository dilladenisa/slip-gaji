<?php

namespace App\Http\Controllers;


use App\Models\Upah;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index()
    {
        return view('admin.user', [
            'toma' => Upah::all()->count()
        ]);
    }
}
