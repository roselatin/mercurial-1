<!Doctype html>
<html>

<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/theme.css">
<link rel="stylesheet" href="css/global.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<body>

<?php include("header.html");?>

    <div class="col-md-7">
        <div class="carousel slide" id="myCarousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="imgWrap">
                        <div class="col-md-4">
                            <a href="#"><img src="images/events/ARW_ECES.jpg" class="img-responsive"style="width:508px;height:475px"></a>
                            <p class="imgDescription">ECES ARW 2015
                                Annual Recruitment Week for ECES. Join ECES NOW!</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/GA_ACCESS.jpg" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/Utour.jpg" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/IECEP.jpg" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/PCB_seminar.jpg" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/DLSU_jobexpo.png" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/DOTA2_Tournament.jpg" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
                <div class="item">
                    <div class="col-md-4"><a href="#"><img src="images/events/Frosh_convocation.jpg" class="img-responsive"style="width:508px;height:475px"></a></div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
        </div>
    </div>


    <!-- Left and right controls -->

<script type="text/javascript">
    $('#myCarousel').carousel({
        interval: 10000
    })

    $('.carousel .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length>0) {
            next.next().children(':first-child').clone().appendTo($(this));
        }
        else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    });
</script>

<?php include("footer.html");?>
</body>



</html>