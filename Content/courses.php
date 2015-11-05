<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testing</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap2.css" />
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/faculty.css">

</head>
<body>
<div id="wrapper">
    <?php include("header.html");?>
    <div id="content">
        <div class="container-fluid " style="padding-top:10px;">
		<form  onsubmit="return false;" >
            <div class="input-group" style="margin:auto;width:280px;">
                <input maxlength="7" placeholder="e.g DBASESY" type="text" id="course_code" class="form-control" aria-label="...">
                <div class="input-group-btn">
                    <button onclick="testone();" type="submit" id="search_btn" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span>&nbsp;Search Course</button>
                </div>
            </div>
</form>
<center>
            <div  class="datashit " style="margin:auto;padding-top:20px;">

            </div>
			</center>
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
	 error: function(){
		         alert("Please Try Again");

    },
            success: function (data) {
				console.log(data);
				$("#search_btn").removeClass("disabled");
                $("#search_btn").attr("onclick","testone();");
                $("#faculty_preloader").remove();


				if(data=="1")
				{
               $(".datashit").append("<div id='faculty_preloader' class='text-center'><h1>Network Error</h1><BR><span class='glyphicon glyphicon-remove' style='color:white;font-size:3em;'/></div>");

				}
					else	if(data=="1")
				{
					        alert("MLS IS NOT RESPONDING");

				}
				else
				{

				
                var Schedules =    jQuery.parseJSON(data);
                if(Schedules.length>0)
                {
                    $(".datashit").append("<table  style='color:white;width:auto;' class='table table-condensed table-striped' >"+
                        "<thead>"+
                        "<tr class='success'>"+
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
						var isfull="",asroom;
						var ratio = Schedules[i].enrld/Schedules[i].enrlcap || 0 ;
					   if(ratio>=1)
					   {
						   isfull="danger";
					   }
					   else if(ratio>0.9)
					   {
						   isfull="warning";
					   }
					   var bldg = (Schedules[i].room).substring(0,2); 
					   console.log(bldg);
						  switch(bldg)
						  {
						  case "VL":
						  asroom = "Velasco Building";
						   break;
						   case "AG":
						   asroom = "Andrew Building";
						   break;
						   case "GK":
						   asroom ="Gokongwei Building";
						   break;
						   case "MM":
						   asroom ="Mutien Marie Building";
						   break;
						  default:
						  asroom = "Unknown";
						  
					 }

					   
                        $("#schedbody").append("<tr class='schedrow "+isfull+ 	"'>"+
                            "<td>"+Schedules[i].classnum+"</td>"+
                            "<td>"+Schedules[i].coursename+"</td>"+
                            "<td>"+Schedules[i].section+"</td>"+
                            "<td>"+Schedules[i].day+"</td>"+
                            "<td>"+Schedules[i].time+"</td>"+
                            "<td >"+"<a style='cursor:help;text-decoration:none;color:white;' data-toggle='tooltip' title='"+asroom+"'>"+Schedules[i].room+"</a></td>"+
                            "<td >"+ Schedules[i].enrld+"/"+Schedules[i].enrlcap+"</td>"+
                            "<td>"+Schedules[i].remarks+"</td>"+
                            "</tr>");



                    }
                  $('.table').dataTable();

                }
                else
                {
                    $(".datashit").append( "NO COURSE OFFERINGS DAMN");
                }
				}
            }
			


        });
    }



</script>

