@extends('user.layout')

@section('title', 'المؤلفون')

@section('content')
    <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-right">قائمة المؤلفين</h2>

    @if($authors->count())
        <div class="space-y-4 text-right">
            @foreach ($authors as $author)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-xl font-bold text-indigo-700">{{ $author->name }}</h3>
                    <p class="text-gray-600">عدد الكتب: {{ $author->books_count }}</p>
                    <a href="{{ route('authors.show', $author) }}" class="text-indigo-600 hover:underline">عرض التفاصيل</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $authors->links() }}
        </div>
    @else
        <p class="text-gray-600">لا يوجد مؤلفين مسجلين حالياً.</p>
    @endif
@endsection
