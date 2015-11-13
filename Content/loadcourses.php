<?php

if (is_ajax()) {

    test_function();

}

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}


function test_function(){

    $sqlConnect = mysql_connect('localhost','root','');

    if(!$sqlConnect){
        die("database connect fail:".mysql_error());
    }
    $selectdb = mysql_select_db('lbycp3b',$sqlConnect);
    $json_data = array(); // create a new array

    $result_out=mysql_query("SELECT * FROM courses",$sqlConnect);
    while($rw=mysql_fetch_assoc($result_out)) {
        array_push($json_data, $rw);
    }
    echo json_encode($json_data);


}


?>

