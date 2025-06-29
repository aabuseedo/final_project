<header class="bg-white shadow sticky top-0 z-50" dir="rtl">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">

    <!-- شعار الموقع -->
    <div class="text-3xl font-extrabold text-indigo-700 select-none cursor-default">
      كتابي
    </div>

    <!-- القائمة الرئيسية -->
    <nav class="hidden md:flex space-x-10 space-x-reverse text-gray-700 font-semibold text-lg items-center">

      <a href="{{ route('user.home') }}" class="hover:text-indigo-600 transition duration-200 {{ request()->routeIs('user.home') ? 'text-indigo-700 font-bold' : '' }}">
        الرئيسية
      </a>

      <a href="{{ route('categories.index') }}" class="hover:text-indigo-600 transition duration-200 {{ request()->is('categories*') ? 'text-indigo-700 font-bold' : '' }}">
        التصنيفات
      </a>
      <a href="{{ route('books.index') }}" class="hover:text-indigo-600 transition duration-200 {{ request()->is('books*') ? 'text-indigo-700 font-bold' : '' }}">
        الكتب
      </a>
      <a href="{{ route('authors.index') }}" class="hover:text-indigo-600 transition duration-200 {{ request()->is('authors*') ? 'text-indigo-700 font-bold' : '' }}">
        المؤلفون
      </a>

      @auth
        <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
          @csrf
          <button type="submit" class="px-4 py-2 border border-indigo-600 text-indigo-700 bg-white rounded-full hover:bg-indigo-50 transition font-semibold">
            تسجيل خروج
          </button>
        </form>
      @else
        <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline ml-4">تسجيل دخول</a>
        <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">إنشاء حساب</a>
      @endauth

    </nav>
  </div>
</header>
