<html>
<body>

<h1> (Delete) Your input</h1>
<?php
echo $_GET["ck"]." : ".$_GET["delete"];
echo "<br>";
?>
<hr>
<h2> Delete result</h2>
<br>
<?php
$servername = "localhost";
$username = "cse20171300";
$password = "asdf1234";
$dbname = "db_cse20171300";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$test=0;
if($_GET["ck"]=="interest"){
  if($_GET["delete"]=="Computer Science" ||$_GET["delete"]=="Electronic"||$_GET["delete"]=="Chemical and Biomolecular"||$_GET["delete"]=="Mechanical"||$_GET["delete"]=="Else"){
    $test=1;
  }
}
if($test==0){
  $sql = "SELECT * FROM Assignment WHERE ".$_GET["ck"]."='".$_GET["delete"]."'";
  $result = $conn->query($sql);
  if($result->num_rows == 0){
    $conn->close();
    print "<script language=javascript> alert('No data. delete fail'); history.back(-2); </script>";
  }
  $sql="DELETE FROM Assignment WHERE ".$_GET["ck"]."='".$_GET["delete"]."'";
  //echo $sql;
  //echo "<br>";
  if($conn->query($sql)==TRUE)
    echo "Record deleted successfully";
  else
    echo "error";
}
else{
  $sql = "SELECT * FROM Assignment WHERE interest LIKE '%".$_GET["delete"]."%'";
  $result = $conn->query($sql);
  if($result->num_rows == 0){
    $conn->close();
    print "<script language=javascript> alert('No data. delete fail'); history.back(-2); </script>";
  }
  $sql="DELETE FROM Assignment WHERE interest LIKE '%".$_GET["delete"]."%'";
  if($conn->query($sql)==TRUE)
	echo "Record deleted successfully";
  else
	  echo "error";
}
echo"<hr>";
echo "<h2> Table Elements </h2>";
$sql = "SELECT * FROM Assignment";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

      echo "id : "  ;
      echo $row["id"] ;
      echo "<br>";
      echo "user : "  ;
      echo $row["user"] ;
      echo "<br>";
      echo "Password : "  ;
      echo $row["password"] ;
      echo "<br>";
      echo "e-mail : "  ;
      echo $row["mail"] ;
      echo "<br>";
      echo "Home address : "  ;
      echo $row["home_address"] ;
      echo "<br>";
      echo "Phone Number : "  ;
      echo $row["phone"] ;
      echo "<br>";
      echo "School : "  ;
      echo $row["school"] ;
      echo "<br>";
      echo "Major : "  ;
      echo $row["major"] ;
      echo "<br>";
      echo "Interests : "  ;
      echo $row["interest"];
      echo "<br>";
      echo "data : "  ;
      echo $row["reg_date"] ;
      echo "<br>";
      echo "<br>";
     echo "<br>";
    }
  } 
  else {
    echo "0 results";
  }
$conn->close();
?>
<br>
  <input type="button" value="signup page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/signup.html'">
<input type="button" value="search page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/search.html'">
<input type="button" value="delete page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/delete.html'">
<input type="button" value="file upload page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/file_upload.html'">
<br>
<input type="button" value="all result" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/cgi-bin/all_result.php'">
<br>
<input type='button' value='login' onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/login.html'">
</body>
</html>