@extends('user.layout')

@section('title', 'الكتب')

@section('content')
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-right">كل الكتب</h2>

    @if($books->count())
        <div class="space-y-4 text-right">
            @foreach ($books as $book)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold text-indigo-700">{{ $book->title }}</h3>
                    <p class="text-gray-600">المؤلف: {{ $book->author->name }} | التصنيف: {{ $book->category->name }}</p>
                    <a href="{{ route('books.show', $book) }}" class="text-indigo-600 hover:underline">عرض التفاصيل</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    @else
        <p class="text-gray-600">لا يوجد كتب حالياً.</p>
    @endif
@endsection
