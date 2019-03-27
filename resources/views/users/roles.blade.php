@extends('layouts.master')

@section('title', 'Set Role')

@section('content')
<div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title')
                <small>Set Role</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> User</a></li>
                <li class="active">Set Role</li>
            </ol>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="box box-default">
                    <div class="box-header">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-offset-2 col-md-8">
                                        <form action="{{ route('users.set_role', $user->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                            @card
                                                @slot('title', 'Set User Role')
                                                
                                                @if (session('success'))
                                                    @alert(['type' => 'success'])
                                                        {{ session('success') }}
                                                    @endalert
                                                @endif
                                                
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>:</td>
                                                                <td>{{ $user->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td>:</td>
                                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Role</th>
                                                                <td>:</td>
                                                                <td>
                                                                    @foreach ($roles as $row)
                                                                    <input type="radio" name="role" 
                                                                        {{ $user->hasRole($row) ? 'checked':'' }}
                                                                        value="{{ $row }}"> {{  $row }} <br>
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                @slot('footer')
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-sm float-right">
                                                            Set Role
                                                        </button>
                                                    </div>
                                                @endslot
                                            @endcard
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
    
@endsection
