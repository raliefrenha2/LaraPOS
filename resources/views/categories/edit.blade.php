@extends('layouts.master')
​
@section('title')
    <title>Edit Kategori</title>
@endsection
​
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
​
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @card
                            @slot('title')
                                Edit
                            @endslot
                            

                            @if($errors->any())     
                                @foreach($errors->all() as $error)
                                    @alert(['type' => 'danger'])
                                        {{ $error }}
                                     @endalert
                                @endforeach
                             @endif
​                           {{ Form::open(array('route' => array('kategori.update', $kategori->id),'method' => 'POST','role' => 'form')) }}
                            <!-- <form role="form" action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                                @csrf -->
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    {{ Form::label('name', 'Kategori') }}
                                   <!--  <label for="name">Kategori</label> -->
                                  {{--  {!! Form::text('name', $kategori->name, array('class' => 'form-control'  )) !!} --}}
                                    <input type="text" 
                                        name="name"
                                        value="{{ $kategori->name }}"
                                        class="form-control {{ $errors->has('name') ? 'red':'' }}" id="name" value="{{ old('name') }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'red':'' }}">{{ $kategori->description }}</textarea>
                                </div>
                            @slot('footer')
                                <div class="card-footer">
                                    <button class="btn btn-info">Update</button>
                                </div>
                            {{ Form::close() }}
                            @endslot
                        @endcard
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
