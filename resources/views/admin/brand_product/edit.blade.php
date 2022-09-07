@extends('admin_layout')
@section('admin_content')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="position-center">
                    <form role="form" action="{{ route('brandProduct.update', ['id' => $brandProduct->id]) }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục"
                                value="{{ $brandProduct->name }}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả thương hiệu</label>
                            <textarea style="resize: none;" class="form-control" name="description"
                                placeholder="Nhập mô tả danh mục" rows="6">{{ $brandProduct->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật Thương hiệu</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
@endsection
