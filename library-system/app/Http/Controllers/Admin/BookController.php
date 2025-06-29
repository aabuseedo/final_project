<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     // عرض جميع الكتب

    public function index()
    {
            $books = Book::with(['author', 'category'])->paginate(10);
            return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // عرض نموذج إضافة كتاب جديد

    public function create()
    {
            $authors = Author::all();
            $categories = Category::all();
            return view('admin.books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // تخزين كتاب جديد في قاعدة البيانات

    public function store(Request $request)
    {
            $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            ]);

        Book::create($request->all());

        return redirect()->route('admin.books.index')->with('success', 'تم إضافة الكتاب بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // عرض نموذج تعديل كتاب موجود

    public function edit(Book $book)
    {
            $authors = Author::all();
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // تحديث بيانات كتاب

    public function update(Request $request, Book $book)
    {
            $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            ]);

        $book->update($request->all());

        return redirect()->route('admin.books.index')->with('success', 'تم تحديث بيانات الكتاب');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     // حذف كتاب

    public function destroy(Book $book)
    {
            $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'تم حذف الكتاب');
    }
}
