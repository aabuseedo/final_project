@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
  <div class="container mx-auto px-6">

    <!-- العنوان -->
    <div class="text-right mb-10">
      <h2 class="text-3xl font-extrabold text-indigo-700">
        الكتب في تصنيف: <span class="text-gray-900">{{ $category->name }}</span>
      </h2>
    </div>

    <!-- تحقق من وجود كتب -->
    @if($books->count() > 0)
      <div class="bg-white rounded-3xl shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-right">
          <thead class="bg-indigo-50 text-indigo-700">
            <tr>
              <th class="px-6 py-4 text-sm font-bold">العنوان</th>
              <th class="px-6 py-4 text-sm font-bold">المؤلف</th>
              <th class="px-6 py-4 text-sm font-bold text-center">الإجراءات</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @foreach ($books as $book)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-semibold text-indigo-800">{{ $book->title }}</td>
                <td class="px-6 py-4 text-gray-800">{{ $book->author->name }}</td>
                <td class="px-6 py-4 text-center space-x-2 space-x-reverse whitespace-nowrap">
                  <a href="{{ route('admin.books.show', $book) }}"
                     class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-1 rounded-full text-sm shadow-sm transition">
                    عرض
                  </a>
                  <a href="{{ route('admin.books.edit', $book) }}"
                     class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-1 rounded-full text-sm shadow-sm transition">
                    تعديل
                  </a>
                  <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded-full text-sm shadow-sm transition">
                      حذف
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-6 p-4 border-t text-center bg-gray-50 rounded-b-3xl">
          {{ $books->links() }}
        </div>
      </div>
    @else
      <div class="bg-yellow-100 text-yellow-800 p-5 rounded-xl shadow-sm text-right font-medium">
        لا توجد كتب في هذا التصنيف حتى الآن.
      </div>
    @endif

  </div>
</div>
@endsection
