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
    <link rel="stylesheet" href="css/facinfo.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->
</head>
<body>

<?php include("header.html"); ?>
<!-- Button trigger modal -->
<div id="content" class="container-fluid" >

<button type="button" data-name="FName LName #2" class="btn  btn-primary prof " data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">
    Prof 1
</button>
<button type="button" data-name="FName LName #2"  class="btn  btn-primary prof" data-toggle="modal" data-target="#myModal">
    Prof 2
</button>
<button type="button"  data-name="FName LName #2" class="btn btn-primary prof" data-toggle="modal" data-target="#myModal">
    Prof 3
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" style="color:white;" >Faculty Information</h4>
                </center>
            </div>
            <div class="modal-body" style="color:#26e468;" >
                <div class="container-fluid">
                    <hr style="height:20px;width:100%;margin-bottom:-30px;margin-top:50px;">
                    <div class="row text-center"><img class="img-circle" style="height:125px;margin-top:-50px;" src="images/profile.jpg"/></div>
                    <div class="row text-center" style="margin-top:-50px;">
                        <div class="col-lg-6 "><span class="glyphicon glyphicon-envelope" style="float:middle;margin-top:30px;font-size:3em;color:white;"></span></div>
                        <div class="col-lg-6 "><span class="glyphicon glyphicon-envelope" style="float:middle;margin-top:30px;font-size:3em;color:white;"></span></div>
                    </div>
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
                            <span ><h2>Full Time</h2></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <span class="spec-info""><h2>Rank:</h2></span></div><div class="col-lg-8"><h2>Assistant</h2></div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <center><button type="button" class="btn btn-default btn-lg"  style="border-radius:0px;width:40%;" data-dismiss="modal">Close</button></center>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).on("click",".prof", function()
    {
        var we =   $(this).data('name');
        document.getElementById("displayname").innerText = we;
    });
</script>
</div>
<?php include("footer.html"); ?>
</body>
</html>