<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     // عرض كل التصنيفات

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // نموذج إضافة تصنيف جديد

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // تخزين تصنيف جديد

    public function store(Request $request)
    {
            $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'تمت إضافة التصنيف بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // عرض التصنيف مع الكتب التابعة له

    public function show(Category $category)
    {
        $books = $category->books()->with('author')->paginate(10);
        return view('admin.categories.show', compact('category', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // عرض صفحة تعديل تصنيف

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // تحديث بيانات التصنيف

    public function update(Request $request, Category $category)
    {
       $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'تم تحديث التصنيف');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // حذف تصنيف

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'تم حذف التصنيف');
    }
}
