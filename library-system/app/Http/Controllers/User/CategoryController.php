<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    // عرض جميع التصنيفات مع ترقيم
    public function index()
    {
        $categories = Category::paginate(10);
        return view('user.categories.index', compact('categories'));
    }

    // عرض تفاصيل تصنيف معين مع الكتب التابعة له (مع المؤلف) وترقيم
    public function show(Category $category)
    {
        $books = $category->books()->with('author')->paginate(10);
        return view('user.categories.show', compact('category', 'books'));
    }
}
