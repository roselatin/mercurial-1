<?php

    $sqlConnect = mysql_connect('localhost','root','');

    if(!$sqlConnect){
        die("database connect fail:".mysql_error());
    }
    $selectdb = mysql_select_db('lbycp3b',$sqlConnect);
    $json_data = array(); // create a new array

    $result_out=mysql_query("SELECT * FROM events",$sqlConnect);
    while($rw=mysql_fetch_assoc($result_out)) {
        array_push($json_data, $rw);

    }
    $json_data = json_encode($json_data);

    echo json_encode($json_data);

