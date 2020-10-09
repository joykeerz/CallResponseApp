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
            <form action="{{ route('createCall') }}" method="post">
                <div class="card-body">

                    <h4 class="card-title">Customer Name</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_customer_name">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="tb_user_id">
                    </div>

                    <h4 class="card-title">Customer Contact</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_customer_contact">
                    </div>

                    <h4 class="card-title">Location</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_location">
                    </div>

                    <h4 class="card-title">Equipment</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_equipment">
                    </div>

                    <h4 class="card-title">ID Number</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_id_number">
                    </div>

                    <h4 class="card-title">Job</h4>
                    <div class="form-group">
                        <select class="form-control" name="cb_job">
                            <option value="1">PM</option>
                            <option value="21">CM(Software)</option>
                            <option value="22">CM(Hardware)</option>
                            <option value="3">Installation</option>
                            <option value="4">Software Development</option>
                        </select>
                    </div>

                    <h4 class="card-title">Description</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="tb_desc"></textarea>
                    </div>

                    <h4 class="card-title">Ticket Number</h4>
                    <div class="form-group">
                    <input type="text" class="form-control" name="tb_ticket_number" readonly value="{{rand(1,100)}}">
                    </div>

                    <button class="btn btn-labeled btn-primary float-right mb-3" type="submit">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Add
                        @csrf
                    </button>
                </div>
            </form>
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
