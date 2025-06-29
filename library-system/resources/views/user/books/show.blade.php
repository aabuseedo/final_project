@extends('user.layout')

@section('title', 'تفاصيل الكتاب')

@section('content')
    <h2 class="text-3xl font-bold text-indigo-700 mb-4 text-right">
        {{ $book->title }}
    </h2>

    <p class="text-gray-600 mb-2 text-right">
        المؤلف: {{ $book->author->name }} | التصنيف: {{ $book->category->name }}
    </p>

    <div class="bg-white p-6 rounded-lg shadow text-right">
        @if($book->description)
            <p class="text-gray-800 whitespace-pre-line">{{ $book->description }}</p>
        @else
            <p class="text-gray-500">لا يوجد وصف لهذا الكتاب.</p>
        @endif
    </div>
@endsection
