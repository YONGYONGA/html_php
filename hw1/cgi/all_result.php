<html>
<body>
<H1>All result in mysql</H1>
<HR>
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
$sql = "SELECT * FROM Assignment";
$result = $conn->query($sql);
echo  "$result->num_rows data(s) recorded";
echo "<br><br>";
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

	$conn->close();
?>
<br>
<input type="button" value="signup page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/signup.html'">
<input type="button" value="search page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/search.html'">
<input type="button" value="delete page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/delete.html'">
<input type="button" value="file upload page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/file_upload.html'">
<br>
<input type="button" value="login" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/login.html'">
</body>
</html>

