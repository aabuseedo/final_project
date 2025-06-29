@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto max-w-7xl px-6 py-16">

    <!-- العنوان + زر الإضافة -->
    <div class="flex justify-between items-center mb-10">
      <h1 class="text-3xl font-extrabold text-indigo-700">قائمة المؤلفين</h1>

      @if(auth()->user() && auth()->user()->isAdmin())
        <a href="{{ route('admin.authors.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full shadow transition duration-300 font-semibold">
          + إضافة مؤلف جديد
        </a>
      @endif
    </div>

    <!-- رسالة نجاح -->
    @if(session('success'))
      <div class="mb-6 bg-green-100 text-green-800 p-4 rounded-xl shadow text-right font-semibold">
        {{ session('success') }}
      </div>
    @endif

    <!-- جدول المؤلفين -->
    <div class="bg-white rounded-3xl shadow-md overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200 text-right">
        <thead class="bg-indigo-50 text-indigo-700">
          <tr>
            <th class="px-6 py-4 text-sm font-bold uppercase">اسم المؤلف</th>
            <th class="px-6 py-4 text-sm font-bold uppercase">عدد الكتب</th>
            <th class="px-6 py-4 text-sm font-bold uppercase text-center">الإجراءات</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($authors as $author)
            <tr class="hover:bg-indigo-50 transition">
              <td class="px-6 py-4 font-semibold text-gray-800 whitespace-nowrap">{{ $author->name }}</td>
              <td class="px-6 py-4 text-gray-700 whitespace-nowrap">{{ $author->books_count }}</td>
              <td class="px-6 py-4 text-center space-x-2 space-x-reverse whitespace-nowrap">
                <a href="{{ route('admin.authors.show', $author) }}" 
                   class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-full text-sm shadow-sm transition duration-300">
                  عرض
                </a>

                @if(auth()->user() && auth()->user()->isAdmin())
                  <a href="{{ route('admin.authors.edit', $author) }}" 
                     class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-full text-sm shadow-sm transition duration-300">
                    تعديل
                  </a>

                  <form action="{{ route('admin.authors.destroy', $author) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full text-sm shadow-sm transition duration-300">
                      حذف
                    </button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="px-6 py-8 text-center text-gray-500">لا يوجد مؤلفون حالياً.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="mt-6 p-4 border-t border-indigo-100 bg-indigo-50 text-center rounded-b-3xl">
        {{ $authors->links() }}
      </div>
    </div>

  </div>
</div>
@endsection
