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
    <link rel="stylesheet" href="css/courses.css">

</head>
<body>
<div id="wrapper">
    <?php include("header.html");?>
    <div id="content">
        <div style="display:table-row">
            <div style="float:none;width:20%;display:table-cell;">

                <div id='courselist' style='width:320px;max-height:85vh;overflow:auto;' class='list-group list'>
                    </div>

                </div>
            <div style="float:none;width:auto;display:table-cell;">
                <div  class="datashit " style="padding:20px;">

                </div>
            </div>
        </div>
        </div>

    <?php include("footer.html");?>
</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/list.min.js"></script>
<script src="js/courses.js"></script>
<script src="js/jquery.dataTables.js"></script>

