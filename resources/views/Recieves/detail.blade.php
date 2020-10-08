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
<h4 class="card-title mt-5">Recieved call Details</h4>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card border-dark">
                <div class="card-header bg-dark">
                    <h4 class="mb-0 text-white">Call Info</h4>
                </div>
                <div class="card-body">
                    <h3 class="card-title">call id : {{$RecievedCall->recieve_id}}</h3>
                    <p class="card-text">
                        <label class="form-control">Customer : {{$Customer->nama}} - {{$RecievedCall->customer_id}}<br></label>
                        <label class="form-control">Contact : {{$Customer->contact_phone}}<br></label>
                        <label class="form-control">User id : {{$RecievedCall->user_id}}<br></label>
                        <label class="form-control">Location : {{$RecievedCall->location}}<br></label>
                        <label class="form-control">Equipment : {{$RecievedCall->equipment}}<br></label>
                        <label class="form-control">ID Number : {{$RecievedCall->idNumber}}<br></label>
                        <label class="form-control">Problem : {{$RecievedCall->problem}}<br></label>
                        <label class="form-control">Ticket Number : {{$RecievedCall->ticket_number}}<br></label>
                        <label class="form-control">Input Date : {{$RecievedCall->created_at}}<br></label>
                    </p>
                </div>
            </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
            <ul class="list-group">
                <li class="list-group-item active bg-dark">
                    @if (count($callResponses)>0)
                    <span class="badge badge-primary">Responded</span>
                        @if ($RecievedCall->is_responded == '1')
                            <span class="badge badge-info">closed</span>
                        @else
                            <span class="badge badge-info">On Progress</span>
                        @endif
                    @else
                        <span class="badge badge-danger"> No Respond</span>
                    @endif
                </li>

                <li class="list-group-item">
                    @if (count($callResponses)>0)
                    @if ($RecievedCall->is_responded == '1')
                            <span class="badge badge-success">This ticket has been closed</span>
                        @else
                            <a href="{{ route('addResponse',['id'=>$RecievedCall->recieve_id]) }}" class="badge badge-info">+</a>
                            {{-- <a href="{{ route('closeResponse',['id'=>$RecievedCall->recieve_id]) }}" class="badge badge-success"> --}}
                                {{-- <i class="fa fa-check" aria-hidden="true"></i> --}}
                            {{-- </a> --}}
                            <form action="{{ route('closeResponse',['id'=>$RecievedCall->recieve_id]) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <button type="submit" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                            </form>
                        @endif
                    @else
                        This call haven't been responded yet<br>
                        <form action="{{ route('openResponse')}}" method="POST">
                            <input type="hidden" value="{{$RecievedCall->recieve_id}}" name="tb_recieve_id">
                            @csrf
                            <button type="submit" class="btn btn-info">Open Ticket</button>
                        </form>
                    @endif
                </li>

                @forelse ($callResponses as $item)
                    <li class="list-group-item">
                        {{$item->created_at}}
                        <span class="badge badge-info ml-lg-2 ml-md-2">{{$item->action}}</span>
                        <span class="badge badge-info ml-lg-2 ml-md-2">{{$item->result}}</span>
                    </li>
                @empty
                    <li class="list-group-item">
                        there's no reponse yet for this call<br>
                    </li>
                @endforelse

            </ul>
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
