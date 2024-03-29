/**
 * Created by Jian Lastino on 9/25/2015.
 */

    $(document).on("click",".prof", function()
    {

        var facid = "images/faculty/"+$(this).data('facid')+".jpg";
        document.getElementById("displayname").innerText = $(this).data('name');
        document.getElementById("displayrank").innerText= $(this).data('rank');
        document.getElementById("displaystatus").innerText= $(this).data('status');

        document.getElementById("fac_pic").setAttribute("src",facid)
        document.getElementById("facemail").innerText=$(this).data('email');

    });


//Load the database on page load

$(document).on("ready",function() {
    var Profs;
    $.ajax({
        type: "POST",
        url: "loadfac.php", //Relative or absolute path to response.php fill
        dataType:"json",
        beforeSend: function(){
            document.getElementById("fac_list").innerHTML = "<div id='faculty_preloader' class='text-center'><h1>Loading Faculty</h1><i style='font-size:120px;color:white;' class='fa fa-circle-o-notch fa-spin'></i> </div>";
            // start = new Date().getTime();
        },
        success: function (data) {
            document.getElementById("faclnk").setAttribute("style","background:#0000000")
            $("#faculty_preloader").remove();
            Profs = jQuery.parseJSON(data);
            $("#fac_list").append("<div id='fixed_search'  >"+
                "<div id='search'>"+

            "<form>"+
            "<span style='color:white'>Search ECE Faculty</span>s&nbsp;<input style='width:50%;'  class='search' type='search' value='' placeholder='Type name of faculty' />"+

                "</form>"+
                "</div></div>");
            $("#fac_list").append("<ul id='faculty' style='padding-top:90px;' class='list list-inline'>");
            for(var i=0;i<Profs.length;i++)
            {

                var name = Profs[i].FName +" "+ Profs[i].MName +" " +Profs[i].LName;
                var facid = Profs[i].Fac_ID;
                var rank = Profs[i].Rank;
                var status = Profs[i].Status;
                var email = Profs[i].Email;
                $("#faculty").append("<li  class='fac-item text-center'><div class='row' ><img  data-email='"+email+"' data-status='"+status+"'  data-rank='"+rank+"' data-name='"+name+"' class='img-circle prof ' data-facid='"+facid+"' id='"+facid+"' data-toggle='modal' data-target='#myModal'   src='images\\faculty\\"+ facid + ".jpg' onerror='showerror(this.id)' /> </div><div class='row'><p class='name'>"+name+"</p></div></li>");

            }
            $("#fac_list").append("</ul>");
            var options = {
                valueNames: [ 'name' ]
            };

            var userList = new List('fac_list', options);
            $("#footer").show();

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
