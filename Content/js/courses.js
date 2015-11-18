var jqXHR;
var coursedb;

var substringMatcher = function(strs) {
    return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
            if (substrRegex.test(str)) {
                matches.push(str);
            }
        });

        cb(matches);
    };
};


function browsecourse() {
    $("#coursedata").remove();
$("#coursedb_wrapper").show();
    $("#search_btn").remove();

    $(".datashit2").empty();
}

function initializecoursedb(clist){
    for (var i = 0; i < clist.length; i++) {
        var prerequisites = (clist[i].prereq).split(",");
        var prereqs="";
        $.each(prerequisites,function(index,course)
        {
            var temp=course.substring(7,8);
            console.log(temp);

            if(temp=="H")
            {
                prereqs+="<span  data-toggle='tooltip' title='Hard Prerequisite' class='label pr label-danger'>"+course.substring(0,7)+"</span>&nbsp";
            }
            else if(temp=="S")
            {
                prereqs+="<span  data-toggle='tooltip' title='Soft Prerequisite' class='label pr label-primary'>"+course.substring(0,7)+"</span>&nbsp";
            }
            else if(temp=="C")
            {
                prereqs+="<span  data-toggle='tooltip' title='Co-Requisite' class='label pr label-warning'>"+course.substring(0,7)+"</span>&nbsp";
            }

        });
        coursedb+=   "<tr class='schedrow'> " +
            "<td>" + clist[i].course + "</td>" +
            "<td>" + clist[i].title + "</td>" +
            "<td>" + clist[i].units + "</td>" +
            "<td>" + prereqs + "</td>" +
            "<td>" + clist[i].category + "</td>" +

            "</tr>";
    }
}



function loaddesc(event)
{
   $.ajax({
        type: "POST",
        data: "action=LOAD&course="+$(event.target).data("course"),
        url: "requester.php", //Relative or absolute path to response.php fill

        beforeSend:function()
        {

$("#cdesc").empty().append("<i class='fa fa-refresh fa-spin'></i>");
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
            if(data.length<2)
            {
                alert("Error");

               $("#cdesc").empty().append("<button class='btn btn-sm btn-primary' data-course='"+$(event.target).data("course")+"'  onclick='loaddesc(event)'>Load Description</button>");
            }
            else
            {
            $("#cdesc").empty().append(data);
            }

        }



    });
}





    $(document).ready(function()
{


    var Profs;
    $.ajax({
        type: "POST",
        url: "requester.php", //Relative or absolute path to response.php fill
        data:"action=INITIALIZE",
        beforeSend: function(){

            $("#content").append("<div id='faculty_preloader' class='text-center'><h1>Loading Courses</h1><BR><div  class='loader'><i style='font-size:120px;color:white;' class='fa fa-circle-o-notch fa-spin'></div>");
        },
        success: function (data) {
            var asd =[];
            var clist = jQuery.parseJSON(data);
            $("#faculty_preloader").remove();
            initializecoursedb(clist);
            $("#schedbod2y").append(coursedb);
            $("table").DataTable(

                {
                    "pagingType": "full_numbers",
                    "columnDefs": [
                        {
                            "targets": [ 4 ],
                            "visible": false,
                            "searchable": true
                        }]
                }
            );
            $("#asd").append("<label class='label'>Display Course Data</label><br>"+
                "<input maxlength='7' placeholder='e.g DBASESY'   class='typeahead form-control' type='text' /><br><button onclick='browsecourse()' class='btn btn-primary'>Browse</button>");
$("#footer").show();
            var stocks = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('course'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                local: clist
            });

            stocks.initialize();

            $('.typeahead').typeahead(
                null, {
                    name: 'courses',
                    displayKey: 'course',
                    limit: 20,
                    source: stocks.ttAdapter()
                }).on('typeahead:selected', function(event, data){
                    $("#coursedb_wrapper").hide();
                    var prerequisites = (data.prereq).split(",");
                    var prereqs="";
                    $.each(prerequisites,function(index,course)
                    {
                        var temp=course.substring(7,8);
                        console.log(temp);

                        if(temp=="H")
                        {
                        prereqs+="<span  data-toggle='tooltip' title='Hard Prerequisite' class='label pr label-danger'>"+course.substring(0,7)+"</span>&nbsp";
                        }
                        else if(temp=="S")
                        {
                            prereqs+="<span  data-toggle='tooltip' title='Soft Prerequisite' class='label pr label-primary'>"+course.substring(0,7)+"</span>&nbsp";
                        }
                        else if(temp=="C")
                        {
                            prereqs+="<span  data-toggle='tooltip' title='Co-Requisite' class='label pr label-warning'>"+course.substring(0,7)+"</span>&nbsp";
                        }

                    });
                    if(document.getElementById('coursedata')!=null)
                    {
                     $("#coursedata").remove();
                        $("#search_btn").remove();
                    }
                    $(".datashit").append("<dl id='coursedata' class='dl-horizontal'>"+
                        "<dt>Course Name</dt>"+
                        "<dd>"+data.course+"</dd>"+
                        "<dt>Course Title</dt>"+
                        "<dd>"+data.title+"</dd>"+
                        "<dt>Units</dt>"+
                        "<dd>"+data.units+"</dd>"+
                        "<dt>Course Description</dt>"+
                        "<dd id='cdesc'><button class='btn btn-sm btn-primary' data-course='"+data.course+"'  onclick='loaddesc(event)'>Load Description</button></dd>"+
                        "<dt>Prerequisites</dt>"+
                        "<dd>"+prereqs+"</dd>"+
                        "<dt>Category</dt>"+
                    "<dd>"+data.category+"</dd>"+
                        "</dl>"+
                        "<button id='search_btn' onclick='testone(event);'  data-course='"+data.course+"' class='btn btn-primary'>Click to view Course Offerings for "+ data.course+"</button>");

                    //$('.typeahead').val(data.code);
                });

$(".datashit").append("");
        }    ,
        complete: function()
        {
        }
    });







});



function testone(event)
{

    jqXHR =  $.ajax({
        type: "POST",
        data: "action=SEARCH&course="+$(event.target).data("course"),
        url: "requester.php", //Relative or absolute path to response.php fill

        beforeSend:function()
        {
            $("#search_btn").hide();
            $(".datashit2").empty();
            $(".datashit2").append("<div style='margin:0;' id='faculty_preloader'  class='text-center'><p>Searching Course Offerings</p><i style='font-size:120px;color:white;' class='fa fa-circle-o-notch fa-spin'></i></div>");


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
                $(".datashit2").append("<div id='faculty_preloader' class='text-center'><h1>Network Error</h1><BR><button id='search_btn' onclick='testone(event);' data-course='"+ $(event.target).data('course')+"' class='btn btn-primary'>Try Again</button></div>");


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
                    $(".datashit2").append("<table id='schedtable'  style='color:white;width:100%;' class='display text-left' >"+
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
                        " <tbody style='color:black;' id='schedbody'>"+
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
                            case "SJ":
                                asroom="Saint Joseph Building";
                            case "LS":
                                asroom="Saint La Salle Hall";
                            default:
                                asroom = "Unknown";

                        }


                        $("#schedbody").append("<tr class='schedrow "+isfull+ 	"'>"+
                            "<td>"+Schedules[i].classnum+"</td>"+
                            "<td>"+Schedules[i].coursename+"</td>"+
                            "<td>"+Schedules[i].section+"</td>"+
                            "<td>"+Schedules[i].day+"</td>"+
                            "<td>"+Schedules[i].time+"</td>"+
                            "<td >"+"<a style='cursor:help;text-decoration:none;color:black;' data-toggle='tooltip' title='"+asroom+"'>"+Schedules[i].room+"</a></td>"+
                            "<td >"+ Schedules[i].enrld+"/"+Schedules[i].enrlcap+"</td>"+
                            "<td>"+Schedules[i].remarks+"</td>"+
                            "</tr>");


                    }
                    $("#schedtable").DataTable(
                        {
                            "pageLength": 30,
                            "bLengthChange": false

                        }


                    );

                }
                else
                {
                    $(".datashit2").append( "<h1 class='text-center'>No Course Offerings Found for "+$(event.target).data('course')+"</h1>");
                    $("#search_btn").hide();
                }
            }
            jqXHR=null;

        }



    });
}

/**
 * Created by Jian Lastino on 11/6/2015.
 */
