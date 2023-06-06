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
  $sql = "SELECT * FROM Assignment WHERE ".$_GET["f"]."='".$_GET["first"]."' AND ".$_GET["t"]."='".$_GET["second"]."' AND user='".$_GET["user"]."'";
  $result = $conn->query($sql);
  if($result->num_rows == 0){
    $conn->close();
    print "<script language=javascript> alert('password find failed. Incorrect information.'); history.back(-2); </script>";
  }
  else{
    echo "<H1> ID = ".$_GET["user"]." 's password</H1>";
    echo "<hr><br><br>";
    $row = $result->fetch_assoc();
    echo "Your password is ".$row["password"];
    echo "<br><br>";    
  }
  $conn->close();
  echo "If you want to update this ID, click update.<br><br>";
  echo "<FORM METHOD=\"GET\" ACTION=\"http://cspro.sogang.ac.kr/~cse20171300/cgi-bin/update.php\">";
  echo "<Input type=\"hidden\" name=\"id\" value=".$_GET["user"].">";
  echo "<INPUT TYPE=\"submit\"VALUE=\"update\">";
}
?>
<html>
<body>
  <br>
<input type='button' value='login' onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/login.html'">
<br><br><br>
<input type="button" value="signup page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/signup.html'">
<input type="button" value="search page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/search.html'">
<input type="button" value="delete page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/delete.html'">
<input type="button" value="file upload page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/file_upload.html'">
</body></html>