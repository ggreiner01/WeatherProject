<?php    session_start(); ?>
<html>
<head>
  <title> Sample Form </title>
<head>
  <?php
    include_once("header.html");
	include_once("header.php");
  ?>
</head>
<body>
	<a  href="http://weatherproject.rf.gd/Form.php">Go back</a>
    <?php   
        include_once("pw.php");
        include_once("DBClass.php");
        
		if(!isset($_REQUEST['pick1'])){
			print"<br /> hey you need to pick a date to ";
			exit;
		}

		$file = $_REQUEST['pick1'];
		
		$stopMeasure = sizeof($file);
		
		//print "<br /> The q=$Q";
		$DataBase = "epiz_24252701_weather";
		$table = "data";
		$DB = new DBIO( $DataBase, $table );
		$Q="SELECT * FROM $table WHERE fileID = $file[0]";
		$DB->setUser( $user );
		$DB->setPass( $pass );
		$DB->connectDB();
    ?>
   <hr />
   <h2 align='center'> Weather Data </h2>
   <table border='1' align='center'>
   <tr> <th>Date</th><th>Hour</th><th>Temperature</th><th>barometric pressure</th>
   <th>Humidity</th><th>Dew Point</th></tr>
   <?php
	$stopMeasure = sizeof($file);
	for($i=0; $i<$stopMeasure; $i++){
		$file = $_REQUEST['pick1'];
		$Q="SELECT * FROM $table WHERE fileID = $file";
		$DB->doQuery($Q);
		$DB->setResults();
		$RES = $DB->getResults();
		foreach ($RES as $ct => $ROW ) {	
			$date = $ROW['Date'];
			$hour = $ROW['Hour'];
			$temperature = $ROW['Temperature'];
			$unknown = $ROW['Unknown'];
			$something = $ROW['Something'];
			$why = $ROW['Why'];
			print"\n<tr><td>$date</td>";
			print"<td>$hour</td>";
			print"<td>$temperature</td>";
			print"<td>$unknown</td>";
			print "<td>$something</td><td>$why</td>";
			print"</tr>";
		}
		}
	print"</table>";
    ?>
	</table>
</body>
</html>
<?php
	Class weatherData{
		private $setDates;
		private $setHour;
		private $setTemperature;
		private $setUknown;
		private $setSomething;
		private $setWhy;
		function __construct($name){
			$this->name=$name;
		}
		function setData($data){
			$this->data =$data;
		}
		function getData()
		{
			return $this->data;
		}
		function setDates($date){
		$this->dates=$date; 
		}
		function getDates(){
			return $this->dates;
		}
		function setHour($hour){
		$this->hour=$hour;
		}
		function getHour(){
			return $this->hour;
		}
		function setTemperature($temp){
		$this->temp=$temp;
		}
		function getTemperature(){
			return $this->temp;
		}
		function setUnknown($unknown){
		$this->unknown=$unknown;
		}
		function getUnknown(){
			return $this->unknown;
		}
		function setSomething($something){
		$this->something=$something;
		}
		function getSomething(){
			return $this->something;
		}
		function setWhy($why){
		$this->why=$why;
		}
		function getWhy(){
			return $this->why;
		}
	}