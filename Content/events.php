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
    <link rel="stylesheet" href="css/modal.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/events.css">

</head>
<body>
<div id="wrapper">
    <?php include("header.html");?>
    <div id="content">
        <div class="container">
            <!-- Top Navigation -->

            <section id="gridwrap" class="grid-wrap">

            </section>

        </div><!-- /container -->
    </div>
    <?php include("modal_event.html"); ?>
    <?php include("footer.html");?>
</div>
</body>
</html>

<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/gridScrollFx.js"></script>
<script src="js/colorfinder-1.1.js"></script>
<script>
    $(document).on("ready",function() {

$("#footer").hide();
        $.ajax({
            type: "POST",
            url: "loadevent.php", //Relative or absolute path to response.php fill
            dataType:"json",
            beforeSend: function(){
                document.getElementById("gridwrap").innerHTML = "<div id='faculty_preloader' class='text-center'><h1 style='color:white;'>Loading Events</h1><BR><i style='font-size:120px;color:white;' class='fa fa-circle-o-notch fa-spin'></i> </div>";
                // start = new Date().getTime();
            },
            success: function (data) {
                var events = jQuery.parseJSON(data);
                $("#faculty_preloader").remove();
$("#gridwrap").append("<ul class='grid swipe-down' id='grid'>"+
                "<li class='title-box'>"+
                    "<h2>Events held by the <a href='#'>ECE Department</a></h2>"+
                "</li>"+
                "</ul>");

                                for (var i = 0; i < events.length; i++) {
                    $("#grid").append("<li><a class='event' data-url='"+events[i].flink+"' data-url2='"+events[i].tlink+"' data-img='" +events[i].ev_id+ "' data-name='" +events[i].title+ "' data-desc='" +events[i].desc+ "' data-toggle='modal' data-target='#myModal' href='#'><img src='images/carousel/events/" + events[i].ev_id + ".jpg' alt='" + events[i].title + "'><h3>" + events[i].title + "</h3></a></li>");
                }
                new GridScrollFx( document.getElementById( 'grid' ), {
                    viewportFactor : 0.4
                } );
                $("#footer").show();

            }
        });

    } );



    $(document).on("click",".event", function()
    {

        var eventid = "images/carousel/events/"+$(this).data('img')+".jpg";
        document.getElementById("eventname").innerText = $(this).data('name');
        document.getElementById("description").innerText = $(this).data('desc');
        document.getElementById("eventimg").setAttribute("src",eventid);
        document.getElementById("eventurl").setAttribute("href", $(this).data('url'));
        document.getElementById("event2url").setAttribute("href", $(this).data('url2'));
    });







</script>