@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto max-w-3xl px-6 py-10">

    {{-- الأخطاء --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-800 p-4 rounded-2xl mb-6 shadow text-right">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>• {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- النموذج --}}
    <form action="{{ route('admin.authors.update', $author->id) }}" method="POST" class="bg-white p-8 rounded-3xl shadow-md space-y-6">
      @csrf
      @method('PUT')

      {{-- الاسم --}}
      <div class="text-right">
        <label for="name" class="block font-bold mb-2 text-gray-700">اسم المؤلف</label>
        <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}"
               class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
               placeholder="أدخل اسم المؤلف" required>
      </div>

      {{-- النبذة --}}
      <div class="text-right">
        <label for="bio" class="block font-bold mb-2 text-gray-700">نبذة عن المؤلف (اختياري)</label>
        <textarea name="bio" id="bio" rows="4"
                  class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                  placeholder="يمكنك كتابة نبذة قصيرة عن المؤلف">{{ old('bio', $author->bio) }}</textarea>
      </div>

      {{-- الأزرار --}}
      <div class="flex justify-start gap-3">
        <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-full transition shadow">
          تحديث البيانات
        </button>
        <a href="{{ route('admin.authors.index') }}"
           class="text-gray-600 hover:underline self-center font-medium">
          إلغاء
        </a>
      </div>
    </form>

  </div>
</div>
@endsection
