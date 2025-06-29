<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //public function index()
    //{
    //    $categories = Category::all();
    //    $latestBooks = Book::with(['author', 'category'])->latest()->limit(5)->get();
//
   //     return view('user.home', compact('categories', 'latestBooks'));
   // }
   public function index(Request $request)
{
    $categories = Category::all();
    $selectedCategoryId = $request->query('category');

    $latestBooks = Book::with(['author', 'category'])
        ->when($selectedCategoryId, function ($query, $selectedCategoryId) {
            $query->where('category_id', $selectedCategoryId);
        })
        ->latest()
        ->get();

    return view('user.home', compact('categories', 'latestBooks', 'selectedCategoryId'));
}

}
