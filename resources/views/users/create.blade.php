@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
    <div class="content-wrapper">
            <section class="content-header">
                    <h1>
                        @yield('title')
                        <small>Tambah User</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> User</a></li>
                        <li class="active">Add User</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="box box-success">
                            <div class="box-header">
                                <div class="box-body">
                                    @card 
                                        @slot('title', 'Tambah User')

                                        @if (session('error'))
                                            @alert(['type' => 'danger'])
                                                {!! session('error') !!}
                                            @endalert
                                        @endif

                                        <form action="{{ route('users.store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                                    <option value="">Pilih</option>
                                                    @foreach ($role as $row)
                                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">{{ $errors->first('role') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-send"></i> Simpan
                                                </button>
                                            </div>
                                        </form>
                                            
                                        @slot('footer', '')
                                            
                                    @endcard
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    </div>
@endsection