@extends('layouts.dashboard')

@section('title')
Admin Dashboard
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('livewirestyles')
    @livewireStyles
@endsection

@section('content')
{{-- Categories --}}
    {{-- <livewire:counter> --}}
        <div class="card" style="
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)), url({{ asset('/dist/assets/images/yaksa/overlay.jpg')}});
        background-repeat: no-repeat;
        background-size: cover;">
            <div class="container mt-5" style="color: white; min-height: 70vh">
                <div class="inline-block text-center">
                    <span><img src="{{ asset('/dist/assets/images/yaksa/logo.png')}}" style="width: 2rem" alt="logo" class="dark-logo" /></span>
                    <span class="align-bottom">Yaksa Harmoni Global</span>
                </div>
                <h1 class="text-center">Call Handling Management System</h1>
                <hr class="my-2">
                <p></p>
                <p class="lead text-center">
                    <a class="btn btn-primary btn-lg btn-rounded" href="{{ route('recieveList') }}" role="button">See Data</a>
                </p>
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{$data['call_today']}}</h2>
                                        {{-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%
                                        </span> --}}
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Calls Today</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class="icon-call-in"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{$data['responded_call']}}</h2>
                                        {{-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%
                                        </span> --}}
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Responded Calls Today</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class="icon-phone"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{$data['ticket_closed']}}</h2>
                                        {{-- <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%
                                        </span> --}}
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ticket Closed Today</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i class="icon-call-end"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <img src="{{ asset('/dist/assets/images/yaksa/overlay.jpg')}}" width="30%" alt="" srcset=""> --}}
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

@section('livewirescripts')
    @livewireScripts
@endsection
