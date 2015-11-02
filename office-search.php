<!DOCTYPE html>



<?php

include "db/db.php";


?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Services | Flat Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ours.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       

        <!-- stylesheets for keyboard design -->
    <link href="css/keyboard/jsKeyboard.css" rel="stylesheet">
    <link href="css/keyboard/main.css" rel="stylesheet">

    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
        .box-option{
            width:100%;
            height:200px; 
            background-color:#ddd;

        }
        .box-option > div{
            width:5px;
            height:100%; 
            background-color:#F00; 
            transition:width 1s ease;
            float:left;
        }
        .box-option:hover > div{
            width:30px;
        }
        .box-option > a {
            text-align:right;
            padding:20px;
            width:100%;
            height: 100%;
            display:block;
            background-color:#fff;
            transition:background-color 1s ease;

            border: 1px solid #ddd;
            box-shadow: -1px 5px 10px #ddd;
        }
        .box-option > a:hover, .box-option > a:active {
            /*
            color:white;
            background-color:#333;
            */
        }
        .box-option .glyphicon{
            font-size: 36px;
        }
    </style>
</head><!--/head-->
<body style="overflow:hidden"> <!-- Remove overflow to use scrollbars -->
    <?php include "resources/navbar.php"; //php script containing header details ?>



    <section id="page-title" class="torquiose peter-river" style="">
        <div class="container">
            <div class="row">
                <h3> <i class="icon-coffee" ></i> Office Information System</h3>
            </div>
        </div>
    </section><!--/#services-->

    
    <section style="padding-bottom:0; padding-top:20px; height:85%">
        <div id="panel" >
            <div class="container" style="height:100%;">
                <div id="search-pane" class="col-sm-7not " style="padding:20px 0; border:0;">
                    <form role="form">
                        <div class="input-group">
                            <input id="search_office" type="text" class="form-control" autocomplete="off" placeholder="Search" style="border-radius:0; height:56px; font-size:18px;">
                            <span class="input-group-btn" >
                                <button id="search_office_button" class="btn btn-danger" type="button" style="border-radius:0; font-size:30px;"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </form>
                    
                </div><!--/#search_pane-->
                    <div id="search-results" style="height:85%;">
                   
                        <?php
                        $query_select_unit=mysql_query("SELECT * FROM unit_t");
                        while($row_select_unit=mysql_fetch_assoc($query_select_unit)){
                            $unit_name=$row_select_unit['unit_name'];
                            $unit_id=$row_select_unit['unit_id'];
                            
                          ?>
                        
                         <div class="search-item-box" style="">
                         <div style="float:left;width:5px;height:100%;background-color:#66C6EB"></div>

                         <a href="office-info.php?unit_id=<?php echo $unit_id; ?>" style="vertical-align: middle;
                                                                  display: block;
                                                                  margin-top: 30px;">
                                <section ><?php echo $unit_name; ?></section>
                                <p>
                                   Bicol University College of Science
                                </p>
                            </a>
                       </div>
                       <?php } ?>
                    </div><!-- /#search-results -->
            </div><!-- /#conatiner -->
            
        </div><!-- /#panel -->
    </section>
    <div id="virtualKeyboard" class="virtualKeyboard hide-keyboard"></div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


    

    <script type="text/javascript" src="js/keyboard/jsKeyboard.js"></script>
    <script type="text/javascript" src="js/keyboard/main.js"></script>

    <script>
        function goBack(){
            window.history.go(-2);
        }
        $("#search_office_button").click(function(){

            var search_str = $("#search_office").val();
            console.log("searching databse for office with : "+search_str);
            fillList(search_str);
        });
        function fillList(search_str){
            $.ajax({
                url :"ajax/search_office.php",
                type: "GET",
                data:{search_str:search_str},
                success:function(data){
                    //alert(data);
                    $("#search-results").html(data);
                }
            });
        }
        fillList("");
    </script>

</body>
</html>