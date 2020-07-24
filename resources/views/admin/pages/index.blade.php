@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header">
                    صغحات الفوتر

                    <div style="float:left">
                        <button type="button" class="btn btn-primary">
                            <a href="{{ route('pages.create') }}" style="color:#fff;">إضافة صفحة جديدة</a>
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
                                <th scope="col">اسم الصفحة</th>
                                <th scope="col">مكان الصفحة</th>
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
        ajax: "{{ route('pages.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'place', name: 'place'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'actionone', name: 'actionone', orderable: false, searchable: false},
        ],
        dom: 'lBfrtip',
    });
    
  });


  $.fn.dataTable.ext.errMode = 'none';

    

    </script>
@endsection