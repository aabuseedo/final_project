<x-app-layout>
  <div dir="rtl" class="bg-gray-50 min-h-screen py-10 font-tajawal text-gray-800">
    <div class="container mx-auto px-6">

      <!-- العنوان -->
      <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-indigo-700">مرحباً 👑 {{ Auth::user()->name }}</h1>
        <p class="text-lg text-gray-600 mt-3">أهلاً بك في لوحة التحكم لإدارة محتوى المكتبة الرقمية</p>
      </div>

      <!-- إحصائيات -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12 text-center">
        <!-- الكتب -->
        <div class="bg-white rounded-3xl shadow-md p-8 hover:shadow-lg transition duration-300">
          <div class="text-6xl text-indigo-600 mb-4 select-none">📚</div>
          <h2 class="text-2xl font-semibold mb-2">عدد الكتب</h2>
          <p class="text-3xl font-bold text-gray-800">{{ $booksCount ?? '...' }}</p>
          <a href="{{ route('books.index') }}" class="inline-block mt-4 text-indigo-700 hover:underline font-medium">إدارة الكتب</a>
        </div>

        <!-- المؤلفون -->
        <div class="bg-white rounded-3xl shadow-md p-8 hover:shadow-lg transition duration-300">
          <div class="text-6xl text-green-600 mb-4 select-none">🖋️</div>
          <h2 class="text-2xl font-semibold mb-2">عدد المؤلفين</h2>
          <p class="text-3xl font-bold text-gray-800">{{ $authorsCount ?? '...' }}</p>
          <a href="{{ route('authors.index') }}" class="inline-block mt-4 text-green-700 hover:underline font-medium">إدارة المؤلفين</a>
        </div>

        <!-- التصنيفات -->
        <div class="bg-white rounded-3xl shadow-md p-8 hover:shadow-lg transition duration-300">
          <div class="text-6xl text-yellow-500 mb-4 select-none">🏷️</div>
          <h2 class="text-2xl font-semibold mb-2">عدد التصنيفات</h2>
          <p class="text-3xl font-bold text-gray-800">{{ $categoriesCount ?? '...' }}</p>
          <a href="{{ route('categories.index') }}" class="inline-block mt-4 text-yellow-600 hover:underline font-medium">إدارة التصنيفات</a>
        </div>
      </div>

      <!-- تنبيه -->
      <div class="bg-yellow-100 border-l-4 border-yellow-500 p-5 rounded-lg text-right">
        <p class="text-sm text-yellow-800 leading-relaxed">
          📌 تنبيه: تأكد من مراجعة المحتوى بشكل دوري، وحذف أي بيانات غير ضرورية للحفاظ على جودة النظام.
        </p>
      </div>

    </div>
  </div>
</x-app-layout>
