/**
 * Created by Jian Lastino on 9/25/2015.
 */

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
            document.getElementById("fac_list").innerHTML = "<div id='faculty_preloader' class='text-center'><h1>LOADING FACULTY LIST</h1><BR><div  class='loader'></div>";
            // start = new Date().getTime();
        },
        success: function (data) {
            setTimeout(function(){
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
                $("#faculty").append("<li  class='fac-item text-center'><img  data-email='"+email+"' data-status='"+status+"'  data-rank='"+rank+"' data-name='"+name+"' class='img-circle prof' data-facid='"+facid+"' id='"+facid+"' data-toggle='modal' data-target='#myModal'   src='images\\faculty\\"+ facid + ".jpg' onerror='showerror(this.id)' /> <br><span class='name'>"+name+"</span></li>");

            }
            $("#fac_list").append("</ul>");
            var options = {
                valueNames: [ 'name' ]
            };

            var userList = new List('fac_list', options);
            },  500);
            //   ShowProfs();
        }
    });
});

/* blur on modal open, unblur on close */
$('#myModal').on('show.bs.modal', function () {
    $('#fac_list ').addClass('blur');
    $('.container ').addClass('blur');

})

$('#myModal').on('hide.bs.modal', function () {
    $('#fac_list').removeClass('blur');
    $('.container ').removeClass('blur');

})

function showerror(a)
{
    document.getElementById(a).setAttribute('src','images\\faculty\\default.jpg');
    document.getElementById(a).setAttribute('data-facid','default');
}
