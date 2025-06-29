@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto px-6">

    <!-- العنوان -->
    <div class="text-center mb-10">
      <h1 class="text-3xl font-extrabold text-indigo-700">تفاصيل الكتاب</h1>
      <p class="text-gray-500 mt-1">تفاصيل كاملة حول هذا الكتاب</p>
    </div>

    <!-- محتوى التفاصيل -->
    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-md p-10 space-y-6 text-right">

      <h2 class="text-4xl font-extrabold text-indigo-700">{{ $book->title }}</h2>

      <p class="text-lg text-gray-700">
        <span class="font-semibold text-indigo-800">المؤلف:</span>
        {{ $book->author->name }}
      </p>

      <p class="text-lg text-gray-700">
        <span class="font-semibold text-indigo-800">التصنيف:</span>
        {{ $book->category->name }}
      </p>

      @if($book->description)
        <div>
          <p class="font-semibold text-indigo-800 mb-2">الوصف:</p>
          <p class="text-gray-700 leading-relaxed text-base">{{ $book->description }}</p>
        </div>
      @endif

      <!-- الإجراءات -->
      <div class="pt-6 flex justify-start gap-4">
        @if(auth()->user() && auth()->user()->isAdmin())
          <a href="{{ route('admin.books.edit', $book) }}"
             class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded-full shadow transition">
            تعديل
          </a>
        @endif
        <a href="{{ route('admin.books.index') }}"
           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-full shadow transition">
          عودة للقائمة
        </a>
      </div>

    </div>

  </div>
</div>
@endsection
