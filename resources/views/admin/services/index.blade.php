@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    الخدمات - service

                    <div style="float:left">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('services.create') }}" style="color:#fff;">إضافة خدمة جديدة</a>
                        </button>  
                    </div>
                </h3>

                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert {{session('alert') ?? 'alert-info'}}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table table-dark data-table">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">icon</th>
                                <th scope="col">العنوان</th>
                                <th scope="col">العنوان 2</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">العمليات</th>
                                <th scope="col">العمليات</th>
                            </tr>
                        </thead>
                          
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script type="text/javascript">

$(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('services.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'icon', name: 'icon'},
            {data: 'title', name: 'title'},
            {data: 'title1', name: 'title1'},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'actionone', name: 'actionone', orderable: false, searchable: false},
        ],
        dom: 'lBfrtip',
    });
    
  });


  $.fn.dataTable.ext.errMode = 'none';

    

    </script>
@endsection