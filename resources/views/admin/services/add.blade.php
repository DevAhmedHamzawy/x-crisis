@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">إضافة خدمة جديدة</h4></div>

                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('services.store') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="icon" class="col-md-2 col-form-label text-md-right"> icon</label>

                            <div class="col-md-10">
                                <input id="icon" type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}"  autocomplete="icon"   >

                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">العنوان</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title"   >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title1" class="col-md-2 col-form-label text-md-right"> العنوان 2</label>

                            <div class="col-md-10">
                                <input id="title1" type="text" class="form-control @error('title1') is-invalid @enderror" name="title1" value="{{ old('title1') }}"  autocomplete="title1"   >

                                @error('title1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">الوصف</label>
                        
                            <div class="col-md-10">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description">
                        
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                إضافة خدمة جديدة
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection