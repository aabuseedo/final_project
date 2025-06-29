<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;

class AuthorController extends Controller
{
    // عرض قائمة المؤلفين مع عدد كتب كل مؤلف مع pagination
    public function index()
    {
        $authors = Author::withCount('books')->paginate(10);
        return view('user.authors.index', compact('authors'));
    }

    // عرض تفاصيل مؤلف معين مع كتب المؤلف (pagination)
    public function show(Author $author)
    {
        $books = $author->books()->paginate(10);
        return view('user.authors.show', compact('author', 'books'));
    }
}
