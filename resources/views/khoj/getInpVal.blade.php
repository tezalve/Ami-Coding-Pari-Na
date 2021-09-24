@extends('layouts.layout')
@section('content')
    <div>
        <p>the search begins here</p>
    </div>
    <form method="POST" action="{{ url('api/getInpVal') }}" id="search">
    {{ csrf_field() }}
        <div class="box-body">
            <div class="row" style="padding:80px;">
                <label class="col-lg-3 control-label">User Id</label>
                <div class="col-lg-9">
                    <input type="number" id="user_id" name="user_id" value="{{$id}}" class="form-control" required autofocus>
                </div>
                <label class="col-lg-3 control-label">Start Time</label>
                <div class="col-lg-9">
                    <input type="datetime-local" step="1" id="start" name="start" placeholder="timestamp" class="form-control" required autofocus>
                </div>

                <label class="col-lg-3 control-label">End Time</label>
                <div class="col-lg-9">
                    <input type="datetime-local" step="1" id="end" name="end" placeholder="timestamp" class="form-control" required autofocus>
                </div>

                <div class="col-lg-12">
                    <input type="submit" id="btnSubmit" class="btn btn-success block btn-flat pull-right" value="Submit">
                    <p id="bool"></p>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{asset('JQuery/jquery-3.6.0.min.js')}}"></script>
    <script>
        $('#start').on('change',(function(e) {
            $('#end').attr("min", $('#start').val());
        }));
        $('#end').on('change',(function(e) {
            $('#start').attr("max", $('#end').val());
        }));
    </script>
@endsection