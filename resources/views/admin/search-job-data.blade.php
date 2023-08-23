@extends('layouts.main')
@section('content')
<div class="container">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
         </div>	
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Information<span>Date: {{$date_to}} TO {{$date_from}}</span> </div>
                

                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Roles</th>
                                <th>Position</th>
                                <th>Type</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($job_detail as $item)
                               <tr>
                                   <td>{{$item->title}}</td>
                                   <td class="d-inline-block text-truncate" style="max-width: 150px;">{{$item->description}}</td>
                                   <td>{{$item->roles}}</td>
                                   <td>{{$item->position}}</td>
                                   <td>{{$item->type}}</td>
                                   <td>{{$item->salary}}</td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>

                  </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js" defer></script>
 

<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

@endsection
