<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories_count = Category::count();
        $courses_count = Course::count();
        $registrations_count = Registration::count();
        $users_count = User::count();
        return view('admin.index', compact('categories_count', 'courses_count','registrations_count', 'users_count'));
    }
}
