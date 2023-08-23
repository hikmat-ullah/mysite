@extends('layouts.main')
@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-4">
            @include('admin.left-menu')
         </div>	
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-primary p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Total Jobs ({{$data_of_site[0]}})</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-secondary p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Job seeker ({{$data_of_site[1]}})</a>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-light p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Employer ({{$data_of_site[2]}})</a>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-info p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Company({{$data_of_site[3]}})</a>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-primary p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Live Jobs ({{$data_of_site[4]}})</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-secondary p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Disable Job ({{$data_of_site[5]}})</a>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-light p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Total Post ({{$data_of_site[6]}})</a>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="bg-light-warning px-6 py-6 rounded-2 me-7 mb-3 bg-info p-3 rounded">
                                <!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg') }}-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a  href="" class="text-dark font-weight-bold">Application({{$data_of_site[7]}})</a>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
