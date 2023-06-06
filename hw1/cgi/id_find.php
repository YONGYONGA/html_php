
<?php
if ($_GET["f"]==$_GET["t"]){
  print "<script language=javascript> alert('choose different option!'); history.back(-2); </script>";
}
else{
  $servername = "localhost";
  $username = "cse20171300";
  $password = "asdf1234";
  $dbname = "db_cse20171300";
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM Assignment WHERE ".$_GET["f"]."='".$_GET["first"]."' AND ".$_GET["t"]."='".$_GET["second"]."'";
  $result = $conn->query($sql);
  if($result->num_rows == 0){
    $conn->close();
    print "<script language=javascript> alert('id find failed. Incorrect information.'); history.back(-2); </script>";
  }
  else{
    while($row = $result->fetch_assoc()){
      echo "Your id is ".$row["user"];
      echo "<br><br>";
    }
  }
  $conn->close();
  echo "<input type='button' value='find password' onClick=\"location.href='http://cspro.sogang.ac.kr/~cse20171300/password_find.html'\">";
  echo "<br>";
  echo "<input type='button' value='login' onClick=\"location.href='http://cspro.sogang.ac.kr/~cse20171300/login.html'\">";
}
?>