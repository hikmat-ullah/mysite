@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">JOBS POSTED</div>

                <div class="card-body">
                   
 <table class="table">
       <thead>
           <th></th>
           <th class="text-center">Jobs</th>
           <th>Adress</th>
           <th>Last Date</th>
           <th class="text-center">Action</th>
       </thead>
       <tbody>
        @foreach($jobs as $i=>$job)
      
        <tr>
            <td style="width:20%;">
                @if(empty(Auth::user()->company->logo))
                <img src="{{asset('avatar/man.jpg')}}"width="100" style="width:100%;">
                @else 
                <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"style="width:50%; margin-top:35px;">
                @endif
                <td>Position: <br>{{$job->position}}<br><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}  </td>
            <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Adress: <br>{{$job->address}}</td>
            <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date: <br> {{date('d-m-Y',strtotime($job->last_date))}}</td>
            <td style="display: flex;">
             <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><button class="btn btn-info btn-sm mr-2">View</button></a>
             <a href="{{route('job.edit',[$job->id])}}"><button class="btn btn-dark btn-sm mr-2">Edit</button></a>
             <a onclick="jobdelete('{{$job->id}}')"><button class="btn btn-danger btn-sm mr-2">Delete</button></a> 
             
             <a href="{{ url('disable-job/'.$job->id)}}"  <?php if($job->status == 1 ){ ?> style="display:display;" <?php } else {?> style="display:none;" <?php }?> id="disable{{$i}}"  ><button class="btn btn-warning btn-sm mr-2">Disable</button></a>
             <a  href="{{ url('enable-job/'.$job->id)}}" <?php if($job->status == 0 ){ ?> style="display:display;" <?php } else {?> style="display:none;" <?php }?> id="enable{{$i}}" ><button class="btn btn-secondary btn-sm mr-2">Enable</button></a>
           
            </td>
                

        </tr>
        @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="deletedModel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Conformation</h5>
          <button type="button" onclick="closemodel()"  class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Do you want to delete the Job?
          </div>
          <form action="{{route('delete-job')}}" method="POST">
              @csrf
          <div class="modal-footer">
            <input type="hidden" id="jobid" name="id" >
            <button type="button" onclick="closemodel()"  class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button  type="submit"class="btn btn-danger">Delete</button>
          </div>
      </div>
    </div>
  </div>




<script>
    $(document).ready(function(){});
    var APP_URL = {!! json_encode(url('/')) !!};
    
</script>


<script>

jQuery(document).ready(function () {
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
});


    function closemodel(){
        $("#deletedModel").hide();
    }

    function jobdelete(id){
        $("#jobid").val(id);
        $("#deletedModel").show();
       
    }


    // function jobddisable(jobid,id){

    //     jQuery.ajax({
    //             type: "post",
    //             url: "/disable-job",
    //             data: {jobid:jobid},
    //             success: function (data) {
    //                 console.log(data);
                   
    //             },
    //             error: function (response) {
    //             }
    //         });

    // }


</script>
@endsection
