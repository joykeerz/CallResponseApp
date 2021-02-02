@extends('layouts.dashboard')

@section('title')
Admin Dashboard | Recieved call
@endsection

@section('user')
{{ Auth::user()->name }}
@endsection

@section('customcss')
<link
    href="{{ asset('/dist/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
    rel="stylesheet">
@endsection

@section('content')
<h4 class="card-title mt-5">Edit Recieved call</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updateCall',['id'=>$data->recieve_id]) }}" method="post">

                    <h4 class="card-title">Job</h4>
                    <div class="form-group">
                        <select class="form-control" name="cb_job">
                            <option disabled value="{{$data->problem}}">
                                Current :
                                @if ($data->problem == '1')
                                PM
                                @elseif($data->problem == '21')
                                CM (Softwawre)
                                @elseif($data->problem == '22')
                                CM (Hardware)
                                @elseif($data->problem == '3')
                                Installation
                                @elseif($data->problem == '4')
                                Software Dev
                                @endif
                            </option>
                            <option value="1">PM</option>
                            <option value="21">CM(Software)</option>
                            <option value="22">CM(Hardware)</option>
                            <option value="3">Installation</option>
                            <option value="4">Software Development</option>
                        </select>
                    </div>

                    <h4 class="card-title">Description</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="tb_desc">{{$data->description}}</textarea>
                    </div>

                    <h4 class="card-title">Ticket Number</h4>
                    <div class="form-group">
                    <input type="text" class="form-control" name="tb_ticket_number" readonly value="{{$data->ticket_number}}">
                    </div>

                    <button class="btn btn-labeled btn-primary float-right mb-3" type="submit">
                        <input type="hidden" name="_method" value="PUT">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Update
                        @csrf
                    </button>
                </form>
                <a href="{{ url()->previous() }}" class="btn btn-danger">
                    <span>Back</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script src="{{ asset('/dist/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('/dist/assets/libs/popper.js/dist/umd/popper.min.js') }}">
</script>
<script src="{{ asset('/dist/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}">
</script>
<!-- apps -->
<!-- apps -->
<script src="{{ asset('/dist/dist/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('/dist/dist/js/feather.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script
    src="{{ asset('/dist/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}">
</script>
<script src="{{ asset('/dist/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<!-- themejs -->
<!--Menu sidebar -->
<script src="{{ asset('/dist/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('/dist/dist/js/custom.min.js') }}"></script>
<!--This page plugins -->
<script
    src="{{ asset('/dist/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('/dist/dist/js/pages/datatable/datatable-basic.init.js') }}">
</script>
@endsection
