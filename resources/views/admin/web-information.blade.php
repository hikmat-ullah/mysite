@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
         </div>	

        

        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Web Site Information</div>

                <div class="card-body">
                    <form method="POST" action="{{url('add-webinfor')}}">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Web Name</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" <?php if($data != null){?> value="{{$data->name}}" <?php } ?>  name="name">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">About</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="about" id="about" cols="35" rows="4" style="text-align: left" onkeyup="calculateabout();" maxlength="100"><?php if($data != null){?> {{$data->about}} <?php } ?> </textarea><span id="count"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">FaceBook Link</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" placeholder="https://" <?php if($data != null){?> value="{{$data->facebook}}" <?php } ?> name="facebook"  >

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Twitter Link</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" placeholder="https://"  name="twitter" <?php if($data != null){?> value="{{$data->twitter}}" <?php } ?> >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Instagram Link</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" placeholder="https://"  name="instagram" <?php if($data != null){?> value="{{$data->instagram}}" <?php } ?> >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">VkLink</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control" placeholder="https://"  name="vk" <?php if($data != null){?> value="{{$data->vk}}" <?php } ?> >

                            </div>
                        </div>


                        <div class="form-group row">
                           

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary mr-2" style="display:block;margin:auto;">Save</button>

                            </div>
                        </div>
                        

                      


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function calculateabout(){

        f = 0;
        var lengthabout = $("#about").val().length;
        if(lengthabout >= 100){
            $("#count").text(lengthabout + "/100");
            $("#count").css('color','red');
            f =1;
        }
        else{
            $("#count").css('color','gray');
            $("#count").text(lengthabout + "/100");
        }

    }
</script>
@endsection
