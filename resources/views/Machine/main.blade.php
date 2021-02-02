@extends('layouts.dashboard')

@section('title')
Admin Dashboard | ID Machine
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('livewirestyles')
    @livewireStyles
@endsection

@section('customcss')
<link href="{{ asset('/dist/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/dist/assets/extra-libs/prism/prism.css')}}">
@endsection

@section('content')
<div>
    @php
        $no = 0;
    @endphp
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
            role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Success - </strong> {{ session()->get('success') }}
        </div>
    @endif
    <div class="card-group">
        <div class="card col-md-4 bg-dark text-white rounded">
                <a href="{{route('addMachineRoute')}}">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <h4 class="mt-lg-2 mt-2 font-weight-bold text-white">Add New Machine</h4>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="plus" class="feather-icon"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="card text-dark bg-white">
        <div class="card-header">
            <h4 class="mb-0 text-dark">ID Machines</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered no-wrap">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Serial Number</th>
                            <th>ID Machine</th>
                            <th>Location</th>
                            <th>Equipment</th>
                            <th>SP</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($machines as $m)
                        <tr>
                            @php
                                $no = $no+1
                            @endphp
                            <td>{{$no}}</td>
                            <td>{{$m->machine_serial}}</td>
                            <td>{{$m->idmachine}}</td>
                            <td>{{$m->machine_location}}</td>
                            <td>{{$m->machine_equipment}}</td>
                            <td>{{$m->sp_name}}</td>
                            <td class="d-flex flex-row">
                                <a href="{{ route('editMachineRoute', ['id'=>$m->machine_id]) }}" class="mr-2">
                                    <span class="btn btn-cyan btn-rounded icon-pencil"></span>
                                </a>
                                <form action="{{ route('deleteMachineRoute', ['id'=>$m->machine_id]) }}" method="POST">
                                    <button type="submit" name="submit" class="btn btn-danger btn-rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @csrf
                                @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">please add data first</td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>no</th>
                            <th>Serial Number</th>
                            <th>ID Machine</th>
                            <th>Location</th>
                            <th>Equipment</th>
                            <th>SP</th>
                            <th>actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
    <script src="{{ asset('/dist/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/dist/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ asset('/dist/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/feather.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/dist/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="{{ asset('/dist/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/dist/dist/js/custom.min.js')}}"></script>
    <!--This page plugins -->
    <script src="{{ asset('/dist/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/dist/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{ asset('/dist/assets/extra-libs/prism/prism.js')}}"></script>
@endsection

@section('livewirescripts')
    @livewireScripts
@endsection
