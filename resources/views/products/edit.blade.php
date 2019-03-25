@extends('layouts.master')

@section('title', 'Manajemen Produk')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            @yield('title')
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="box box-warning">
                <div class="box-header">
                    <div class="box-body">
                        @if (session('error'))
                            @alert(['type' => 'danger'])
                                {!! session('error') !!}
                            @endalert
                        @endif

                        <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="">Kode Produk</label>
                                <input type="text" name="code" required 
                                    maxlength="10"
                                    readonly
                                    value="{{ $product->code }}"
                                    class="form-control {{ $errors->has('code') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="name" required 
                                    value="{{ $product->name }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" id="description" 
                                    cols="5" rows="5" 
                                    class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $product->description }}</textarea>
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="number" name="stock" required 
                                    value="{{ $product->stock }}"
                                    class="form-control {{ $errors->has('stock') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('stock') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="price" required 
                                    value="{{ $product->price }}"
                                    class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                <p class="text-danger">{{ $errors->first('price') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="category_id" id="category_id" 
                                    required class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}">
                                    <option value="">Pilih</option>
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}" {{ $row->id == $product->category_id ? 'selected':'' }}>
                                            {{ ucfirst($row->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{ $errors->first('category_id') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="photo" class="form-control">
                                <p class="text-danger">{{ $errors->first('photo') }}</p>
                                @if (!empty($product->photo))
                                    <hr>
                                    <img src="{{ asset('uploads/product/' . $product->photo) }}" 
                                        alt="{{ $product->name }}"
                                        width="150px" height="150px">
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-refresh"></i> Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
@endsection