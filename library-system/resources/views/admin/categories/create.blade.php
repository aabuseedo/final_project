@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto max-w-3xl px-6">

    <!-- العنوان -->
    <div class="mb-10 text-right">
      <h2 class="text-3xl font-extrabold text-indigo-700">إضافة تصنيف جديد</h2>
    </div>

    <!-- رسائل الخطأ -->
    @if ($errors->any())
      <div class="bg-red-100 text-red-800 p-4 rounded-xl mb-6 shadow text-right">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>• {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- النموذج -->
    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-md space-y-6">
      @csrf

      <!-- اسم التصنيف -->
      <div>
        <label for="name" class="block font-bold mb-2 text-gray-700">اسم التصنيف</label>
        <input type="text" name="name" id="name"
               class="w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500 transition text-right"
               value="{{ old('name') }}" required>
      </div>

      <!-- الإجراءات -->
      <div class="flex justify-start gap-4">
        <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full font-semibold transition shadow">
          إضافة التصنيف
        </button>
        <a href="{{ route('admin.categories.index') }}"
           class="text-gray-600 hover:text-indigo-600 underline self-center font-medium transition">
          إلغاء
        </a>
      </div>
    </form>

  </div>
</div>
@endsection
