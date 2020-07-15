<html>
<head>
  <title>Weather Project</title>

<body>
    <?php
        include_once("header.php");
        
        include_once("DBClass.php");
        include_once("pw.php");
        //myHeader5( "Easy As Pie University Course Catalog!", "pie.PNG", "pie.PNG");
        $DataBase = "epiz_24252701_weather";
        $table = "files";
        $DB = new DBIO( $DataBase, $table );
        $DB->setUser( $user );
        $DB->setPass( $pass );
        $DB->connectDB();
        $Q = "SELECT * from $table";
        $DB->doQuery($Q);
        $DB->setResults();
        $RES = $DB->getResults();
      ?>
      <hr>
     <form action='handler.php' method='get'>

     <div class="form-row">
      <div class="form-group col-md-6">
        <label for="pick1">Pick A specific month:</label>
        <select name='pick1' id='pick1' multiple>
          <?php
			 foreach ( $RES as $ct => $ROW ) {
			  $id = $ROW['ID'];
              $N = $ROW['Name'];
              print "\n<option value='$id'> $N </option> ";
			 }
          ?>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Do It!</button>
  </form>
   <hr>
</body>
</html>