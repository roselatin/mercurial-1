<?php

class Schedule
{
    public $classnum =null;
    public $coursename =null;
    public $section =null;
    public $day =null;
    public $time =null;
    public $room =null;
    public $enrlcap =null;
    public $enrld =null;
    public $remarks =null;


    public function __construct($classnum, $coursename,$section,$day,$time,$room,$enrlcap,$enrld,$remarks="none") {

        $this->classnum = $classnum;
        $this->coursename = $coursename;
        $this->section = $section;
        $this->day = $day;
        $this->time = $time;
        $this->room = $room;
        $this->enrlcap = $enrlcap;
        $this->enrld = $enrld;
        $this->remarks = $remarks;


    }


}

error_reporting(E_ERROR | E_PARSE);

$action = $_POST['action'];
if($action=="LOAD")
{
showcoursedescription();
}
else if($action=="SEARCH")
{
	displaysearchresults();
}
else if($action=="INITIALIZE")
{
	loadinitiallist();
}


function displaysearchresults()
{
	$fp = fsockopen("enroll.dlsu.edu.ph", 80, $errno, $errstr, 8);
//if the socket failed it's offline...
	if (!$fp) {
		die("1");
	}
$url = "http://enroll.dlsu.edu.ph/dlsu/view_actual_count?p_course_code=".$_POST['course'];
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	if(curl_errno($curl))
	{
		die("2");
	}
	$output = curl_exec($curl);

	curl_close($curl);
	$DOM = new DOMDocument;
	if($output=="")
	{
		die("2");
	}
	$DOM->loadHTML($output);
	$finder = new DomXPath($DOM);
	$classname="data";
$nodes = $finder -> query ("//table[contains(concat(' ', @border, ' '), '1 ')]//tr");
	$rowarray= array();
	$schedlist = array();
	for($a=1;$a<$nodes->length;$a++)
	{
		array_push($rowarray,str_replace("\n",',',$nodes -> item($a) -> nodeValue ));
	}


	for($i=0;$i<sizeof($rowarray);$i++)
	{

		$newarray = explode(',',$rowarray[$i]);
//echo $newarray[0]." ".$newarray[1]." ".$newarray[2]." ".$newarray[3]." ".$newarray[4]." ".$newarray[5]." ".$newarray[6]." ".$newarray[7]." ".$newarray[8]."\n";
		array_pop($newarray);
		$value = $newarray[0] ;
		$size = sizeof($newarray);


		if ($size==9 ) //check if course number
		{
			if (preg_match ("#[0-9]#",$value ) ) //check if class numbr
			{

				$newsched = new Schedule(
					$newarray[0] ,
					$newarray[1] ,
					$newarray[2] ,
					$newarray[3] ,
					$newarray[4] ,
					$newarray[5] ,
					$newarray[6]   ,
					$newarray[7] ,
					$newarray[8]
				);
				array_push($schedlist,$newsched);
				//echo "Row Contains Complete Sched Details " . $newsched -> classnum;
				//echo sizeof($schedlist);
			}
			else  //check if  new date
			{

				$updatedsched = array_pop($schedlist);
				$oldval = $updatedsched ->day ;
				$updatedsched ->day = $oldval . "<br>" . $newarray[3];
				$oldval = $updatedsched ->time;
				$updatedsched -> time= $oldval . "<br>". $newarray[4];
				$oldval = $updatedsched ->room;
				$updatedsched ->room = $oldval . "<br>". $newarray[5];
				if($newarray[8]!="")
				{
					$oldval = $updatedsched ->remarks ;
					$updatedsched ->remarks = $oldval . "<br>" . $newarray[7];
				}
				array_push($schedlist,$updatedsched);
				//echo sizeof($schedlist);
			}
		}
		else //check if prof
		{

			$updatedsched = array_pop($schedlist);
			$oldval = $updatedsched -> remarks ;
			if(strlen($oldval)>0 && $oldval!="FRESHMAN BLOCK")
			{
				$updatedsched ->remarks = $oldval . $newarray[0] ."".$newarray[1];
			}
			else   if($oldval=="FRESHMAN BLOCK")
			{
				$updatedsched ->remarks = $oldval ."<br>". $newarray[0] ." ".$newarray[1];
			}
			else
			{
				$updatedsched ->remarks = $oldval ."<br>". $newarray[0] ." ".$newarray[1];


			}
			array_push($schedlist,$updatedsched);
			//    echo sizeof($schedlist);

			//echo ($schedlist[sizeof($schedlist)] -> classnum);
			//echo "Row Contains Professor Only" . $newarray[0] . $newarray[1];
		}


	}



	echo json_encode($schedlist);
}

function loadinitiallist()
{

	$sqlConnect = mysql_connect('localhost','root','');

	if(!$sqlConnect){
		die("database connect fail:".mysql_error());
	}
	$selectdb = mysql_select_db('lbycp3b',$sqlConnect);
	$json_data = array(); // create a new array

	$result_out=mysql_query("SELECT * FROM course_list",$sqlConnect);
	while($rw=mysql_fetch_assoc($result_out)) {
		array_push($json_data, $rw);

	}

	echo json_encode($json_data);
}



function showcoursedescription()
{
	$fp = fsockopen("enroll.dlsu.edu.ph", 80, $errno, $errstr, 8);
//if the socket failed it's offline...
	if (!$fp) {
		die("1");
	}
	$url = "http://www.dlsu.edu.ph/offices/registrar/courses/Display_Profile1.asp?p13=" . strtoupper($_POST['course']);
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	if (curl_errno($curl)) {
		die("2");
	}
	$output = curl_exec($curl);

	curl_close($curl);
	$DOM = new DOMDocument;
	if ($output == "") {
		die("2");
	}
	$DOM->loadHTML($output);
	$finder = new DomXPath($DOM);
	$classname = "data";
	$nodes = $finder->query("//table[contains(concat(' ', @width, ' '), '100%')]//tr//td[last()]");
	$rowarray = array();
	$schedlist = array();
	for ($a = 1; $a < $nodes->length; $a++) {
		echo $nodes->item($a)->nodeValue . "\n";
		array_push($rowarray, str_replace("\n", ',', $nodes->item($a)->nodeValue));
	}


	for ($i = 0; $i < sizeof($rowarray); $i++) {

		$newarray = explode(',', $rowarray[$i]);
//echo $newarray[0]." ".$newarray[1]." ".$newarray[2]." ".$newarray[3]." ".$newarray[4]." ".$newarray[5]." ".$newarray[6]." ".$newarray[7]." ".$newarray[8]."\n";
		array_pop($newarray);
		$value = $newarray[0];
		$size = sizeof($newarray);


		if ($size == 9) //check if course number
		{
			if (preg_match("#[0-9]#", $value)) //check if class numbr
			{

				$newsched = new Schedule(
					$newarray[0],
					$newarray[1],
					$newarray[2],
					$newarray[3],
					$newarray[4],
					$newarray[5],
					$newarray[6],
					$newarray[7],
					$newarray[8]
				);
				array_push($schedlist, $newsched);
				//echo "Row Contains Complete Sched Details " . $newsched -> classnum;
				//echo sizeof($schedlist);
			} else  //check if  new date
			{

				$updatedsched = array_pop($schedlist);
				$oldval = $updatedsched->day;
				$updatedsched->day = $oldval . "<br>" . $newarray[3];
				$oldval = $updatedsched->time;
				$updatedsched->time = $oldval . "<br>" . $newarray[4];
				$oldval = $updatedsched->room;
				$updatedsched->room = $oldval . "<br>" . $newarray[5];
				if ($newarray[8] != "") {
					$oldval = $updatedsched->remarks;
					$updatedsched->remarks = $oldval . "<br>" . $newarray[7];
				}
				array_push($schedlist, $updatedsched);
				//echo sizeof($schedlist);
			}
		} else //check if prof
		{

			$updatedsched = array_pop($schedlist);
			$oldval = $updatedsched->remarks;
			if (strlen($oldval) > 0 && $oldval != "FRESHMAN BLOCK") {
				$updatedsched->remarks = $oldval . $newarray[0] . "" . $newarray[1];
			} else if ($oldval == "FRESHMAN BLOCK") {
				$updatedsched->remarks = $oldval . "<br>" . $newarray[0] . " " . $newarray[1];
			} else {
				$updatedsched->remarks = $oldval . "<br>" . $newarray[0] . " " . $newarray[1];


			}
			array_push($schedlist, $updatedsched);
			//    echo sizeof($schedlist);

			//echo ($schedlist[sizeof($schedlist)] -> classnum);
			//echo "Row Contains Professor Only" . $newarray[0] . $newarray[1];
		}
	}

}

?>