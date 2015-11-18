<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" >
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testing</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/global.css"/>

</head>
<body >
<main class="cd-main-content">
    <div class="cd-fixed-bg cd-bg-1">
<div style="position:relative;top:0;padding-top:50px;padding-right:30px;background:transparent;box-shadow:none;" class="cd-header">
            <nav  style="font-size:1.5rem;color:white;background:transparent;border:0;box-shadow:0;" class=" navbar navbar-default">

                    <div class="navbar-header">
                        <a  class="navbar-brand" href="home.php" style=""><img  id="homelogo" src="images/UI/homelogo.png" style="width:50%;"></a>
                        <button class="navbar-toggle" data-toggle="collapse" style="color:black;" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li id="homlnk" class="navl"><a href="home.php">Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-users"></i> People
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li id="faclnk" class="navl"><a style="background:white;" href="faculty.php"> Faculty</a></li>
                                    <li id="orglnk" class="navl"><a href="orgs.php">Organizations</a></li>

                                </ul>
                            </li>
                            <li id="courselnk" class="navl"><a href="courses.php">Courses</a></li>
                            <li id="eventlnk"  class="navl"><a href="events.php">Events</a></li>
                            <li id="abtlnk"  class="navl"><a href="about.php">About</a></li>

                        </ul>
                    </div><!--/.nav-collapse -->
            </nav>

</div>

<H1>Home - Electronics and Communications Engineering Department<br>
    </H1>

    </div> <!-- cd-fixed-bg -->

    <div style="padding-top:0;background:url(images/UI/aboutbanner.jpg);" class="cd-scrolling-bg cd-color-2" >
        <div class="container-fluid" style="background:#232323;padding:15px;">
    <div style="" class="col-lg-2">
           <i style="margin:auto;color:white;font-size:10vw;" class="fa fa-4x fa-graduation-cap"></i>
    </div>
            <div style="" class="col-lg-10">
                <h2 style="color:#26e468">The Future Begins Here</h2>
<p style="font-size:15px;" class="text-left text-justify">
    The Department of Electronics and Communications Engineering is the largest department in the Gokongwei College of Engineering at De La Salle University. Currently, the department has eighteen academic personnel, one non-academic personnel, and eight support personnel providing technical, professional and administrative services. Different laboratories have been established for each area of specialization. A number of specialized modern research equipment was acquired from the Department of Science and Technology through Engineering and Science Education Program. The equipment is used by the personnel and students for research and development.
    </p>
                <a href="http://www.dlsu.edu.ph/academics/colleges/coe/ece/default.asp" target="_blank"><button class="btn btn-primary  btn-lg" >Read More</button></a>


</div>
            </div>
        <div class="container">
        <h2 class="text-center" style="
        color:white">Announcements</h2>
        <div style="margin-left:0;width:100%;height:100%;" id="carousel" class="text-center carousel slide carousel-fade" data-ride="carousel">
<center>
            <!-- Carousel items -->
            <div style="" class="carousel-inner">
                <div class="active item"><a target="_blank" href="#"><img  class="img-" src="images/carousel/car1.jpg"></a></div>
                <div class="item"><a><img class="img-" src="images/carousel/car2.jpg"></a></div>
                <div class="item"><a><img class="img-"  src="images/carousel/car3.jpg"></a></div>
                <div class="item"><a><img class="img-"  src="images/carousel/car4.jpg"></a></div>

            </div>
</center>
            <!-- Carousel nav -->
            <!-- <a class="carousel-control left" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
             <a class="carousel-control right" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>-->
        </div>
        </div>
    </div> <!-- cd-scrolling-bg -->

    <div style="padding-top:5px;" class="cd-scrolling-bg cd-color-1">
        <div class="cd-container">
          <h1 style="color:#26e468">Student Outcomes</h1>
            <ul>
                <li>An ability to apply knowledge of mathematics, physical, life and information sciences; and engineering sciences appropriate to the field of practice.
                </li>
                <li>An ability to design and conduct experiments, as well as to analyse and interpret data.
                </li>
                <li>An ability to design a system, component, or process to meet desired needs within dentified constraints.
                </li>
                <li>An ability to work effectively in multi-disciplinary and multi-cultural teams.
                </li>
                <li>An ability to recognize, formulates, and solves engineering problems.
                </li>
                <li>Recognition of professional, social, and ethical responsibility.
                </li>
                <li>An ability to effectively communicate orally and in writing using the English language.
                </li>
                <li>An understanding of the effects of engineering solutions in a comprehensive context.
                </li>
                <li>
                    An ability to engage in life-long learning and an understanding of the need to keep current of the developments in the specific field of practice.

                </li>
                <li>A knowledge of contemporary issues
                </li>
<li>An ability to use the techniques, skills, and modern engineering tools necessary for engineering practice.
</li>
                <br>
            </ul>
        </div> <!-- cd-container -->
        <?php include("footer.html");?>

    </div> <!-- cd-scrolling-bg -->


</main> <!-- cd-main-content -->
</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
    $('.carousel').carousel();
    $("#footer").show();
</script>