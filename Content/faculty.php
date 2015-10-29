<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Testing</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/faculty.css">

</head>
<body>
<div class="wrapper">

<?php include("header.html"); ?>

<!-- Button trigger modal -->
<div id="content"  >
<div class="container" style="width:100%;height:100%;">
    <div id="fac_list">
</div>

</div>
</div>
    <?php include("faculty_modal.html"); ?>

    <?php include("footer.html");?>
</div>

</body>
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
<script src="js/list.min.js"></script>
<script src="js/facsearch.js"></script>
<script src="js/modernizr.custom.js"></script>

</html>



