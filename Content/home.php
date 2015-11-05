<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testing</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/home.css">

</head>
<body>
<div id="wrapper">
<?php include("header.html");?>
    <div id="content">
        <div class="container-fluid" style="padding:15px;width:960px;margin:auto;">

    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="active item"><img class="img-responsive" src="images/carousel/test.png"></div>
            <div class="item"><img class="img-responsive" src="images/carousel/test2.png"></div>
            <div class="item"><img class="img-responsive" src="images/carousel/test.png"></div>
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
        <a class="carousel-control right" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
    </div
            <div class="text-left" >
                <H1 style="color:white;"> Welcome to the ECE Department</H1></div> </div></div>
<?php include("footer.html");?>

</div>
</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
    $('.carousel').carousel();
</script>