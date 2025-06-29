<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $booksCount = Book::count();
        $authorsCount = Author::count();
        $categoriesCount = Category::count();
        $usersCount = User::count();
        
        return view('admin.dashboard', compact('booksCount', 'authorsCount', 'categoriesCount', 'usersCount'));
    }
}
