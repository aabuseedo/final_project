@extends('user.layout')

@section('title', 'الصفحة الرئيسية')

@section('content')

<!-- صورة ترحيبية (Hero Section) -->
<section class="relative rounded-xl overflow-hidden shadow-lg mb-8">
    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&w=1920&q=80"
         alt="صورة ترحيبية"
         class="w-full h-64 object-cover sm:h-80 md:h-96">

    <div class="absolute inset-0 bg-indigo-900 bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-3xl md:text-5xl font-bold mb-2">مرحباً بك في مكتبة المعرفة</h1>
            <p class="text-md md:text-xl">اكتشف كتباً مميزة وكتّاباً مبدعين في مختلف التصنيفات</p>
        </div>
    </div>
</section>

<!-- قسم المميزات -->
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10 text-center text-indigo-800">
    <div class="bg-white rounded-xl shadow p-6 hover:shadow-md transition">
        <div class="text-3xl mb-2">📚</div>
        <h3 class="font-bold text-lg">مكتبة شاملة</h3>
        <p class="text-sm text-gray-500">مئات الكتب في مجالات متنوعة</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6 hover:shadow-md transition">
        <div class="text-3xl mb-2">🧠</div>
        <h3 class="font-bold text-lg">محتوى معرفي</h3>
        <p class="text-sm text-gray-500">كتب تثري فكرك وتنمي ثقافتك</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6 hover:shadow-md transition">
        <div class="text-3xl mb-2">🔍</div>
        <h3 class="font-bold text-lg">تصفح سهل</h3>
        <p class="text-sm text-gray-500">واجهة بسيطة وسريعة الاستجابة</p>
    </div>
    <div class="bg-white rounded-xl shadow p-6 hover:shadow-md transition">
        <div class="text-3xl mb-2">📱</div>
        <h3 class="font-bold text-lg">متوافقة</h3>
        <p class="text-sm text-gray-500">تعمل على كافة الأجهزة المحمولة</p>
    </div>
</section>

<!-- المحتوى الرئيسي -->
<div class="flex flex-col md:flex-row gap-6">

    <!-- Sidebar: التصنيفات -->
    <aside class="md:w-1/4 w-full bg-white border border-gray-200 rounded-xl p-4 h-fit text-right shadow">
        <h3 class="text-xl font-semibold text-indigo-700 mb-4">التصنيفات</h3>

        <!-- رابط "أحدث الكتب" -->
        <a href="{{ route('user.home') }}"
           class="block mb-2 px-4 py-2 rounded-md font-medium
           {{ request('category') ? 'text-indigo-700 hover:bg-indigo-100' : 'bg-indigo-600 text-white' }}">
           أحدث الكتب
        </a>

        <!-- التصنيفات -->
        @foreach ($categories as $category)
            <a href="{{ route('user.home', ['category' => $category->id]) }}"
               class="block mb-2 px-4 py-2 rounded-md font-medium
               {{ request('category') == $category->id ? 'bg-indigo-600 text-white' : 'text-indigo-700 hover:bg-indigo-100' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </aside>

    <!-- Content: عرض الكتب -->
    <main class="flex-1 text-right">
        <h2 class="text-2xl font-bold text-indigo-700 mb-6">
            {{ request('category') ? 'الكتب حسب التصنيف' : 'أحدث الكتب' }}
        </h2>

        @if ($latestBooks->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($latestBooks as $book)
                    <div class="bg-white rounded-xl shadow p-4 flex flex-col justify-between h-full border border-gray-200">
                        <div class="text-right space-y-2 mb-4">
                            <a href="{{ route('books.show', $book) }}" class="text-indigo-700 font-bold text-lg hover:underline">
                                {{ $book->title }}
                            </a>
                            <p class="text-sm text-gray-600">المؤلف: {{ $book->author->name }}</p>
                            <p class="text-xs text-gray-500">التصنيف: {{ $book->category->name }}</p>
                        </div>
                        <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : url('/images/library-hero.jpg') }}"
                             alt="{{ $book->title }}"
                             class="w-full h-40 object-cover rounded">
                             
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center">لا توجد كتب متاحة لهذا التصنيف.</p>
        @endif
    </main>
</div>
@endsection
