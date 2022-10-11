<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function getProductRequest($request)
    {
        $product = $request->except(['_token', 'image']);
        $imageProduct = $request->file('image');
        if ($imageProduct) {
            $fileNameHash = Str::random(20) . '-' . $imageProduct->getClientOriginalName();
            $path = $imageProduct->storeAs(
                'public/product',
                $fileNameHash
            );
            $product['image'] = Storage::url($path);
        } else {
            $product['image'] = '';
        }
        return $product;
    }

    public function add()
    {
        $categoryProducts = CategoryProduct::orderBy('id', 'desc')->get();
        $brandProducts = BrandProduct::orderBy('id', 'desc')->get();
        return view('admin.product.add', compact(['categoryProducts', 'brandProducts']));
    }

    public function all()
    {
        $products = Product::with(['brandProduct','categoryProduct'])->orderBy('id', 'desc')->get();
        return view('admin.product.all', compact('products'));
    }

    public function save(Request $request)
    {
        $product = $this->getProductRequest($request);
        Product::create($product);
        return redirect()->route('product.all')->with('message', 'Thêm sản phẩm thành công !!');
    }

    public function edit($id)
    {
        $categoryProducts = CategoryProduct::orderBy('id', 'desc')->get();
        $brandProducts = BrandProduct::orderBy('id', 'desc')->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact(['categoryProducts', 'brandProducts', 'product']));
    }

    public function update(Request $request, $id)
    {
        $product = $request->except(['_token', 'image']);
        $imageProduct = $request->file('image');
        if ($imageProduct) {
            $fileNameHash = Str::random(20) . '-' . $imageProduct->getClientOriginalName();
            $path = $imageProduct->storeAs(
                'public/product',
                $fileNameHash
            );
            $product['image'] = Storage::url($path);
        };
        Product::find($id)->update($product);
        return redirect()->route('product.all')->with('message', 'Cập nhật sản phẩm thành công');
    }

    public function delete($id)
    {
        Product::query()->find($id)->delete();
        return redirect()->route('product.all')->with('message', 'Xóa sản phẩm thành công !!');
    }

    public function unactive($id)
    {
        Product::query()->find($id)->update([
            'status' => 0
        ]);

        return redirect()->route('product.all')->with('message', 'Chỉnh trạng thái thành UnActive thành công');
    }

    public function active($id)
    {
        Product::query()->find($id)->update([
            'status' => 1
        ]);

        return redirect()->route('product.all')->with('message', 'Chỉnh trạng thái thành Active thành công');
    }
}
