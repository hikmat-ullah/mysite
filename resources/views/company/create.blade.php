@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
        <img src="{{asset('avatar/man.jpg')}}"width="100" style="width:100%;">
        @else
        <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"style="width:100%;">
        @endif

        <br><br>
  <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">@csrf
             <div class="card">
            <div class="card-header">Update Company Logo</div>
            <div class="card-body">
               <input type="file" class="form-control" name="company_logo"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
           
            </div>

           </div>
                  @if($errors->has('avatar'))
           <div class="alert alert-danger" style="color:red;" style="font:small;">
            {{$errors->first('avatar')}}
        </div>
            @endif
       </form>




        </div>
        
        <div class="col-md-5">
        <div class="card">
        <div class="card-header">Update Your Company Information</div>

       
        <form action="{{route('company.store')}}" method="POST">@csrf
        <div class="card-body">
            <div class="form-group">
             <label for="">Address</label>
             <input type="text" required class="form-control" name="address" value="{{Auth::user()->company->address}}" >
              </div>

            <div class="form-group">
             <label for="">Phone number</label>
             <input type="text" value="{{Auth::user()->company->phone}}"  required class="form-control" maxlength="12" onkeydown="phone_masking_event(event,this.id)" placeholder="03XX-XXXXXXX" id="phone" name="phone" >
        </div>
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

           <div class="form-group">
             <label for="">Website</label>
             <input type="text" required name="website"class="form-control" value="{{Auth::user()->company->website}}">
          

            </div>

            <div class="form-group">
             <label for="">Slogan</label>
            <input type="text" required  name="slogan"class="form-control" value="{{Auth::user()->company->cname}}">
            </div>

            <div class="form-group">
             <label for="">Description</label>
          <textarea name="description" required class="form-control" style="text-align: left;">{{Auth::user()->company->description}}</textarea>
            </div>



             <div class="form-group">
             <button class="btn btn-success" type="submit">Update</button>

            </div>




         </div>   




        </div>    
        @if(Session::has('message'))
        <div class="alert alert-success">
         {{Session::get('message')}}
         </div>
        @endif
         
         </div>   
</form>
         <div class="col-md-4">
           <div class="card">
            <div class="card-header">Your Information</div>
            <div class="card-body">
           <p>Company name:{{Auth::user()->company->cname}}</p>
           <p>Company Address:{{Auth::user()->company->address}}</p>
           <p>Company phone:{{Auth::user()->company->phone}}</p>
           <p>Company website: <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
       <p><a href="company/{{Auth::user()->company->slug}}">View</a></p>




            
            </div>
           </div>
           <br>


<form action="{{route('cover.photo')}}" method="POST" enctype="multipart/form-data">@csrf
           <div class="card">
            <div class="card-header">Update cover Image </div>
            <div class="card-body">
               <input type="file" class="form-control" name="cover_photo"><br>
               <button class="btn btn-success float-right" type="submit">Update</button>
                @if($errors->has('cover_letter'))
           <div class="alert alert-danger" style="color:red;">
            {{$errors->first('cover_letter')}}
            @endif
            </div>
           </div>
   </form>        




         </div>
        
    </div>
</div>
@endsection
