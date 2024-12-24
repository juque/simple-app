<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;

class HomeController extends Controller
{
  public function index(): View 
  {
    return view('home', ['students' => Student::paginate(10)]);
  }
}
