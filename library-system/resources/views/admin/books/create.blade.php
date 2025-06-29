@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
    <div class="container mx-auto px-6">

        <!-- العنوان -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-indigo-700">إضافة كتاب جديد</h1>
            <p class="text-gray-500 mt-1">قم بإدخال بيانات الكتاب لإضافته إلى المكتبة</p>
        </div>

        <!-- عرض الأخطاء -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded-2xl mb-6 shadow-sm text-right font-medium">
                <ul class="list-disc list-inside pr-4">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- نموذج إضافة كتاب -->
        <form action="{{ route('admin.books.store') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-md space-y-6">
            @csrf

            <!-- عنوان الكتاب -->
            <div>
                <label for="title" class="block font-bold mb-2 text-gray-700">عنوان الكتاب</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-xl p-3 focus:ring-indigo-500 focus:border-indigo-500 text-right"
                       required>
            </div>

            <!-- المؤلف -->
            <div>
                <label for="author_id" class="block font-bold mb-2 text-gray-700">المؤلف</label>
                <select name="author_id" id="author_id"
                        class="w-full border border-gray-300 rounded-xl p-3 text-right focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    <option value="">اختر المؤلف</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- التصنيف -->
            <div>
                <label for="category_id" class="block font-bold mb-2 text-gray-700">التصنيف</label>
                <select name="category_id" id="category_id"
                        class="w-full border border-gray-300 rounded-xl p-3 text-right focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                    <option value="">اختر التصنيف</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- وصف الكتاب -->
            <div>
                <label for="description" class="block font-bold mb-2 text-gray-700">وصف الكتاب (اختياري)</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-xl p-3 text-right focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
            </div>

            <!-- الإجراءات -->
            <div class="flex justify-start gap-4">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full font-semibold transition shadow">
                    إضافة الكتاب
                </button>
                <a href="{{ route('admin.books.index') }}"
                   class="text-gray-600 hover:text-indigo-600 underline self-center font-medium transition">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
