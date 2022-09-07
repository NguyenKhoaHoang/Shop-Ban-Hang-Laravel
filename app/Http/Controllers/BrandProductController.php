<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandProductController extends Controller
{
    public function add()
    {
        return view('admin.brand_product.add');
    }

    public function all()
    {
        $brandProducts = BrandProduct::all();
        return view('admin.brand_product.all', compact('brandProducts'));
    }

    public function save(Request $request)
    {
        BrandProduct::query()->create($request->except('_token'));
        return Redirect::route('brandProduct.add')->with('message', 'Thêm thương hiệu thành công!!');
    }

    public function edit($id)
    {
        $brandProduct = BrandProduct::query()->find($id);
        return view('admin.brand_product.edit', compact('brandProduct'));
    }

    public function update($id, Request $request)
    {
        BrandProduct::query()->find($id)->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('brandProduct.all')->with('message', 'Chỉnh sửa thương hiệu thành công !!');
    }

    public function delete($id)
    {
        BrandProduct::query()->find($id)->delete();
        return redirect()->route('brandProduct.all')->with('message', 'Xóa thương hiệu thành công !!');
    }

    public function unactive($id)
    {
        BrandProduct::query()->find($id)->update([
            'status' => 0
        ]);

        return Redirect::route('brandProduct.all')->with('message', 'Chỉnh trạng thái thành UnActive thành công');
    }

    public function active($id)
    {
        BrandProduct::query()->find($id)->update([
            'status' => 1
        ]);

        return Redirect::route('brandProduct.all')->with('message', 'Chỉnh trạng thái thành Active thành công');
    }
}
