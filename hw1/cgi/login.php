<html>
<body>

<h1> Login result</h1>
<?php
$servername = "localhost";
$username = "cse20171300";
$password = "asdf1234";
$dbname = "db_cse20171300";
$id_c=0;
$pas_c=0;
$t=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM Assignment Where user='".$_GET["id"]."'";
$result = $conn->query($sql);
if($result->num_rows!=0){
  $id_c=1;
}
else{
  echo "ID error.<br>";
}
if($id_c==1){
  $row=$result->fetch_assoc();
  if($row["password"]==$_GET["password"]){
    $pas_c=1;
  }
  else{
    echo "password error.<br>";
  }
}
if($id_c==1 && $pas_c==1){
  $t=l;

  echo "login success<br><br>";
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
        //echo "<input type='button' value='login' onClick=\"location.href='http://cspro.sogang.ac.kr/~cse20171300/cgi-bin/login.html'\">";
        echo "<FORM METHOD=\"GET\" ACTION=\"http://cspro.sogang.ac.kr/~cse20171300/cgi-bin/update.php\">";
        echo "<Input type=\"hidden\" name=\"id\" value=".$_GET["id"].">";
        echo "<INPUT TYPE=\"submit\"VALUE=\"update\">";
}
else{
  echo "login failed.<br><br>";
  echo "<input type='button' value='find id' onClick=\"location.href='http://cspro.sogang.ac.kr/~cse20171300/id_find.html'\">";
  echo "      ";
  echo "<input type='button' value='find password' onClick=\"location.href='http://cspro.sogang.ac.kr/~cse20171300/password_find.html'\">";
}
$conn->close();
?>
<br>
<input type='button' value='re-login' onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/login.html'">
<br><br><br>
  <input type="button" value="signup page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/signup.html'">
<input type="button" value="search page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/search.html'">
<input type="button" value="delete page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/delete.html'">
<input type="button" value="file upload page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/file_upload.html'">
</body>
</html>