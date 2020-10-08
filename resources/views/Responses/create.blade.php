@extends('layouts.dashboard')

@section('title')
Admin Dashboard | Call Response
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
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
        role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success - </strong> {{ session()->get('success') }}
    </div>
@endif
<h4 class="card-title mt-5">Add response for this call</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            {{-- <form action="{{ route('createResponse') }}" method="post">
                <div class="card-body">

                    <h4 class="card-title">Ticket Number</h4>
                    <div class="form-group">
                        <input type="text" readonly class="form-control bg-dark text-white" value="{{ $RecievedCall->ticket_number }}" name="tb_ticket_number">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="tb_user_id">
                        <input type="hidden" value="{{ $RecievedCall->recieve_id }}" name="tb_recieve_id">
                    </div>

                    <h4 class="card-title">Action Taken</h4>
                    <div class="form-group">
                        <select class="form-control" name="cb_action">
                            <option>guide by phone</option>
                            <option>pending</option>
                            <option>Site Visit</option>
                        </select>
                    </div>

                    <h4 class="card-title">Result</h4>
                    <div class="form-group">
                        <select class="form-control" name="cb_result">
                            <option>solved</option>
                            <option>unsolved</option>
                        </select>
                    </div>

                    <h4 class="card-title">Description</h4>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="tb_problem"></textarea>
                    </div>



                    <button class="btn btn-labeled btn-primary float-right mb-3" type="submit">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Add
                        @csrf
                    </button>
                </div>
            </form> --}}
            @livewire('response-form-wire', ['RecievedCall' => $RecievedCall])
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
