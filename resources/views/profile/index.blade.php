@extends('layouts.main')

@section('content')


 
<div class="container">
 

    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->profile->avatar))
        <img src="{{asset('avatar/man.jpg')}}"width="100" style="width:100%;">
        @else 
        <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}"width="100" style="width:100%;">
        @endif

        <br><br>
          <form action="{{route('avatar')}}" method="POST" enctype="multipart/form-data">@csrf
             <div class="card">
            
            <div class="card-header">Update profile picture</div>
            @if($errors->has('avatar'))
            <div class="alert alert-danger" style="color:red;" style="font:small;">
             {{$errors->first('avatar')}}
         </div>
             @endif
            <div class="card-body">
               <input type="file" class="form-control" name="avatar"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
           
            </div>

           </div>
                
       </form>

       <br>
       <form action="{{route('intro-video')}}" id="upload_intro_video" method="POST" enctype="multipart/form-data">@csrf
        <div class="card">
          @if(Session::has('message1'))
          <div class="alert alert-success">
           {{Session::get('message1')}}
           </div>
          @endif
          
          <div class="alert alert-danger " role="alert" id="error" style="display: none;" >
           Please Upload Video 
          </div>
       <div class="card-header">Update Intro Video</div>
       <div class="card-body">
          <input type="file" class="form-control" id="introVideo" name="introVideo"><br>
          <button class="btn btn-success float-right" onclick="validation();" type="button">Update</button>
          
       </div>
      </div>
  </form>

  <script>
    function validation(){
      if (!$('#introVideo').val()) {
        $("#error").css("display", "block");
       
    }
    else{
      $("#upload_intro_video").submit();
    }



    }
  </script>
  




        </div>
        
        <div class="col-md-5">
        <div class="card">
        <div class="card-header">Update Your Profile</div>
        @if(Session::has('message'))
        <div class="alert alert-success">
         {{Session::get('message')}}
         </div>
        @endif
        <form action="{{route('profile.create')}}" method="POST">@csrf
        <div class="card-body">
            <div class="form-group">
             <label for="">Address</label>
             <input type="text" required class="form-control" name="address" value="{{Auth::user()->profile->address}}">
           @if($errors->has('address'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('address')}}
        </div>
         @endif


           </div>

            <div class="form-group">
             <label for="">Phone number</label>
             <input type="text"  value="{{Auth::user()->profile->phone_number}}"  required class="form-control" maxlength="12" onkeydown="phone_masking_event(event,this.id)" placeholder="03XX-XXXXXXX" id="phone" name="phone_number">

             <script>
              function phone_masking_event(e,change_id){
                var key = e.which || e.charCode || e.keyCode || 0;
                $phone = $('#'+change_id).val();
                if (key !== 8 && key !== 9) {
                  if ($phone.length === 4) {
                    $('#'+change_id).val($phone + '-');
                  }
                }
              }

             </script>
             @if($errors->has('phone_number'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('phone_number')}}
        </div>
         @endif
           </div>

           <div class="form-group">
             <label for="">Experience</label>
             <textarea required  name="experience"class="form-control" style="text-align: left;">{{Auth::user()->profile->experience}}</textarea>
             @if($errors->has('experience'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('experience')}}
        </div>
         @endif

            </div>

            <div class="form-group">
             <label for="">Bio</label>
             <textarea required name="bio"class="form-control" style="text-align: left;">{{Auth::user()->profile->bio}}</textarea>
             @if($errors->has('bio'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('bio')}}
        </div>
         @endif

            </div>

             <div class="form-group">
             <button class="btn btn-success" type="submit">Update</button>

            </div>
         </div>   




        </div>      
         </div>   
      </form>
         <div class="col-md-4">
           <div class="card">
            <div class="card-header">Your Information</div>
            <div class="card-body">
            <p>Name:{{Auth::user()->name}}</p>
               <p>Email:{{Auth::user()->email}}</p>
               <p>Phone number:{{Auth::user()->profile->phone_number}}
               <p>Gender:{{Auth::user()->profile->gender}}</p>
               <p>Experience:{{Auth::user()->profile->experience}}</p>
               <p>Bio:{{Auth::user()->profile->bio}}</p>
                <p>Member on:{{date('F d Y',strtotime(Auth::user()->profile->created_at))}}</p>

                @if(!empty(Auth::user()->profile->cover_letter))
                <p><a href="{{url("../storage/app/".Auth::user()->profile->cover_letter)}}">Cover letter</a></p>
                @else
                <p>Please Upload Cover letter</p>
                @endif


                @if(!empty(Auth::user()->profile->resume))
                <p><a href="{{url("../storage/app/".Auth::user()->profile->resume)}}">Resume</a></p>
                @else
                <p>Please Upload resume</p>
                @endif


                @if(!empty(Auth::user()->profile->video_bio))
                <a onclick="Indrovideo('{{Auth::user()->profile->video_bio}}' ,'{{Auth::user()->name}}')" >Intro Video </a>
                @else
                <p>Please Upload Intro </p>
                @endif


            </div>
           </div>
           <br>


<form action="{{route('cover.letter')}}" method="POST" enctype="multipart/form-data">@csrf
           <div class="card">
            <div class="card-header">Update coverletter</div>
            <div class="card-body">
               <input type="file" class="form-control" name="cover_letter"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
                @if($errors->has('cover_letter'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('cover_letter')}}
            @endif
            </div>
           </div>
   </form>        
           <br>
<form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">@csrf
             <div class="card">
            <div class="card-header">Update resume</div>
            <div class="card-body">
               <input type="file" class="form-control" name="resume"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
                @if($errors->has('resume'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('resume')}}
            @endif
            </div>
           </div>
       </form>
       



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
