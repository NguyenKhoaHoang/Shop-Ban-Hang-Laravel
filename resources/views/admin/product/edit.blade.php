@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="position-center">
                    <form role="form" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                                value="{{ $product->name }}">
                        </div>

                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm"
                                value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" class="form-control" name="image">{{ Str::substr($product->image,38) }}
                            <br>
                            <img src="{{ asset($product->image) }}" alt="Picture" width="300" height="300">
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea style="resize: none;" type="password" class="form-control" name="description"
                                placeholder="Nhập mô tả sản phẩm" rows="6">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt sản phẩm</label>
                            <textarea style="resize: none;" type="password" class="form-control" name="content" placeholder="Nhập tóm tắt sản phẩm"
                                rows="6">{{ $product->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_product_id" class="form-control input-sm m-bot15">
                                @foreach ($categoryProducts as $categoryProduct)
                                    @if ($categoryProduct->id == $product->category_product_id)
                                        <option selected value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}
                                        </option>
                                    @else
                                        <option value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Thương hiệu sản phầm</label>
                            <select name="brand_product_id" class="form-control input-sm m-bot15">
                                @foreach ($brandProducts as $brandProduct)
                                    @if ($brandProduct->id == $product->brand_product_id)
                                        <option selected value="{{ $brandProduct->id }}">{{ $brandProduct->name }}</option>
                                    @else
                                        <option value="{{ $brandProduct->id }}">{{ $brandProduct->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                @if ($product->status)
                                    <option selected value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                @else
                                    <option selected value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật Sản Phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
@endsection
