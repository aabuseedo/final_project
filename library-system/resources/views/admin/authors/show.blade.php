@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto max-w-4xl px-6 py-16">

    <h2 class="text-3xl font-extrabold text-indigo-700 mb-6">{{ $author->name }}</h2>

    @if($author->bio)
      <p class="mb-8 whitespace-pre-line text-gray-700 leading-relaxed">
        {{ $author->bio }}
      </p>
    @endif

    <h3 class="text-2xl font-semibold mb-4 border-b border-indigo-300 pb-2 text-indigo-800">
      كتب المؤلف
    </h3>

    @if($books->count())
      <ul class="list-disc list-inside space-y-2 text-gray-800">
        @foreach($books as $book)
          <li>
            <a href="{{ route('admin.books.show', $book) }}" class="text-indigo-600 hover:underline">
              {{ $book->title }}
            </a>
          </li>
        @endforeach
      </ul>

      <div class="mt-6">
        {{ $books->links() }}
      </div>
    @else
      <p class="text-gray-600 mt-4">لا يوجد كتب لهذا المؤلف حتى الآن.</p>
    @endif

    <div class="mt-10 flex gap-4 justify-start">
      <a href="{{ route('admin.authors.edit', $author) }}"
         class="bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-2 rounded-full font-semibold shadow transition duration-300">
        تعديل
      </a>
      <a href="{{ route('admin.authors.index') }}"
         class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-full font-semibold shadow transition duration-300">
        عودة للقائمة
      </a>
    </div>

  </div>
</div>
@endsection
