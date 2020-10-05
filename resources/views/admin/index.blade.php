@extends('layouts.dashboard')

@section('title')
Admin Dashboard
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('content')
{{-- Categories --}}
<div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">{{$TotalCallRecieves}}</h2>
                        {{-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">
                            +18.33%
                        </span> --}}
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Call Recieves</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <a href="{{ route('recieveList') }}">
                    <span class="opacity-7 text-muted"><i data-feather="arrow-right-circle" class="feather-icon"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{$TotalCallResponses}}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Call Responses</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <a href="{{ route('responseList') }}">
                        <span class="opacity-7 text-muted"><i data-feather="arrow-right-circle" class="feather-icon"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Categories --}}

{{-- Sub Categories --}}
{{-- End Sub Categories --}}
@endsection

@section('plugins')
    <script src="{{ asset('/dist/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('/dist/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/feather.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/dist/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('/dist/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
@endsection
