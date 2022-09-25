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

    <!-- Custom styles for this template -->
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/smoothscroll.js') }}"></script>

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
                <!-- <li><a href="#about" class="smoothScroll">About</a></li> -->
                <!-- <li><a href="#contact" class="smoothScroll">Contact</a></li> -->
                <li><a href="{{url('/appointment')}}">Appointment</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Admin Login</a></li>
                    <li><a href="{{ url('/signup') }}">Register</a></li>
                @else
                    <li><a href="{{ url(config('laraadmin.adminRoute')) }}">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
            <!--/.nav-collapse -->
        </div>
    </div>
    <br>




<!------ Include the above in your HEAD tag ---------->




<style>
    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: black;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: black;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: black;
    }
    @media (min-width: 1200px){
.container {
    width: 1170px;
}
}
</style>

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <br />
            <a href="{{ url('/user_login') }}" style="color: black;"><input type="submit" name="" value="Login" /></a>
        </div>
        <div class="col-md-9 register-right">
            
            <div class="" id="myTabContent">
                <div class="tab-pane show" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Apply as a Employee</h3>
                    <div class="row register-form">
                    <form method="post" action="{{url('/signup_page')}}" id="appointmentform" role="form" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name *" value="" autocomplete="false"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password *" value="" autocomplete="false" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password *" value="" autocomplete="false"/>
                            </div>
                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="male" checked>
                                        <span> Male </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="female">
                                        <span>Female </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name *" value="" autocomplete="false"/>
                            </div>
                            
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Your Email *" value="" autocomplete="false"/>
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="mobile" class="form-control" placeholder="Your Phone *" value="" autocomplete="false"/>
                            </div>
                            
                            <input type="submit" class="btnRegister" value="Submit" />
                        </div>
                    </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

</div>
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