@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="position-center">
                    <form role="form" action="{{ route('categoryProduct.update', ['id' => $categoryProduct->id]) }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục"
                                value="{{ $categoryProduct->name }}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả danh mục</label>
                            <textarea style="resize: none;" class="form-control" name="description"
                                placeholder="Nhập mô tả danh mục" rows="6">{{ $categoryProduct->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật Danh Mục</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
@endsection
