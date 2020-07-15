<html>
<body>
<?php
	include_once("DBClass.php");
	include_once("pw.php");
        $DataBase = "epiz_24252701_weather";
        $table = "files";
        $DB = new DBIO( $DataBase, $table );
        $DB->setUser( $user );
        $DB->setPass( $pass );
        $DB->connectDB();
        $DB2 = new DBIO( $DataBase, $table );
        $DB2->setUser( $user );
        $DB2->setPass( $pass );
        $DB2->connectDB();
		$Q = "SELECT * from $table";
        $DB2->doQuery($Q);
		$DB2->setResults();
        $RES = $DB2->getResults();
		
		
$php_contents = file_get_contents("https://mynbhd.org/Oc/data/");
	
	$content = (explode(" ",$php_contents));
	
	$index = 0;
	$urls = [];
	foreach($content as $lines){
		$startOfString = strpos($lines, "2");
		$endOfString = strpos($lines,"csv");
		if($startOfString != false && $endOfString != false)
		{
			$urls[$index] = substr($lines, $startOfString, $endOfString);
			$index++;
		}
	}
	$fileName = " ";
	foreach ( $RES as $ct => $ROW ) {	
		foreach($urls as $getContent){
			$file = str_replace('">2', "", $getContent);
			$N = $ROW['Name'];
			$isInDB = 0;
			if($N == $file){
				$isInDB+=1;
			}	
			if($isInDB == 0){
				$fileName = $file;
			}
		}
	}
	$Q = "INSERT INTO files (Name) VALUES ('$fileName')";
	$DB->doQuery($Q);
	?>
	</body>
</html>