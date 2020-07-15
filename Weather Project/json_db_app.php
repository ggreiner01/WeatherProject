<?php 
	session_start(); 
    include_once("header.html");
	include_once("header.php");
	$date = $_REQUEST['date'];
?>
<!DOCTYPE html>
<html>
<body>
<br>
<p id="demo"></p>
<script>
var obj, dbParam, xmlhttp, myObj, x, txt = "";
var dateInput = "<?php echo $date?>";
obj = { table: "data", day: dateInput};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    myObj = JSON.parse(this.responseText);
    txt += "<table border='1' align='center'>"
	txt+= "<tr> <th>Date</th><th>Hour</th><th>Temperature</th><th>barometric pressure</th>";
    txt +="<th>Humidity</th><th>Dew Point</th></tr>";
    for (x in myObj) {
      txt += "<tr><td>" + myObj[x].Date + "</td><td>" + myObj[x].Hour + "</td>";
	  txt += "<td>" + myObj[x].Temperature + "</td><td>" + myObj[x].Unknown + "</td>";
	  txt += "<td>" + myObj[x].Something + "</td><td>" + myObj[x].Why + "</td></tr>";
    }
    txt += "</table>"    
    document.getElementById("demo").innerHTML = txt;
  }
};
xmlhttp.open("POST", "http://weatherproject.rf.gd/json_db_test.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
</script>

</body>
</html>
