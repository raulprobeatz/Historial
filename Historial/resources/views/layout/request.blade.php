@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><i class="glyphicon glyphicon-info-sign"></i></strong>
    @foreach($errors->all() as $err)
        <ul>
            <li>{!!$err!!}</li>
        </ul>
    @endforeach
</div>
@endif