<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testing</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/faculty.css">


</head>
<body>
<?php include("header.html"); ?>
<div class="wrapper">

<!-- Button trigger modal -->
<div id="content" class="container-fluid" >

    <div id="fac_list">
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" >

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<div class="row" style="background:#000000;">
                    <h4 class=" modal-title" style="color:white;font-size:3em;" >Faculty Information</h4>
</div>
                            </div>
            <div class="modal-body" style="color:#26e468;" >
                <div class="container-fluid">
                    <div class="row text-center"><img id="fac_pic" class="img-circle" style="height:250px;margin-top:-20px;" src="images/profile.jpg"/></div>

                    <div class="row text-center">
                        <h1 id="displayname">Name</h1>
                    </div>
                    <div class="row text-center spec " >
                        <a class="label label-spec">Specialization 1</a>&nbsp;<a class="label label-spec">Specialization 2</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <span class="spec-info"><h2>Status:</h2></span></div>
                        <div class="col-lg-8">
                            <span ><h2 id="displaystatus">Full Time</h2></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <span class="spec-info""><h2>Rank:</h2></span></div><div class="col-lg-8"><h2 id="displayrank" >Assistant</h2></div>
                    </div>
                    <div class="row text-center" style="margin-top:-50px;">
                        <span id="fac_email" data-toggle="tooltip" data-placement="right" title="" class="glyphicon glyphicon-envelope"  style="float:middle;margin-top:30px;font-size:3em;color:white;"></span>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <center><button  class="btn btn-4 btn-4b"  style="font-family:Helvetica;outline:none;" data-dismiss="modal">Close</button></center>
            </div>
        </div>
    </div>
</div>

</div>
    </div>
<?php include("footer.html");?>
</body>
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/list.min.js"></script>
<script src="js/facsearch.js"></script>
<script src="js/modernizr.custom.js"></script>

</html>



