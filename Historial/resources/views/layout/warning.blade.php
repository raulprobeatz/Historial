@if(Session::has('msg-err'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><i class="glyphicon glyphicon-info-sign"></i></strong>{{Session::get('msg-err')}}</div>
@endif