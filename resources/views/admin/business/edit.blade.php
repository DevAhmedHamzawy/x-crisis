@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">التعديل على بيانات business</h4></div>

                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('business.update', $business->id) }}">
                        @method('PATCH')
                        @csrf

                        

                        <div class="form-group row">
                            <label for="title1" class="col-md-2 col-form-label text-md-right">العنوان</label>

                            <div class="col-md-10">
                                <input id="title1" type="text" class="form-control @error('title1') is-invalid @enderror" name="title1" value="{{ $business->title1 }}" required autocomplete="title1"   >

                                @error('title1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title2" class="col-md-2 col-form-label text-md-right">العنوان 2</label>

                            <div class="col-md-10">
                                <input id="title2" type="text" class="form-control @error('title2') is-invalid @enderror" name="title2" value="{{ $business->title2 }}" required autocomplete="title2"   >

                                @error('title2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">الوصف</label>
                        
                            <div class="col-md-10">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $business->description }}" required autocomplete="description">
                        
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                    



                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                التعديل على بيانات business
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection