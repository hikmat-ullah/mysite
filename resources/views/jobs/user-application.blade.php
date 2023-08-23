@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">APPLIED JOB</div>
                <div class="card-body">
                    {{-- <table class="table">
                        <thead>
                            
                            <th></th>
                            <th class="text-center">Jobs</th>
                            <th>Adress</th>
                            <th>Type</th>
                            <th>status</th>
                            <th></th>
                           
                        </thead>
                        <tbody>
                            @foreach ($application as $item)
                                <tr>
                                    <td><img src="{{asset('uploads/logo')}}/{{$item->company->logo}}"style="width:50%;"></td>
                                   <td>{{$item->position}}</td>
                                   <td>{{$item->address}}</td>
                                   <td>{{$item->type}}</td>
                                   <td>N/A</td>
                                   <td></td>
                                  
                                </tr>
                            @endforeach
  
                        </tbody>
                    </table> --}}

                    <table class="table">
                        <tbody>
                            @foreach($application as $job)
                            
                            
                            <tr>
                                <td>
                                    @if(empty($job->company->logo))<img width="100" src="{{asset('avatar/man.jpg')}}">
                                    @else
                                    <img width="100" src="{{asset('uploads/logo')}}/{{$job->company->logo}}">
                                    @endif
                                </td>
                                <td>Position:{{$job->position}}
                                    <br>
                                    <i class="fa fa-clock-o"aria-hidden="true"></i>&nbsp;{{$job->type}}
                                </td>
                                <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address:{{$job->address}}</td>
                                <td><i class="fa fa-globe"aria-hidden="true"></i>&nbsp;Date:{{$job->created_at->diffForHumans()}}</td>

                                <?php $check  = jobstatus($job->id); ?>
                                @if ($check == 0)
                                <td> <span class="text-info">Status</span> N/A</td>
                                @else
                                <td> <span class="text-info">Status</span> Be Ready for Interview</td>
                                    
                                @endif
                               
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>







@endsection