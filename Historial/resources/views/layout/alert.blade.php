@if(Session::has('msg'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><i class="glyphicon glyphicon-ok"></i></strong>{{Session::get('msg')}}</div>
@endif