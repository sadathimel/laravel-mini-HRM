<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }
   
}
