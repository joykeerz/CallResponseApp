@extends('layouts.dashboard')

@section('title')
Admin Dashboard | ID Machine
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
<h4 class="card-title mt-5">Edit ID Machine</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <form action="{{ route('updateMachineRoute',['id'=>$machine->machine_id]) }}" method="post">
                <div class="card-body">

                    <h4 class="card-title">Machine Serial</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_serial" placeholder="Insert machine id here" value="{{ $machine->machine_serial }}">
                    </div>

                    <h4 class="card-title">Location</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_location" placeholder="Ex. jl mangga dua, kemanggisan. jakarta"  value="{{ $machine->machine_location }}">
                    </div>

                    <h4 class="card-title">Equipment</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_equipment" placeholder="Insert machine's equipment here"  value="{{ $machine->machine_equipment }}">
                    </div>

                    <h4 class="card-title">Select SP</h4>
                    <div class="form-group">
                      <select class="form-control" name="cb_sp" id="cb_sp">
                          <option disabled value="{{ $machine->sp_id }}">Current : {{ $machine->sp_name }}</option>
                          @forelse ($sp as $s)
                            <option value="{{$s->sp_id}}">{{$s->sp_name}}</option>
                          @empty
                            <option>please add atleast one Service Partner type first</option>
                          @endforelse
                      </select>
                    </div>

                    <button class="btn btn-labeled btn-primary float-right mb-3" type="submit">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Update
                        @csrf
                        @method('PUT')
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
