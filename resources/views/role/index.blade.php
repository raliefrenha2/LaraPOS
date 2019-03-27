@extends('layouts.master')

@section('title', 'Manajemen Role')
    
@section('content')
<div class="content-wrapper">
    <section class="content-header">
            <h1>
                @yield('title')
                <small>Pengaturan Hak Akses</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Role</li>
            </ol>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @card
                                        @slot('title', 'Tambah')
                                        
                                        @if (session('error'))
                                            @alert(['type' => 'danger'])
                                                {!! session('error') !!}
                                            @endalert
                                        @endif
            ​
                                        <form role="form" action="{{ route('role.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Role</label>
                                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                            </div>
                                        @slot('footer')
                                            <div class="card-footer">
                                                <button class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        @endslot
                                    @endcard
                                </div>
                                <div class="col-md-8">
                                    @card
                                        @slot('title')
                                        List Role
                                        @endslot
                                        
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
                                                        <td>Role</td>
                                                        <td>Guard</td>
                                                        <td>Created At</td>
                                                        <td>Aksi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @forelse ($roles as $role)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->guard_name }}</td>
                                                        <td>{{ $role->created_at }}</td>
                                                        <td>
                                                            <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
            ​
                                        <div class="float-right">
                                            {!! $roles->links() !!}
                                        </div>
                                        @slot('footer', '')
                                    @endcard
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection