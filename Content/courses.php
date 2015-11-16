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
<style>

    .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
        color: #999
    }

    .tt-menu {    /* used to be tt-dropdown-menu in older versions */
        width: 100%;
        margin-top: 4px;
        padding: 4px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
        padding: 3px 20px;
        line-height: 24px;
    }

    .tt-suggestion.tt-cursor,.tt-suggestion:hover {
        color: #fff;
        background-color: #0097cf;

    }

    .tt-suggestion p {
        margin: 0;
    }
</style>
<body>
<div id="wrapper">
    <?php include("header.html");?>
    <div id="content">
        <div style="display:table-row;">
            <div style="float:none;width:20%;display:table-cell;">

                <div id='asd' style='width:320px;' >
                </div>

            </div>
            <div style="float:none;width:80%;display:table-cell;">
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
<script src="js/typeahead.bundle.js"></script>

