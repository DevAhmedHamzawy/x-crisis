@extends('layouts.app')


@section('content')

    <div style="margin-top:200px;">

        <h5 class="text-center">{{ $page->title }}</h5>

        <br><br><br><br><br><br>
        
        <p class="text-center">{{ $page->body }}</p>

    </div>
    

@endsection