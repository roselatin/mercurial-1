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
    <script src="js/list.min.js"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

</head>
<body>
<?php include("header.html"); ?>
<div class="wrapper">

<!-- Button trigger modal -->
<div id="content" class="container-fluid" >

    <div id="fac_list">

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" >

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<div class="row" style="background:#000000;">
                    <h4 class=" modal-title" style="color:white;font-size:3em;" >Faculty Information</h4>
</div>
                            </div>
            <div class="modal-body" style="color:#26e468;" >
                <div class="container-fluid">
                    <div class="row text-center"><img id="fac_pic" class="img-circle" style="height:250px;margin-top:-20px;" src="images/profile.jpg"/></div>

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
                            <span ><h2 id="displaystatus">Full Time</h2></span></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <span class="spec-info""><h2>Rank:</h2></span></div><div class="col-lg-8"><h2 id="displayrank" >Assistant</h2></div>
                    </div>
                    <div class="row text-center" style="margin-top:-50px;">
                        <span id="fac_email" data-toggle="tooltip" data-placement="right" title="" class="glyphicon glyphicon-envelope"  style="float:middle;margin-top:30px;font-size:3em;color:white;"></span>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <center><button type="button" class="btn btn-default btn-lg"  style="border-radius:0px;width:40%;" data-dismiss="modal">Close</button></center>
            </div>
        </div>
    </div>
</div>

</div>
    </div>
<?php include("footer.html");?>
</body>



<script type="text/javascript">
    $(document).on("click",".prof", function()
    {

        var facid = "images/faculty/"+$(this).data('facid')+".jpg";
        document.getElementById("displayname").innerText = $(this).data('name');
        document.getElementById("displayrank").innerText= $(this).data('rank');
        document.getElementById("fac_pic").setAttribute("src",facid)
        document.getElementById("fac_email").setAttribute("title",$(this).data('email'));

    });

    //Load the database on page load

     $(document).on("ready",function() {
     var Profs;
     $.ajax({
     type: "POST",
     dataType: "json",
     url: "loadfac.php", //Relative or absolute path to response.php fill
     beforeSend: function(){
     document.getElementById("fac_list").innerHTML = "<div id='faculty_preloader' class='loader'>Loading</div>";
     // start = new Date().getTime();
     },
     success: function (data) {
     $("#faculty_preloader").remove();
     Profs = jQuery.parseJSON(data);
$("#fac_list").append("<input class='search' placeholder='Search' /><ul id='faculty' class='list list-inline'>");
         for(var i=0;i<Profs.length;i++)
         {

             var name = Profs[i].FName +" "+ Profs[i].MName +" " +Profs[i].LName;
             var facid = Profs[i].Fac_ID;
             var rank = Profs[i].Rank;
             var status = Profs[i].Status;
             var email = Profs[i].Email;
$("#faculty").append("<li style='width:20%;height:20%;' class='text-center'><img  data-email='"+email+"' data-status='"+status+"'  data-rank='"+rank+"' data-name='"+name+"' class='img-circle prof' data-facid='"+facid+"' id='"+facid+"' data-toggle='modal' data-target='#myModal'   src='images\\faculty\\"+ facid + ".jpg' onerror='showerror(this.id)' /> <br><span class='name'>"+name+"</span></li>");

         }
         $("#fac_list").append("</ul>");
         var options = {
             valueNames: [ 'name' ]
         };

         var userList = new List('fac_list', options);

         //   ShowProfs();
     }
     });
     });


function showerror(a)
{
    document.getElementById(a).setAttribute('src','images\\faculty\\default.jpg');
    document.getElementById(a).setAttribute('data-facid','default');
}

</script>
</html>



