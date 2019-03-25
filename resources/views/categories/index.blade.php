@extends('layouts.master')
​
@section('title', 'Manajemen Kategori')
    
​
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
    
        <!-- Main content -->
        <section class="content">
    
          <!-- Default box -->
          <div class="">
            
            <div class="">
              
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box">
                                    <div class="box-body">
                                        @card
                                    @slot('title', 'Tambah')
                                    
                                    @if (session('error'))
                                        @alert(['type' => 'danger'])
                                            {!! session('error') !!}
                                        @endalert
                                    @endif
        ​
                                    <form role="form" action="{{ route('kategori.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Kategori</label>
                                            <input type="text" 
                                            name="name"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                        </div>
                                    @slot('footer')
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                    @endslot
                                @endcard
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                               <div class="box">
                                   <div class="box-body">
                                    @card
                                        @slot('title', 'Daftar Kategori')
                                    
                                        @if (session('success'))
                                            @alert(['type' => 'success'])
                                                {!! session('success') !!}
                                            @endalert
                                        @endif
                                        
                                        
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Kategori</td>
                                                        <td>Deskripsi</td>
                                                        <td>Aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @forelse ($categories as $row)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $row->name }}</td>
                                                        <td>{{ $row->description }}</td>
                                                        <td>
                                                            <form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
          <!-- /.box -->
    
        </section>
        <!-- /.content -->
      </div>
@endsection


