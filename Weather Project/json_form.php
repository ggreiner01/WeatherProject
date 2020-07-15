<html>
<head>
  <title>Weather Project</title>

<body>
    <?php
        include_once("header.php");
      ?>
      <hr>
     <form action='json_db_app.php' method='get'>

     <div class="form-row">
      <div class="form-group col-md-6">
        <label for="date">Please type in a date:</label>
		<input type="text" name="date">
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Do It!</button>
  </form>
   <hr>
</body>
</html>