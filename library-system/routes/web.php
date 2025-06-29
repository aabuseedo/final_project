<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// استدعاء كونترولرز الأدمن مع إعطائهم ألقاب لتجنب التعارض مع كونترولرز اليوزر
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// استدعاء كونترولرز اليوزر مع ألقاب
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\User\AuthorController as UserAuthorController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // الصفحة الرئيسية العامة بدون تسجيل دخول
    return view('welcome');
});

//----------------------------------------------------------------------------------------------------------------------------

// صفحة اللوحة الرئيسية dashboard
Route::get('/dashboard', function () {
    $user = Auth::user();

    // إذا كان المستخدم مسؤول (أدمن) يعاد توجيهه إلى لوحة تحكم الأدمن
    if ($user->isAdmin()) {
        return redirect()->route('admin.dashboard');
    } else {
        // وإلا يعرض صفحة الهوم للمستخدم العادي
        return redirect()->route('user.home');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//----------------------------------------------------------------------------------------------------------------------------

// مسارات محمية تتطلب تسجيل دخول
Route::middleware('auth')->group(function () {
    
    // صفحات إدارة الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // صفحة الهوم للمستخدم العادي
    Route::get('/user/home', [HomeController::class, 'index'])
        ->name('user.home')
        ->middleware('auth');
    /*
     * مسارات خاصة بالمستخدم العادي:
     * نسمح لهم فقط بعرض القوائم والتفاصيل (index و show)
     * باستخدام كونترولرز اليوزر User\
     */
    Route::resource('books', UserBookController::class)->only(['index', 'show']);
    Route::resource('categories', UserCategoryController::class)->only(['index', 'show']);
    Route::resource('authors', UserAuthorController::class)->only(['index', 'show']);
});

//----------------------------------------------------------------------------------------------------------------------------

// مسارات محمية خاصة بالأدمن (المسؤول) فقط
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // لوحة تحكم الأدمن
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // مسارات الأدمن لكل العمليات على الكتب، المؤلفين، والتصنيفات
    Route::resource('books', AdminBookController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('authors', AdminAuthorController::class);
});

//----------------------------------------------------------------------------------------------------------------------------

// تضمين ملف الروتس الخاص بالتوثيق (login, register, ...)
require __DIR__.'/auth.php';