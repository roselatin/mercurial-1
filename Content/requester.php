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


    public function __construct($classnum, $coursename,$section,$day,$time,$room,$enrlcap,$enrld,$remarks) {

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
$url = "http://enroll.dlsu.edu.ph/dlsu/view_actual_count?p_course_code=".$_POST['course'];
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($curl);
curl_close($curl);
$DOM = new DOMDocument;
$DOM->loadHTML($output);
$finder = new DomXPath($DOM);
$classname="data";
$nodes = $finder->query("//td[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
//display all H1 text
$schedlist = array();
for ($i = 9; $i < $nodes->length-8; $i+=9)
{
     $newsched = new Schedule(
         str_replace("\n", '', $nodes -> item($i) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+1) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+2) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+3) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+4) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+5) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+6) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+7) -> nodeValue)  ,
         str_replace("\n", '', $nodes -> item($i+8) -> nodeValue)
         );
    array_push($schedlist,$newsched);

}
echo json_encode($schedlist). "\n";

    ?>