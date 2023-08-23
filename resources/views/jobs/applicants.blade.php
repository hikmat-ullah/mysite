@extends('layouts.main')

@section('content')
<script src="https://use.fontawesome.com/98090fe0f2.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                 @foreach($applicants as $applicant)
                <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}">{{$applicant->title}}</a></div>
                <div class="card-body">
                  @foreach($applicant->users as $user)
                 <table class="table">
                   <thead>
                        <tr>
                          <th>Name:</th>
                          <th>Email:</th>
                          <th>Address:</th>
                          <th>Gender:</th>
                          <th>Bio:</th>
                          <th>Experience:</th>
                          <th >Document</th>
                          <th></th>
                          
                        </tr>
                      </thead>
                            <tbody>
                              <tr>
                                <td >{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->address}}</td>
                                <td>{{$user->profile->gender}}</td>
                                <td class="d-inline-block text-truncate" style="max-width: 150px;">{{$user->profile->bio}}</td>
                                <td>{{$user->profile->experience}}</td>
                                <td>
                                
                                  <a href="{{url("../storage/app/".$user->profile->resume)}}"><button class="btn btn-info btn-sm " style="width:100px;">Resume</button></a>
                                  <br>
                                  <a href="{{url("../storage/app/".$user->profile->cover_letter)}}"><button class="btn btn-info btn-sm my-2" style="width:100px;">Cover letter</button></a>
                                  <a onclick="Indrovideo('{{$user->profile->video_bio}}' ,'{{$user->name}}');"><button class="btn btn-info btn-sm" style="width:100px;">Intro Video</button></a>
                                </td>
                          
                                <td>
                                  <?php $enterview = jobaccetp($user->id,$applicant->id)?>
                                  @if ($enterview == 0 )
                                  <a href="{{url('accept/'.$user->id.'/'.$applicant->id)}}"><button class="btn btn-primary btn-sm mb-2" style="margin-left: -14px;width:80px;">Accept</button></a>
                                  @else
                                  <a href="{{url(url('chatify/'.$user->id))}}"><button class="btn btn-warning btn-sm" style="margin-left: -14px;">Interview</button></a>
                                  @endif
                              
                                </td>

                                
                                
                               
                              </tr>
                            
                            </tbody>
                          </table>


               
                              </div>
                              @endforeach
                              @endforeach

            </div>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="introvideo">
  <div class="modal-dialog modal-xl" role="document" >
    <div class="modal-content" id="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="titla_name"></h5>
        <button type="button"  onclick="closemodel();" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video class="embed-responsive-item" id="introclip"  controls >
          <source class="embed-responsive-item"  id ="introclip2" src="" type="video/mp4">
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" onclick="closemodel();" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function(){
    var APP_URL = {!! json_encode(url('/')) !!};
  });
 
  
</script>


<script>

  function closemodel(){
    $("#introvideo").hide();
   
  }

  function Indrovideo(id,name){
    $("#titla_name").text(name + " - Introduction Video ");

    var filename = id;
    var ext = filename.split('.')[1];
    // file = APP_URL;
    var origin   = window.location.href;

    fil_p =origin.split("\public");
    file_path = fil_p[0];

    file_path = file_path+"public/uploads/introVideo/"+filename
    if(ext == "mp4"){
        // file_path = filename;
        $("#introclip").attr('src', file_path);
        // $("#introclip2").attr('src', file_path);
        $("#introclip_html5").attr('src', file_path);
        $("#modal-content").css("width", "600");
        $("#introvideo").modal('show');
    }
    else{
        pdfpath = filename;
        window.open(pdfpath, '_blank');  
    }

  }
</script>
@endsection
