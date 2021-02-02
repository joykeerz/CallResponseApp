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
<h4 class="card-title mt-5">Add new Call</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('createCall',['id'=>$id]) }}" method="post">

                    <h4 class="card-title">Job</h4>
                    <div class="form-group">
                        <select class="form-control" name="cb_job">
                            <option value="1">PM</option>
                            <option value="21">CM(Software)</option>
                            <option value="22">CM(Hardware)</option>
                            <option value="3">Installation</option>
                            <option value="4">Software Development</option>
                            <option value="5">Force Majeure</option>
                            <option value="6">Others</option>
                        </select>
                    </div>

                    <h4 class="card-title">Reported Issue</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="tb_desc"></textarea>
                    </div>

                    <h4 class="card-title">Ticket Number</h4>
                    <div class="form-group">
                    <input type="text" class="form-control" name="tb_ticket_number" readonly value="{{rand(1,100)}}">
                    </div>

                    <button class="btn btn-labeled btn-primary float-right mb-3" type="submit">
                        <input type="hidden" value="{{$data->machine_location}}" name="tb_location">
                        <input type="hidden" value="{{$data->machine_equipment}}" name="tb_equipment">
                        <input type="hidden" value="{{$data->recieve_id}}" name="tb_recieve_id">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Add
                        @csrf
                    </button>
                </form>
                <form action="{{ route('cancelCalls', ['id'=>$data->recieve_id]) }}" method="POST">
                    <button type="submit" name="submit" class="btn btn-danger">
                        <span>Cancel</span>
                    </button>
                @csrf
                @method('DELETE')
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Customer Info</h4>
            </div>
            <div class="card-body">
                <span><h5><b>Name : </b></h5><p>{{$data->nama}}</p></span>
                <span><h5><b>Contact : </b></h5><p>{{$data->contact_phone}}</p></span>
                <span><h5><b>Business Partner : </b></h5><p>{{$data->bp_name}}</p></span>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ID Machine Info</h4>
            </div>
            <div class="card-body">
                <span><h5><b>ID Machine : </b></h5><p>{{$data->idmachine}}</p></span>
                <span><h5><b>Serial : </b></h5><p>{{$data->machine_serial}}</p></span>
                <span><h5><b>Location : </b></h5><p>{{$data->machine_location}}</p></span>
                <span><h5><b>Equipment : </b></h5><p>{{$data->machine_equipment}}</p></span>
                <span><h5><b>Service partner : </b></h5><p>{{$data->sp_name}}</p></span>
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
