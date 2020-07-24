@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4 class="text-center">التعديل على المشروع</h4></div>

                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf


                        <div class="col-md-12" id="the_icon">
                            <img src="{{ $project->img_path }}" style="width:60px;height:60px;margin: 16px 47%;background-color: black;" class="rounded-circle" onclick="document.getElementById('image').click()" alt="Cinque Terre">
                            <h5 class="text-center">عدل الصورة من هنا</h5>
                            <input  style="display: none;"  id="image" type="file" name="the_image">
                        </div>

                        

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">العنوان</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $project->name }}"  autocomplete="name"   >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">الوصف</label>
                        
                            <div class="col-md-10">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $project->description }}"  autocomplete="description">
                        
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                    


                        <div class="form-group row">
                            <label for="link" class="col-md-2 col-form-label text-md-right">الرابط</label>

                            <div class="col-md-10">
                                <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $project->link }}"  autocomplete="link">

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        



                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary col-md-12">
                                التعديل على المشروع
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

    <script>
        function changeImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('.rounded-circle').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            changeImage(this);
        });
    </script>
    
@endsection