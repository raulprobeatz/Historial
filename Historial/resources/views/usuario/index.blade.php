<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        <!-- {!!Html::style('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500')!!} -->
        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"> -->
        {!!Html::style('assets/bootstrap/css/bootstrap.min.css')!!}
        <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
        {!!Html::style('assets/font-awesome/css/font-awesome.min.css')!!}
        <!-- <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"> -->
        {!!Html::style('assets/css/form-elements.css')!!}
		<!-- <link rel="stylesheet" href="assets/css/form-elements.css"> -->
        {!!Html::style('assets/css/style.css')!!}
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        @include('layout.warning')
        @include('layout.request')
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Historial Ocupacional</h3>
                                </div>
                        		<div class="form-top-right">
                        			<img src="assets/img/backgrounds/instituto_tecnico_superior_comunitario_itsc.jpg" class="img-circle">
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="/log" method="post" class="login-form">
                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
			                        	<input type="text" name="email" placeholder="Usuario..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Contraña</label>
			                        	<input type="password" name="password" placeholder="Contraña..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Aceptar!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        {!!Html::script('assets/js/jquery-1.11.1.min.js')!!}
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        {!!Html::script('assets/bootstrap/js/bootstrap.min.js')!!}
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        {!!Html::script('assets/js/jquery.backstretch.min.js')!!}
        <script src="assets/js/jquery.backstretch.min.js"></script>
        {!!Html::script('assets/js/scripts.js')!!}
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>