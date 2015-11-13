var jqXHR;



$(document).ready(function()
{


    var Profs;
    $.ajax({
        type: "POST",
        url: "requester.php", //Relative or absolute path to response.php fill
        data:"action=INITIALIZE",
        beforeSend: function(){

            $("#listdiv").append("<div id='faculty_preloader' class='text-center'><h1>Loading Courses</h1><BR><div  class='loader'></div>");
        },
        success: function (data) {

            var clist = jQuery.parseJSON(data);
            $("#faculty_preloader").remove();
            $("#courselist ").append("<input maxlength='7' placeholder='e.g DBASESY'  class='search' type='text' />");
            $("#courselist ").append("<div id='courses' style='' class='list list-group '>");

            for(var i=0;i<clist.length;i++)
            {
                $("#courses").append("<a style='width:auto;' href='#' class='list-group-item  '><p class='coursename'>"+clist[i].Course+"</p></a>");

            }
            $("#course").append("</div>");

            var options = {
                valueNames: [ 'coursename' ]
            };

            var userList = new List('courselist', options);

        },
        complete: function()
        {
        }
    });






});




$(document).on("click",".list-group-item",function(event){
    if(jqXHR!=null)
    {
        var cancel = confirm("This will cancel the current course search, continue?");
        if(cancel)
        {
    jqXHR.abort();

        $("#faculty_preloader").remove();
            $(".datashit").append("Click to view Course Offerings for <button onclick='testone(event);' class='btn btn-primary'>"+ $(event.target)[0].innerText+"</button>");

        }
    }
    else
    {
        $(".datashit").empty().append("Click to view Course Offerings for <button onclick='testone(event);' class='btn btn-primary'>"+ $(event.target)[0].innerText+"</button>");
    }
});

function testone(event)
{
    jqXHR =  $.ajax({
        type: "POST",
        data: "action=SEARCH&course="+$(event.target)[0].innerText,
        url: "requester.php", //Relative or absolute path to response.php fill

        beforeSend:function()
        {
            $("#search_btn").addClass("disabled");
            $("#search_btn").attr("onclick","");
            $(".datashit").empty();
            $(".datashit").append("<div style='margin:0;' id='faculty_preloader' class='text-center'><p>Searching Course Offerings</p><BR><div  class='loader'></div>");


        },
        error: function(event){
            if(event.statusText=="abort")
            {
                $("#faculty_preloader").remove();
jqXHR=null;
            }
else
            {
            alert("Please Try Again");
            }
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
                    $(".datashit").append("<table  style='color:white;width:100%;' class='table table-condensed table-striped' >"+
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

                }
                else
                {
                    $(".datashit").append( "NO COURSE OFFERINGS DAMN");
                }
            }
			$("table").dataTable();
            jqXHR=null;

        }



    });
}

/**
 * Created by Jian Lastino on 11/6/2015.
 */
