{{ csrf_field() }}
    <div class="box-body">
        <div class="row" style="padding:80px;">
            <label class="col-lg-3 control-label">Input Values</label>
            <div class="col-lg-9">
                <input type="text" id="input" placeholder="Comma separated numbers" class="form-control" required autofocus>
                <input type="text" id="input_real" name="input"  class="form-control" hidden>
                <input type="text" name="user_id" value="{{$id}}"  class="form-control" hidden>
            </div>

            <label class="col-lg-3 control-label">Search Value</label>
            <div class="col-lg-9">
                <input type="number" id="ser" placeholder="only numbers" class="form-control" required autofocus>
            </div>

            <div class="col-lg-12">
                <input type="submit" id="btnSubmit" class="btn btn-success block btn-flat pull-right" value="Submit">
            </div>
        </div>
    </div>