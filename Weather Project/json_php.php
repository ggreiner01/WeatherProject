<?php
			$myObj->day = "02/20/2017";
			$myObj->hour = "00";
			$myObj->temp = "43.29";
			$myJSON = json_encode($myObj);
			echo $myJSON;
	$file = 52;
		include_once("pw.php");
        include_once("DBClass.php");
		$DataBase = "epiz_24252701_weather";
        $table = "data";
		$DB = new DBIO( $DataBase, $table );
		$DB->setUser( $user );
		$DB->setPass( $pass );
		$DB->connectDB();
		$Q="SELECT * FROM $table WHERE fileID = $file LIMIT 1";
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
		}
    ?>