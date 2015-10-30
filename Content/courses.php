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
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>
<body>
<div id="wrapper">
    <?php include("header.html");?>
    <div id="content">
        <div class="container-fluid text-center" style="padding-top:10px;">
            <div class="input-group">
                <input placeholder="Type A Course" type="text" id="course_code" class="form-control" aria-label="...">
                <div class="input-group-btn">
                    <button onclick="testone();" type="submit" id="search_btn" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>&nbsp;Search Course</button>
                </div>
            </div>

            <div  class="datashit " style="padding-left:250px;padding-right:250px;">

            </div>
        </div>
    </div>
    <?php include("footer.html");?>
</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script type="text/javascript">



    function testone()
    {
        $.ajax({
            type: "POST",
            data: "course="+$("#course_code").val(),
            url: "requester.php", //Relative or absolute path to response.php fill

        beforeSend:function()
    {
        $("#search_btn").addClass("disabled");
        $("#search_btn").attr("onclick","");
        $(".datashit").empty();
        $(".datashit").append("<div id='faculty_preloader' class='text-center'><h1>Searching Course Offerings</h1><BR><div  class='loader'></div>");


    },
            success: function (data) {
                $("#search_btn").removeClass("disabled");
                $("#search_btn").attr("onclick","testone();");
                $("#faculty_preloader").remove();

                var Schedules =    jQuery.parseJSON(data);
                if(Schedules.length>0)
                {
                    $(".datashit").append("<table  style='color:white;' class='text-left table table-bordered table-responsive'>"+
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
                  //  $('.table').dataTable();

                }
                else
                {
                    $(".datashit").append( "NO COURSE OFFERINGS DAMN");
                }
            }


        });
    }



</script>

