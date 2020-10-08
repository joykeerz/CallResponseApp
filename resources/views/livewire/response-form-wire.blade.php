<div>
    <form action="{{ route('createResponse') }}" method="post">
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
                    <option>guide by phone</option>`
                    <option>Site Visit</option>
                </select>
            </div>

            <h4 class="card-title">Result</h4>
            <div class="form-group">
                <select class="form-control" name="cb_result">
                    <option>solved</option>
                    <option>Pending</option>
                </select>
            </div>

            <h4 class="card-title">Description</h4>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="tb_desc"></textarea>
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
