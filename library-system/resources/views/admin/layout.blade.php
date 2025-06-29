<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>لوحة تحكم الأدمن</title>

    {{-- استدعاء ملفات CSS و JS باستخدام Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-tajawal text-gray-800 min-h-screen">

    {{-- رأس الصفحة --}}
    <div class="bg-gray-800 text-white px-6 py-4 shadow">
        <div class="container mx-auto flex items-center justify-between">

            {{-- عنوان اللوحة على اليمين --}}
            <h1 class="text-lg font-semibold">لوحة تحكم الأدمن</h1>

            {{-- قائمة التنقل بالوسط --}}
            <nav class="flex space-x-8 space-x-reverse">
                <a href="{{ route('admin.dashboard') }}" class="hover:underline">الرئيسية</a>
                <a href="{{ route('admin.categories.index') }}" class="hover:underline">التصنيفات</a>
                <a href="{{ route('admin.books.index') }}" class="hover:underline">الكتب</a>
                <a href="{{ route('admin.authors.index') }}" class="hover:underline">المؤلفين</a>
            </nav>

            {{-- زر تسجيل الخروج على اليسار --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit" 
              class="bg-white hover:bg-gray-100 px-4 py-1 rounded text-gray-800 font-semibold transition">
              تسجيل الخروج
            </button>
            </form>

        </div>
    </div>

    {{-- محتوى الصفحة --}}
    <div class="container mx-auto px-6 py-8">
        @yield('content')
    </div>

    {{-- تذييل الصفحة --}}
    <div class="bg-gray-200 text-center py-4 mt-10 shadow-inner">
        <p class="text-sm text-gray-600">© {{ date('Y') }} إدارة المكتبة - جميع الحقوق محفوظة</p>
    </div>

</body>
</html>
