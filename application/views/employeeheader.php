<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tier5</title>
    <link rel=icon href="http://tier5.us/images/favicon.ico">

    <!-- Bootstrap Core CSS -->
    <script type="text/javascript">

    var BASE_URL = '<?php echo base_url(); ?>';

    </script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="<?php echo base_url().'application/views/css/scrolling-nav.css'?>" rel="stylesheet">

    <link href="<?php echo base_url().'application/views/css/bootstrap.min.css';?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'application/views/css/landing-page.css'?>" rel="stylesheet">
 
    <link href="<?php echo base_url().'application/views/css/addemp.css'?>" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?php echo base_url().'application/views/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'application/views/js/bootstrap.min.js'?>"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="<?php echo base_url().'application/views/js/jquery.easing.min.js'?>"></script>
    <script src="<?php echo base_url().'application/views/js/scrolling-nav.js'?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'application/views/js/buttons.js';?>"></script>


    <script type="text/javascript" src="<?php echo base_url().'application/views/js/clockin.js';?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'application/views/js/time.js';?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'application/views/js/breakbuttons.js';?>"></script>


    <script type="text/javascript" src="<?php echo base_url().'application/views/js/timerlib.js';?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'application/views/js/pointbutton.js';?>"></script>

    <script type="text/javascript" src="<?php echo base_url().'application/views/js/pageidle.js';?>"></script>

    
    <script type="text/javascript" src="<?php echo base_url().'application/views/js/usercalender.js';?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'application/views/js/lunchorder.js';?>"></script>
 

 <script type="text/javascript">
$(document).ready(function() {
   var startTime;
  
   var d = new Date();
   var entry_time=$('#start_timer').val();
   var arr = entry_time.split(':'); // split it at the colons

// minutes are worth 60 seconds. Hours are worth 60 minutes.
   var startTime = (+arr[0]) * 60 * 60 + (+arr[1]) * 60 + (+arr[2]); 
    

  setTimeout(display_time, 1000);

   function display_time() {
    
   
    var chk_time=$('#start_timer').val();
    var dt = new Date();
    // later record end time
    var endTime = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
   

    
    var a = endTime.split(':'); // split it at the colons

// minutes are worth 60 seconds. Hours are worth 60 minutes.
    var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 


    // time difference in ms
    var timeDiff = seconds - startTime;



    var hours=0;
    var minutes=0;
    var seconds=0;
    
     if(timeDiff<60)
     {
       seconds=timeDiff;
     }

     else
     {
        if(timeDiff<3600)
        {
            minutes=Math.floor(timeDiff/60);
            seconds=Math.floor(timeDiff%60);
        }
        else
        {
            hours=Math.floor(timeDiff/3600);
            minutes=Math.floor((timeDiff%3600)/60); 
            seconds=Math.floor((timeDiff%3600)%60);
        }
     }
    if(hours<10)
    {
        hours='0'+hours;
    }
    if(minutes<10)
    {
        minutes='0'+minutes;
    }
    if(seconds<10)
    {
        seconds='0'+seconds;
    }
    
    if(chk_time!=0)
    {
     var colorclass = "class='text-default'";
    totaltime = hours + ":" + minutes + ":" + seconds;
   $('#timer2').html("<div "+colorclass+">"+totaltime+"</div>");
    }
    setTimeout(display_time, 1000);
   
    }
       });




</script>


</head>