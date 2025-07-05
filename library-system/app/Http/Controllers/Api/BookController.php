<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
public function index(Request $request)
{
    if ($request->has('category_id')) {
        $books = Book::with(['author', 'category'])
            ->where('category_id', $request->category_id)
            ->get();
    } else {
        $books = Book::with(['author', 'category'])->get();
    }

    return response()->json([
        'success' => true,
        'data' => $books
    ]);
}

public function show($id)
{
    $book = Book::with(['author', 'category'])->find($id);

    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'الكتاب غير موجود'
        ], 404);
    }

    return response()->json([
        'success' => true,
        'data' => $book
    ]);
}
}
