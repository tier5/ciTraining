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

    <link href="<?php echo base_url().'application/views/css/scrolling-nav.css'?>" rel="stylesheet">

    <link href="<?php echo base_url().'application/views/css/bootstrap.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'application/views/css/addemp.css';?>">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Custom CSS -->
    

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

    <script src="<?php echo base_url().'application/views/js/lateview.js'?>"></script>
    <script src="<?php echo base_url().'application/views/js/lunchorderadmin.js'?>"></script>
       <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
    
<script type="text/javascript">
    
    $(document).ready(function() {
    
      $('#change_month').on('change', function(e) {
        
        var cur_month = $(this).val();
       
        if(cur_month!='')
         {

          var month_name=$(this).find(':selected').data('title');
          $('#cur_month').html('Month: '+month_name);
             $.ajax({

                type:'POST',
                data:'cur_month='+cur_month,
                url:'<?php echo base_url();?>Admin/Ajax_call',
                success:function(result)
                {
                    $('#change_month_result').html(result);
                }

             });
           }
           else
           {
              $('#cur_month').html('<font color=red>Please Select A month From The select List to view the points Or Just Load the page to view the current month points.</font>');
           }

         });
        
    });
</script>

</head>