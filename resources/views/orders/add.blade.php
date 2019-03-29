@extends('layouts.master')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ URL::asset('vendor/adminlte/bower_components/select2/dist/css/select2.css') }}">

@endsection
@section('title', 'Transaksi')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title')
                <small>Pengaturan Hak Akses</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Transaksi</li>
            </ol>
        </section>
        <section class="content" id="myapp">
            <div class="container-fluid">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="box-body">
                            <div class="row">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Produk</label>
                                                <select name="product_id" id="product_id" class="form-control select2" required width="100%">
                                                    <option value="">Pilih</option>
                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Qty</label>
                                                <input type="number" name="qty" id="qty" value="1" min="1" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                  
                                            </div>
                                        </div>
                                        
                                        <!-- MENAMPILKAN DETAIL PRODUCT -->
                                        <div  class="col-md-5">
                                            <h4>Detail Produk</h4>
                                            <div v-if="product.name">
                                                <table class="table table-stripped">
                                                    <tr>
                                                        <th>Kode</th>
                                                        <td>:</td>
                                                        <td>@{{ product.code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th width="3%">Produk</th>
                                                        <td width="2%">:</td>
                                                        <td>@{{ product.name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Harga</th>
                                                        <td>:</td>
                                                        <td>@{{ product.price | currency }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                        <!-- MENAMPILKAN IMAGE DARI PRODUCT -->
                                        <div class="col-md-3" v-if="product.photo">
                                            <img :src="'/uploads/product/' + product.photo" 
                                                height="150px" 
                                                width="150px" 
                                                :alt="product.name">
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<script src="{{ URL::asset('vendor/adminlte/bower_components/select2/dist/js/select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/transaksi.js') }}"></script>
@endsection
                       