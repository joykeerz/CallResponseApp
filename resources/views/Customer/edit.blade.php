@extends('layouts.dashboard')

@section('title')
Admin Dashboard | Customers
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
<h4 class="card-title mt-5">Edit Customers</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <form action="{{ route('updateCustomerRoute',['id'=>$customer->customer_id]) }}" method="post">
                <div class="card-body">

                    <h4 class="card-title">customer name</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_customer_name" placeholder="Ex. Bank ABC" value="{{$customer->nama}}">
                    </div>

                    <h4 class="card-title">customer contact</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_customer_contact" placeholder="Insert Email or Phone Number" value="{{$customer->contact_phone}}">
                    </div>

                    <h4 class="card-title">Select Business Partner</h4>
                    <div class="form-group">
                      <select class="form-control" name="cb_bp" id="cb_bp">
                        <option disabled value="{{$customer->bp_id}}">Current : {{$customer->bp_name}}</option>
                          @forelse ($Bp as $B)
                            <option value="{{$B->bp_id}}">{{$B->bp_name}}</option>
                          @empty
                            <option>please add atleast one business Partner type first</option>
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
