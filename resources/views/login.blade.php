
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ LAConfigs::getByKey('site_description') }}">
    <meta name="author" content="Dwij IT Solutions">

    <meta property="og:title" content="{{ LAConfigs::getByKey('sitename') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ LAConfigs::getByKey('site_description') }}" />

    <meta property="og:url" content="http://laraadmin.com/" />
    <meta property="og:sitename" content="laraAdmin" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/LaraAdmin-600x600.jpg" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@laraadmin" />
    <meta name="twitter:creator" content="@laraadmin" />

   
    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

 ]
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/smoothscroll.js') }}"></script>

   

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    
    <script type="text/javascript" src="/path/to/bootstrap-datetimepicker.min.js"></script>
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
               
                <li><a href="{{url('/appointment')}}">Appointment</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/signup') }}">Register</a></li>
                @else
                    <li><a href="{{ url(config('laraadmin.adminRoute')) }}">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
            <!--/.nav-collapse -->
        </div>
    </div>
    <br><br><br>

    



   

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        /* Made with love by Mutiullah Samim*/



html,body{

background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 500px;
background-color: rgba(0,0,0,0.5) !important;
margin-left: 272px;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
.card_body_input{
    margin-left: 171px;
}
    </style>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card"> <br><br>
			<div class="card-header card_body_input">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body card_body_input">
            <form method="post" action="{{url('/userlogin')}}" id="" role="form" enctype="multipart/form-data" autocomplete='off'>

            <meta name="csrf-token" content="{{ csrf_token() }}">

{{ csrf_field() }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="input-group form-group">
						
						<input type="text" name="email" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>

<div id='calendar'></div>
<style>

html, body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 1100px;
  margin: 40px auto;
}
</style>

<link href='fullcalendar/main.css' rel='stylesheet' />
<script src='fullcalendar/main.js'></script>
<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    timeZone: 'UTC',
    themeSystem: 'bootstrap',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    weekNumbers: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: 'https://fullcalendar.io/demo-events.json'
  });

  calendar.render();
});
</script>




<br><br><br>
<section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>Contact Us</h3><br>
                <p>
                    Dwij IT Solutions,<br />
                    Web Development Company in Pune,<br />
                    B4, Patang Plaza Phase 5,<br />
                    Opp. PICT College,<br />
                    Katraj, Pune, India - 411046
                </p>
                <div class="contact-link"><i class="fa fa-envelope-o"></i> <a href="mailto:hello@laraadmin.com">hello@laraadmin.com</a></div>
                <div class="contact-link"><i class="fa fa-cube"></i> <a href="http://laraadmin.com">laraadmin.com</a></div>
                <div class="contact-link"><i class="fa fa-building"></i> <a href="http://dwijitsolutions.com">dwijitsolutions.com</a></div>
            </div>

            <div class="col-lg-7">
                <h3>Drop Us A Line</h3>
                <br>
                <form role="form" action="#" method="post" enctype="plain">
                    <div class="form-group">
                        <label for="name1">Your Name</label>
                        <input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email1">Email address</label>
                        <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Your Text</label>
                        <textarea class="form-control" name="Message" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <div id="c">
        <div class="container">
            <p>
                <strong>Copyright &copy; 2016. Powered by <a href="https://dwijitsolutions.com"><b>Dwij IT Solutions</b></a>
            </p>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script>
        $('.carousel').carousel({
            interval: 3500
        })
    </script>

    <style>
        .segment_header {
            width: auto;
            margin: 1px;
            color: #FFFFFF;
            background: #1282A2;
            background-size: cover;
            background-repeat: repeat;
            background-position: 50% 50%;
            border-radius: 0;
        }

        q .matrix_stars .star,
        .q .icon_add,
        .q .icon_calendar,
        .q .icon_del {
            cursor: pointer;
            display: inline-block;
            height: 1.2em;
            position: relative;
            user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            vertical-align: text-top;
            width: 1.5em;
        }

        .q .icon_calendar::before {
            content: "\1f4c5";
        }

        .q .matrix.choices input[type="checkbox"]+label::before,
        .q .matrix.choices input[type="radio"]+label::before,
        .q .matrix_stars .star::before,
        .q .icon_add::before,
        .q .icon_calendar::before,
        .q .icon_del::before {
            text-align: center;
            width: 100%;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function(e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function(e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>

<script type="text/javascript">
         $(function () {
             $('#datetimepicker3').datetimepicker({
                 format: 'LT'
             });
         });
      </script>
</body>

</html>