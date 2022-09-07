@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="position-center">
                    <form role="form" action="{{ route('categoryProduct.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập giá sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea style="resize: none;" type="password" class="form-control" name="description"
                                placeholder="Nhập mô tả sản phẩm" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt sản phẩm</label>
                            <textarea style="resize: none;" type="password" class="form-control" name="content"
                                placeholder="Nhập tóm tắt sản phẩm" rows="6"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Danh mục sản phẩm</label>
                            <select name="category_product_id" class="form-control input-sm m-bot15">
                                @foreach ($categoryProducts as $categoryProduct)
                                    <option value="{{ $categoryProduct->id }}">{{ $categoryProduct->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Thương hiệu sản phầm</label>
                            <select name="brand_product_id" class="form-control input-sm m-bot15">
                                @foreach ($brandProducts as $brandProduct)
                                    <option value="{{ $brandProduct->id }}">{{ $brandProduct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm Danh Mục</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
@endsection
