<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryProductController extends Controller
{
    public function add()
    {
        return view('admin.category_product.add');
    }

    public function all()
    {
        $categoryProducts = CategoryProduct::all();
        return view('admin.category_product.all', compact('categoryProducts'));
    }

    public function save(Request $request)
    {
        CategoryProduct::query()->create($request->except('_token'));
        return Redirect::route('categoryProduct.add')->with('message', 'Thêm danh mục thành công!!');
    }

    public function edit($id)
    {
        $categoryProduct = CategoryProduct::query()->find($id);
        return view('admin.category_product.edit', compact('categoryProduct'));
    }

    public function update($id, Request $request)
    {
        $categoryProduct = CategoryProduct::query()->find($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('categoryProduct.all')->with('message', 'Chỉnh sửa danh mục thành công !!');
    }

    public function delete($id)
    {
        CategoryProduct::query()->find($id)->delete();
        return redirect()->route('categoryProduct.all')->with('message', 'Xóa danh mục thành công !!');
    }

    public function unactive($id)
    {
        $categoryProduct = CategoryProduct::query()->find($id)->update([
            'status' => 0
        ]);

        return Redirect::route('categoryProduct.all')->with('message', 'Chỉnh trạng thái thành UnActive thành công');
    }

    public function active($id)
    {
        $categoryProduct = CategoryProduct::query()->find($id)->update([
            'status' => 1
        ]);

        return Redirect::route('categoryProduct.all')->with('message', 'Chỉnh trạng thái thành Active thành công');
    }
}
