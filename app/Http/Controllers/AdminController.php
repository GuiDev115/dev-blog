<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        $data =[
            'pageTitle' => 'Dashboard'
        ];
        return view('back.pages.dashboard', $data);
    }
}
