@extends('user.layout')

@section('title', 'تفاصيل المؤلف')

@section('content')
    <h2 class="text-3xl font-bold text-indigo-700 mb-4 text-right">{{ $author->name }}</h2>

    @if($author->bio)
        <p class="text-gray-700 mb-4 text-right">{{ $author->bio }}</p>
    @endif

    <h3 class="text-2xl font-semibold text-indigo-600 mb-4 text-right">كتب هذا المؤلف:</h3>

    @if($books->count())
        <div class="space-y-4 text-right">
            @foreach ($books as $book)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="text-xl font-bold text-indigo-700">{{ $book->title }}</h4>
                    <a href="{{ route('books.show', $book) }}" class="text-indigo-600 hover:underline">عرض التفاصيل</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    @else
        <p class="text-gray-600">لا يوجد كتب لهذا المؤلف.</p>
    @endif
@endsection
