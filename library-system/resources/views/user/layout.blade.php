<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'مكتبة المستخدم')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Tajawal&display=swap" />
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f9fafb;
            color: #333;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <header class="bg-indigo-600 text-white p-4 shadow flex justify-between items-center">
        <h1 class="text-lg font-bold">مكتبة المعرفة</h1>
        <nav class="space-x-6 space-x-reverse flex">
            <a href="{{ route('user.home') }}" class="hover:underline">الرئيسية</a>
            <a href="{{ route('categories.index') }}" class="hover:underline">التصنيفات</a>
            <a href="{{ route('books.index') }}" class="hover:underline">الكتب</a>
            <a href="{{ route('authors.index') }}" class="hover:underline">المؤلفين</a>
        </nav>
        <div>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-200">تسجيل خروج</button>
                </form>
            @endauth
        </div>
    </header>

    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>

    <footer class="bg-gray-100 text-center p-4 text-gray-600 text-sm">
        &copy; {{ date('Y') }} إدارة المكتبة - جميع الحقوق محفوظة
    </footer>

</body>
</html>
