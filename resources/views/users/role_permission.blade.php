@extends('layouts.master')

@section('title', 'Role Permission')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title')
                <small>Role Permission</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> User</a></li>
                <li class="active">Role Permission</li>
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
                                    @slot('title', 'Add New Permission')
                                    @if(session('permission_success'))
                                        @alert(['type' => 'success'])
                                            {!! session('permission_success') !!}
                                        @endalert
                                    @endif

                                    <form action="{{ route('users.add_permission') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'red':'' }}" >
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-sm">
                                                Add New
                                            </button>
                                        </div>
                                    </form>

                                    @slot('footer', '')
                                        
                                @endcard
                                </div>
                                <div class="col-md-8">
                                    @card
                                        @slot('title', 'Set Permission to Role')

                                        @if(session('success'))
                                            @alert(['type' => 'success'])
                                                {!! session('success') !!}
                                            @endalert
                                        @endif

                                        <form action="{{ route('users.roles_permission') }}" method="GET">
                                            <div class="form-group">
                                                <label for="">Roles</label>
                                                <div class="input-group">
                                                    <select name="role" class="form-control">
                                                        @foreach ($roles as $value)
                                                            <option value="{{ $value }}" {{ request()->get('role') == $value ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger">Check!</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        {{-- jika $permission tidak bernilai kosong --}}
                                        @if (!empty($permissions))
                                            <form action="{{ route('users.setRolePermission', request()->get('role')) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="form-group">
                                                    <div class="nav-tabs-custom">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a href="#tab_1" data-toggle="tab">Permissions</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab_1">
                                                                @php $no = 1; @endphp
                                                                @foreach ($permissions as $key => $row)
                                                                    <input type="checkbox" 
                                                                        name="permission[]" 
                                                                        class="minimal-red" 
                                                                        value="{{ $row }}"
                                                                        {{--  CHECK, JIKA PERMISSION TERSEBUT SUDAH DI SET, MAKA CHECKED --}}
                                                                        {{ in_array($row, $hasPermission) ? 'checked':'' }}
                                                                        > {{ $row }} <br>
                                                                    @if ($no++%4 == 0)
                                                                    <br>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="pull-right">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-send"></i> Set Permission
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
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