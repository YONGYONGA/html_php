<html>
<body>

<?php
$servername = "localhost";
$username = "cse20171300";
$password = "asdf1234";
$dbname = "db_cse20171300";
$id_same=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT * FROM Assignment Where user='".$_GET["id"]."'";
$result = $conn->query($sql);
if($result->num_rows!=0){
	$id_same=1;
}
if($id_same==0){
	echo "<h2> (Sign up)   Your input</h2>";
	echo "<br><br>";
	echo "ID : "  ;
	echo $_GET["id"] ;
	echo "<br>";
	echo "Password : "  ;
	echo $_GET["password"] ;
	echo "<br>";
	echo "e-mail : "  ;
	echo $_GET["mail"] ;
	echo "<br>";
	echo "Home address : "  ;
	echo $_GET["address"] ;
	echo "<br>";
	echo "Phone Number : "  ;
	echo $_GET["phone"] ;
	echo "<br>";
	echo "School : "  ;
	echo $_GET["school"] ;
	echo "<br>";
	echo "Major : "  ;
	echo $_GET["major"] ;
	echo "<br>";
	echo "Interests : "  ;
	echo $_GET["c1"]."_". $_GET["c2"]."_". $_GET["c3"]."_". $_GET["c4"]."_". $_GET["c5"];
	echo "<br>";
	echo "<hr>";


	$sql = "INSERT INTO Assignment (user, password, mail,home_address,phone,school,major,interest)
	VALUES ('".$_GET["id"]
			."','".$_GET["password"]
			."','".$_GET["mail"]
			."','".$_GET["address"]
			."','".$_GET["phone"]
			."','".$_GET["school"]
			."','".$_GET["major"]
			."','".$_GET["c1"]."_". $_GET["c2"]."_". $_GET["c3"]."_". $_GET["c4"]."_". $_GET["c5"]."')";

	if ($conn->query($sql) === TRUE) {
	echo "School table insert sucessfully";
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else{
	echo "Same id already exist in sql. Insert failed";
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

