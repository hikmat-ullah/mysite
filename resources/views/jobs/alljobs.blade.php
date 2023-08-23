@extends('layouts.main')
@section('content')


<style>
  .backgroundimage1{
   background: url('external/images/hero_2.jpg');

  }

  .backgroundimage2{
   background: url('external/images/hero_1.jpg');

  }
  .backgroundimage3{
   background: url('external/images/img_1.jpg');

  }
  .backgroundimage4{
   background: url('external/images/img_2.jpg');

  }

  .backgroundimage5{
   background: url('external/images/img_3.jpg');

  }
  .backgroundimage6{
   background: url('external/images/img_4.jpg');

  }
  .backgroundimage7{
   background: url('external/images/hero_1.jpg');

  }
  .backgroundimage8{
   background: url('external/images/hero_3.jpg');

  }
  .backgroundimage9{
   background: url('external/images/img_1.jpg');

  }
  .backgroundimage10{
   background: url('external/images/img_3.jpg');

  }
</style>


@include('../partials.hero')

<div class="container">
  <div class="row">
    {{-- <form action="{{route('alljobs')}}" method="GET">
      <div class="form-inline">
        <div class="form-group">
          <label>Position&nbsp;</label>
          <input type="text" name="position" class="form-control" placeholder="job position">&nbsp;&nbsp;&nbsp;
        </div>
        <div class="form-group">
          <label>Employment &nbsp;</label>
          <select class="form-control" name="type">
            <option value="">-select-</option>
            <option value="fulltime">fulltime</option>
            <option value="parttime">parttime</option>
            <option value="casual">casual</option>
          </select>
          &nbsp;&nbsp;
        </div>
        <div class="form-group">
          <label>category</label>
          <select name="category_id" class="form-control">
            <option value="">-select-</option>
            @foreach(App\Category::all() as $cat)
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
          </select>
          &nbsp;&nbsp;
        </div>
        <div class="form-group">
          <label>address</label>
          <input type="text" name="address" class="form-control" placeholder="address">&nbsp;&nbsp;
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
        </div>
      </div>
      <br>
    </form> --}}

    <div class="col-md-12">
        <div class="rounded border jobs-wrap">
            @if(count($jobs)>0)
                @foreach($jobs as $job)

              <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom @if($job->type=='parttime') partime @elseif($job->type=='fulltime')fulltime @else freelance   @endif;">
                <div class="company-logo blank-logo text-center text-md-left pl-3">
                  <img src="{{asset('uploads/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto">
                </div>
                <div class="job-details h-100">
                  <div class="p-3 align-self-center">
                    <h3>{{$job->position}}</h3>
                    <div class="d-block d-lg-flex">
                      <div class="mr-3"><span class="icon-suitcase mr-1"></span> {{$job->company->cname}}</div>
                      <div class="mr-3"><span class="icon-room mr-1"></span> {{str_limit($job->address,20)}}</div>
                      <div><span class="icon-money mr-1"></span>{{$job->salary}}</div>
                      <div>&nbsp;<span class="fa fa-clock-o mr-1"></span>{{$job->created_at->diffForHumans()}}</div>
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  @if($job->type=='fulltime')
                  <div class="p-3">
                    <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                  </div>
                  @elseif($job->type=='parttime')
                  <div class="p-3">
                    <span class="text-danger p-2 rounded border border-danger">{{$job->type}}</span>
                  </div>
                  @else
                   <div class="p-3">
                    <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                  </div>
                  @endif

                </div>  
              </a>

            @endforeach
            @else
            No jobs found
            @endif


            </div>
        </div>

{{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}

    </div>

</div>


<script>
  $(document).ready(function(){
    $(".noneedthis").css("height", "0");
  });
 

</script>

<script>
  $(document).ready(function(){
    var i=10;
    var element = $('#backgrounconver');
    (function myLoop(i) {
  setTimeout(function() {
    slider(i); 
    if(i<3){
        i=10;
      }            
      if (--i) myLoop(i);  
      
    }, 2000)
  })(i);  


   
    function slider(num){
    element.addClass('backgroundimage'+num);
    setTimeout(function() {
      element.removeClass('backgroundimage'+num);
    }, 
    2500);
    }



  });
</script>



@endsection

