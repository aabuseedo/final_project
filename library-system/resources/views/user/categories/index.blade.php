@extends('user.layout')

@section('title', 'التصنيفات')

@section('content')
    <h2 class="text-3xl font-bold text-indigo-700 mb-8 text-right">تصفح التصنيفات</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($categories as $category)
            <a href="{{ route('categories.show', $category) }}"
               class="group block bg-white rounded-xl shadow hover:shadow-md transition p-6 border border-gray-200 hover:border-indigo-400 text-right">
                
                <div class="space-y-2">
                    <div class="text-indigo-700 group-hover:text-indigo-900 text-xl font-semibold">
                        {{ $category->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                        عدد الكتب: {{ $category->books_count ?? $category->books()->count() }}
                    </div>
                </div>
            </a>
        @empty
            <p class="text-gray-600 col-span-full text-center">لا يوجد تصنيفات متاحة حالياً.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $categories->links() }}
    </div>
@endsection
