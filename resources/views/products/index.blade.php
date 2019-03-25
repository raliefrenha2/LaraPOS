@extends('layouts.master')

@section('title', 'Manajemen Produk')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                <div class="row">
             
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                            @card
                                @slot('title', 'Daftar Produk')
                            
                                @if (session('success'))
                                    @alert(['type' => 'success'])
                                        {!! session('success') !!}
                                    @endalert
                                @endif
                               
                                <a href="{{ route('produk.create') }}" 
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> Tambah
                                </a>
                               
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Nama Produk</td>
                                                <td>Stok</td>
                                                <td>Harga</td>
                                                <td>Kategori</td>
                                                <td>Last Update</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @forelse ($products as $product)
                                            <tr>
                                                <td> @if (!empty($product->photo))
                                                        <img src="{{ asset('uploads/product/' . $product->photo) }}" 
                                                            alt="{{ $product->name }}" width="50px" height="50px">
                                                    @else
                                                        <img src="http://via.placeholder.com/50x50" alt="{{ $product->name }}">
                                                    @endif
                                                </td>
                                                <td>
                                                    <sup class="label label-primary">({{ $product->code }})</sup>
                                                    <strong>{{ ucfirst($product->name) }}</strong></td>
                                                <td>{{ $product->stock }}</td>
                                                <td>Rp {{ number_format($product->price) }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->updated_at }}</td>
                                                <td>
                                                    <form action="{{ route('produk.destroy', $product->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="float-right">
                                        {!! $products->links() !!}
                                    </div>
                                </div>
                            @slot('footer','')
​                               
                        @endcard
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection