<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo e(LAConfigs::getByKey('site_description')); ?>">
    <meta name="author" content="Dwij IT Solutions">

    <meta property="og:title" content="<?php echo e(LAConfigs::getByKey('sitename')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo e(LAConfigs::getByKey('site_description')); ?>" />

    <meta property="og:url" content="http://laraadmin.com/" />
    <meta property="og:sitename" content="laraAdmin" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/LaraAdmin-600x600.jpg" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@laraadmin" />
    <meta name="twitter:creator" content="@laraadmin" />

    <!-- <title><?php echo e(LAConfigs::getByKey('sitename')); ?></title> -->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('/la-assets/css/bootstrap.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('la-assets/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('/la-assets/css/main.css')); ?>" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="<?php echo e(asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/la-assets/js/smoothscroll.js')); ?>"></script>



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
                    {{-- <li><a href="<?php echo e(url('/new_calendar')); ?>" class="smoothScroll">fullcalendar</a></li> --}}
                    <!-- <li><a href="#contact" class="smoothScroll">Contact</a></li> -->
                    <li><a href="<?php echo e(url('/payment_page')); ?>">order</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(url('/signup')); ?>">Register</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(url(config('laraadmin.adminRoute'))); ?>"><?php echo e(Auth::user()->name); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <br>

    <section id="contact" name="contact">
        <div class="container">
            <h3 style="color: black; text-align:center"><b> Order Place </b></h3>
          
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="container">
                        <br>

                        <hr>


                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div id="q21" class="q full_width">
                                        <a class="item_anchor" name="ItemAnchor8"></a>
                                        <div class="segment_header" style="color:#FFFFFF;width:auto;text-align:Center;">
                                            <h1 style="font-size:18px;font-family:'Lato',sans-serif;padding:20px 1em ; color:white;"><b>Order Information</b></h1>
                                        </div>
                                    </div>

                                    <article class="card-body">
                                        <form method="post" action="<?php echo e(url('/create_appointment')); ?>" id="appointmentform" role="form" enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="form-row">
                                                {{-- <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="name" value="
                                                
                                                </div>
                                                <div class="form-group col-md-6">
                                                <input type="text" class="form-control" name="email" value="/">
                                                </div> --}}
                                                <div class="form-group col-md-6">
                                                    <label>name</label>

                                                    <input type="text" class="form-control" name="name" placeholder="name" >
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>email</label>

                                                    <input type="text" class="form-control" name="email" placeholder="email">
                                                    </div>
                                                {{-- <div class="form-group col-md-6" id='datetimepicker6'>
                                                    <label>Date</label>
                                                    <input type='date' class="form-control" name="date" />

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Time</label>

                                                    <input type='time' name="time" clasors="form-control" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" />

                                                </div> --}}
                                            </div> <!-- form-row end.// -->
                                            <div class="form-group col-md-12">
                                                <label>order</label>
                                                <input type="text" class="form-control" placeholder="Please enter order" name="car_model">

                                            </div>

                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label>State</label>
                                                    <select id="inputState" class="form-control" name="state">
                                                        <option> Select State</option>
                                                        <?php foreach($states as $value): ?>
                                                        <option value="<?php echo e($value->name); ?>"><?php echo e($value->name); ?></option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <select id="inputState" class="form-control" name="city">
                                                        <option> Select City</option>
                                                        <?php foreach($cities as $value): ?>
                                                        <option value="<?php echo e($value->name); ?>"><?php echo e($value->name); ?></option>

                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block"> Submit </button>
                                            </div>

                                        </form>
                                    </article>

                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>


    </section>
    <br><br><br>
    <!-- <section id="contact" name="contact"></section>
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
    </div> -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo e(asset('/la-assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
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
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
        });
    </script>
</body>

</html>