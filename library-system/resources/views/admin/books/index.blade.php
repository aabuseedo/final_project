{{-- resources/views/admin/books/index.blade.php --}}
@extends('admin.layout')

@section('content')
<div dir="rtl" class="bg-gray-50 min-h-screen font-tajawal text-gray-800">
    <div class="container mx-auto px-6">

        <!-- العنوان -->
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-3xl font-extrabold text-indigo-700">قائمة الكتب</h1>

            @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('admin.books.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-3xl shadow-md transition duration-300">
                    + إضافة كتاب جديد
                </a>
            @endif
        </div>

        <!-- رسالة نجاح -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 text-green-800 p-4 rounded-2xl shadow-sm text-right font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <!-- جدول الكتب -->
        <div class="bg-white rounded-3xl shadow-md overflow-hidden">
            <table class="min-w-full text-right divide-y divide-gray-200">
                <thead class="bg-indigo-50 text-indigo-700">
                    <tr>
                        <th class="px-6 py-4 text-sm font-bold">العنوان</th>
                        <th class="px-6 py-4 text-sm font-bold">المؤلف</th>
                        <th class="px-6 py-4 text-sm font-bold">التصنيف</th>
                        <th class="px-6 py-4 text-sm font-bold text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($books as $book)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 font-semibold text-indigo-900">{{ $book->title }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $book->author->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $book->category->name }}</td>
                            <td class="px-6 py-4 text-center space-x-2 space-x-reverse whitespace-nowrap">
                                <a href="{{ route('admin.books.show', $book) }}"
                                    class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-full text-sm shadow-sm transition duration-300">
                                    عرض
                                </a>

                                <a href="{{ route('admin.books.edit', $book) }}"
                                    class="inline-block bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-full text-sm shadow-sm transition duration-300">
                                    تعديل
                                </a>

                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full text-sm shadow-sm transition duration-300">
                                        حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-8">لا توجد كتب حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- ترقيم الصفحات -->
            <div class="mt-6 p-4 border-t border-gray-200 text-center bg-gray-50 rounded-b-3xl">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
