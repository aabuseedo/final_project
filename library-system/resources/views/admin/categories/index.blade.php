@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto px-6">

    <!-- العنوان -->
    <div class="flex justify-between items-center mb-10">
      <h1 class="text-3xl font-extrabold text-indigo-700">قائمة التصنيفات</h1>

      @if(auth()->user() && auth()->user()->isAdmin())
        <a href="{{ route('admin.categories.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold shadow transition">
          + إضافة تصنيف جديد
        </a>
      @endif
    </div>

    <!-- رسالة نجاح -->
    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-4 rounded-xl mb-6 shadow text-right font-medium">
        {{ session('success') }}
      </div>
    @endif

    <!-- جدول التصنيفات -->
    <div class="bg-white rounded-3xl shadow-md overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200 text-right">
        <thead class="bg-indigo-50 text-indigo-700">
          <tr>
            <th class="px-6 py-4 text-sm font-bold">اسم التصنيف</th>
            <th class="px-6 py-4 text-sm font-bold text-center">الإجراءات</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse ($categories as $category)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 font-semibold text-indigo-800">
                {{ $category->name }}
              </td>
              <td class="px-6 py-4 text-center space-x-2 space-x-reverse">
                <a href="{{ route('admin.categories.show', $category) }}"
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1 rounded-full text-sm shadow transition">
                  عرض
                </a>

                @if(auth()->user() && auth()->user()->isAdmin())
                  <a href="{{ route('admin.categories.edit', $category) }}"
                     class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-1 rounded-full text-sm shadow transition">
                    تعديل
                  </a>

                  <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded-full text-sm shadow transition">
                      حذف
                    </button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="2" class="text-center text-gray-500 py-6">لا توجد تصنيفات حالياً.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <!-- روابط التصفح -->
      <div class="mt-6 p-4 border-t text-center bg-gray-50 rounded-b-3xl">
        {{ $categories->links() }}
      </div>
    </div>

  </div>
</div>
@endsection
