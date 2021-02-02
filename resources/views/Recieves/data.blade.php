@extends('layouts.dashboard')

@section('title')
Admin Dashboard | Recieved call
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('customcss')
<link href="{{ asset('/dist/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/dist/assets/extra-libs/prism/prism.css')}}">
@endsection

@section('content')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
        role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success - </strong> {{ session()->get('success') }}
    </div>
@endif

<div class="card col-md-3 bg-dark text-white">
            <a href="{{ route('newCall') }}">
    <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
                <h4 class="mt-lg-2 mt-2 font-weight-bold text-white">Add Call Recieve</h4>
            <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="plus" class="feather-icon"></i></span>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="card text-dark bg-white">
    <div class="card-header">
        <h4 class="mb-0 text-dark">
            <a href="{{ url()->previous() }}" class="btn btn-danger">
                <span>Back</span>
            </a>
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Customer</th>
                        <th>ID Machine</th>
                        <th>Ticket No</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calls as $item)
                    <tr>
                        @php
                            $no = $no+1
                        @endphp
                        <td>{{$no}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->idNumber}}</td>
                        <td>{{$item->ticket_number}}</td>
                        <td>@if ($item->is_responded == 1)
                            Closed
                        @else
                            on-going
                        @endif</td>
                        <td>{{\Carbon\Carbon::parse($item->inputdate)->diffForHumans()}}</td>
                        <td class="d-flex flex-row">
                            <a href="{{ route('editCall', ['id'=>$item->recieve_id]) }}" class="mr-2">
                                <span class="btn btn-cyan btn-rounded icon-pencil"></span>
                            </a>
                            <a href="{{ route('callDetail', ['id'=>$item->recieve_id]) }}" class="mr-2">
                                <span class="btn btn-primary btn-rounded  icon-magnifier"></span>
                            </a>
                            <form action="{{ route('deleteCall', ['id'=>$item->recieve_id]) }}" method="POST">
                                <button type="submit" name="submit" class="btn btn-danger btn-rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            @csrf
                            @method('DELETE')
                            </form>

                            <a href="{{ route('callDetail', ['id'=>$item->recieve_id]) }}" class="mr-2">
                                <span class="btn btn-primary ml-1">Request Sparepart</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
