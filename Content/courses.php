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
    <link rel="stylesheet" href="css/faculty.css">

</head>
<body>
<div id="wrapper">
    <?php include("header.html");?>
    <div id="content">
        <div class="container-fluid" style="padding-top:10px;">
            <div class="input-group">
                <input type="text" id="course_code" class="form-control" aria-label="...">
                <div class="input-group-btn">
                    <button onclick="testone();" type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;Search Course</button>
                </div>
            </div>

            <div style="color:white;" class="datashit">

            </div>
        </div>
    </div>
    <?php include("footer.html");?>
</div>
</body>
</html>
<script type="text/javascript">



    function testone()
    {
        $.ajax({
            type: "POST",
            data: "course="+$("#course_code").val(),
            url: "requester.php", //Relative or absolute path to response.php fill

        beforeSend:function()
    {
        $(".datashit").empty();
        $(".datashit").append("<div id='faculty_preloader' class='text-center'><h1>Searching...</h1><BR><div  class='loader'></div>");


    },
            success: function (data) {
                $("#faculty_preloader").remove();


                var Schedules =    jQuery.parseJSON(data);
                if(Schedules.length>0)
                {
                    $(".datashit").append( "<table class='table table-bordered table-responsive'>"+
                        "<thead>"+
                        "<tr>"+
                        " <th>Code</th>"+
                        " <th>Course</th>"+
                        " <th>Section</th>"+
                        " <th>Days</th>"+
                        " <th>Time</th>"+
                        " <th>Room</th>"+
                        " <th>Capacity</th>"+
                        " <th>Remarks</th>"+
                        "  </tr>"+
                        " </thead>"+
                        " <tbody id='schedbody'>"+
                        " </tbody>"+
                        " </table>");

                    for (var i=0;i<Schedules.length;i++)
                    {


                        $("#schedbody").append("<tr class='schedrow'>"+
                            "<td>"+Schedules[i].classnum+"</td>"+
                            "<td>"+Schedules[i].coursename+"</td>"+
                            "<td>"+Schedules[i].section+"</td>"+
                            "<td>"+Schedules[i].day+"</td>"+
                            "<td>"+Schedules[i].time+"</td>"+
                            "<td>"+Schedules[i].room+"</td>"+
                            "<td>"+ Schedules[i].enrld+"/"+Schedules[i].enrlcap+"</td>"+
                            "<td>"+Schedules[i].remarks+"</td>"+
                            "</tr>");



                    }
                }
                else
                {
                    $(".datashit").append( "NO COURSE OFFERINGS DAMN");
                }
            }


        });
    }



</script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
