<?php
Class DBIO {
    private $database;
    private $tableName;
    private $userId;
    private $pass;
    private $connect;

    function __construct( $database, $tableName ) {
        $this->database = $database;
        $this->tableName = $tableName;
    }
    public function setPass(  $pass ) {
        $this->pass = $pass;
    }
    public function setUser(  $user ) {
        $this->userid = $user;
    }
    public function connectDB(  ) {
        $server = '127.0.0.1';
        $this->connect = mysqli_connect( $server, $this->userid, $this->pass, $this->database )
           or die ("Cannot connect to $server using $this->userid Errst=" .  mysqli_error());
    }
    public function doQuery(  $query ) {
        //print "The Query is <i>$query</i><br>";

        print "<br><span size='20px'; color='blue'>";
        $this->results = mysqli_query( $this->connect, $query ) or
        die ("Database query failed SQLcmd=$query Error_str=" .  mysqli_error());
    }
    function setResults(  ) {
        $RESULTS = array();
        $res = $this->results;
        while( $row =$res->fetch_array(MYSQLI_ASSOC) ){
          $RESULTS[] = $row;
        }
        $this->RESULTS = $RESULTS;
      }
    function getResults(  ) {
         return $this->RESULTS;
    }
}
?>
