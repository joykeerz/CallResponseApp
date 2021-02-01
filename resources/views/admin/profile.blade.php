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
    <livewire:profile>
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
