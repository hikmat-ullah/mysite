@extends('layouts.main')
@section('content')
<div class="container">


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
         </div>	
        <div class="col-md-8">
            @if(Session::has('message'))
        <div class="alert alert-danger">
         {{Session::get('message')}}
         </div>
        @endif

            <div class="card">
                <div class="card-header">Filter Job Report</div>

                <div class="card-body">
                    <form action="{{route('search-job-data')}}" method="post">
                        @csrf
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group">
                              <label for="type">Type:</label>
                              <select class="form-control" name="type">
                                <option selected disabled>Select Type</option>
                                <option value="all">All</option>
                                  <option value="fulltime">fulltime</option>
                                    <option value="parttime">parttime</option>
                                    <option value="casual">casual</option>
                            </select>
                        </div>


                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                            <label for="type">Date Range:</label>
                            <input type="text" name="daterange" style="padding: 5%;border-color: #DFDFDF;" />
                      </div>

                      </div>
                      <div class="col-md-2">
                          <button type="submit" class="btn btn-primary" style="margin-top: 40%;">search</button>
                          
                      </div>
                    </form>
                  </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js" defer></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" defer></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>


<script>
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>

@endsection
