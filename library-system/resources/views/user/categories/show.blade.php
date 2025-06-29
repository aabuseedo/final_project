@extends('user.layout')

@section('title', 'تفاصيل التصنيف')

@section('content')
    <h2 class="text-3xl font-bold text-indigo-700 mb-4 text-right">
        التصنيف: {{ $category->name }}
    </h2>

    <h3 class="text-2xl font-semibold text-indigo-600 mb-4 text-right">الكتب في هذا التصنيف:</h3>

    @if($books->count())
        <div class="space-y-4 text-right">
            @foreach ($books as $book)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-indigo-700">{{ $book->title }}</h4>
                    <p class="text-gray-600">المؤلف: {{ $book->author->name }}</p>
                    <a href="{{ route('books.show', $book) }}" class="text-indigo-600 hover:underline">عرض التفاصيل</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    @else
        <p class="text-gray-600">لا يوجد كتب في هذا التصنيف.</p>
    @endif
@endsection
