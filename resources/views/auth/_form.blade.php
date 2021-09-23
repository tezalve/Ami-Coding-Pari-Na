{{ csrf_field() }}
<div class="box-body">
    <div class="row" style="padding:80px;">
        @if ($form_type == 'register')
        <label class="col-lg-3 control-label">Username</label>
        <div class="col-lg-9">
            <input type="text" id="name" name="name" class="form-control" required autofocus>
        </div>
        @endif

        <label class="col-lg-3 control-label">Email</label>
        <div class="col-lg-9">
            <input type="text" id="email" name="email" class="form-control" required autofocus>
        </div>
            
        <label class="col-lg-3 control-label">Password</label>
        <div class="col-lg-9">
            <input type="text" id="password" name="password" class="form-control" required autofocus>
        </div>

        <div class="col-lg-12">
            <input type="submit" id="btnSubmit" class="btn btn-success block btn-flat pull-right" value="Submit">
        </div>
    </div>
</div>