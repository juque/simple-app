<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Student;

class HomeController extends Controller
{
  public function index(Request $request): View 
  {
    $search = $request->input('search');

    $students = Student::when($search, function($query, $search){
      $query->where('given_name', 'like', "%{$search}%")
            ->orWhere('middle_name', 'like', "%{$search}%")
            ->orWhere('surname', 'like', "%{$search}");
    })->paginate(10);

    return view('home', [
      'students' => $students,
      'search'   => $search
    ]);
  }
}
