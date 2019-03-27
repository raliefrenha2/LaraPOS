@extends('layouts.master')

@section('title', 'Manajemen User')

@section('content')
    <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('title')
                    <small>Edit User</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> User</a></li>
                    <li class="active">Edit User</li>
                </ol>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="box box-success">
                        <div class="box-header">
                            <div class="box-body">
                                @card 
                                    @slot('title', 'Edit User')

                                    @if (session('error'))
                                        @alert(['type' => 'danger'])
                                            {!! session('error') !!}
                                        @endalert
                                    @endif

                                    <form action="{{ route('users.update', $user->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="name" 
                                                    value="{{ $user->name }}"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" 
                                                    value="{{ $user->email }}"
                                                    class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" 
                                                    required readonly>
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" 
                                                    class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                                <p class="text-warning">Biarkan kosong, jika tidak ingin mengganti password</p>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-send"></i> Update
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