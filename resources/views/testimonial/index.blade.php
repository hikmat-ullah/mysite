@extends('layouts.main')
@section('content')

<div class="container">
  @if(Session::has('message'))
   <div class="alert alert-success">{{Session::get('message')}}</div>


  @endif
  <div class="row">
    <div class="col-md-4">
      @include('admin.left-menu')
    </div>
<div class="col-md-8">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Content</th>
      <th scope="col">Name</th>
      <th scope="col">Profession</th>
      <th scope="col">Video id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($testimonials as $testimonial)
    <tr>
    
      <td>{{str_limit($testimonial->content,30)}}</td>
      <td>{{$testimonial->name}}</td>
     
      <td>{{$testimonial->profession}}</td>
      

     <td>{{$testimonial->video_id}}</td>
     <td>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$testimonial->id}}">
        Delete
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$testimonial->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Do you want to delete the Testimonial?
              </div>
              <form action="{{route('delete-testimonial')}}" method="POST">@csrf
              <div class="modal-footer">
                <input type="hidden" name="id" value="{{$testimonial->id}}">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="submit"class="btn btn-danger">Delete</button>
              </div>
            </form>
            </div>
          </div>
        </div>

     </td>
   
    
    </tr>
   @endforeach
 
  </tbody>
</table>
{{$testimonials->links()}}
</div>
</div>

</div>


@endsection