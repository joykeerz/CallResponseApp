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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('alert'))
            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Alert - </strong> {{ session()->get('alert') }}
            </div>
         @endif
        <div class="card">
            <div class="card-body">
                <form action="{{route('newCalls')}}" method="post">
                    <h4 class="card-title">Select Customer</h4>
                    <div class="form-group d-flex justify-content-between">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="tb_user_id">
                        <select class="form-control mr-2" name="cb_customer">
                            @forelse (App\Customer::all() as $c)
                                <option value="{{$c->customer_id}}">{{$c->nama}}</option>
                            @empty
                                <option value="none" disabled>please insert customer first</option>
                            @endforelse
                        </select>
                        or
                        <a class="btn btn-success ml-2" href="{{route('mainCustomerRoute')}}" >New</a>
                    </div>

                    <h4 class="card-title">Serial Number</h4>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tb_serial_number">
                    </div>

                    <button class="btn btn-labeled btn-primary float-right mb-3" type="submit">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        next
                        @csrf
                    </button>
                </form>
                <a href="{{route('recieveList')}}" class="btn btn-danger">
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
