<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller
{
    // عرض قائمة الكتب مع المؤلف والتصنيف (pagination)
    public function index()
    {
        $books = Book::with(['author', 'category'])->paginate(10);
        return view('user.books.index', compact('books'));
    }

    // عرض تفاصيل كتاب معين
    public function show(Book $book)
    {
        return view('user.books.show', compact('book'));
    }
}