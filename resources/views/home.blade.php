@extends('layouts.master')

@section('title', 'Dashboard')


@section('content')
<div class="content-wrapper">
    <section class="content-header">
            <h1>
                @yield('title')
                <small>Halaman Utama</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="ontainer-fluid">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="box-body">

                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection
