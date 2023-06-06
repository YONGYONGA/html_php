<html>
<body>

<h1> (Search) Your input</h1>
<?php
echo $_GET["ck"]." : ".$_GET["search"];
echo "<br>";
?>
<hr>
<h2> Search result</h2>
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

$sql = "SELECT * FROM Assignment";
$result = $conn->query($sql);

$count=0;
$test=0;
if($_GET["ck"]=="interest"){
  if($_GET["search"]=="Computer Science" ||$_GET["search"]=="Electronic"||$_GET["search"]=="Chemical and Biomolecular"||$_GET["search"]=="Mechanical"||$_GET["search"]=="Else"){
    $test=1;
  }
}

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row[$_GET["ck"]]==$_GET["search"]|| ($test==1 && (strpos($row[$_GET["ck"]], $_GET["search"]) !== false))){
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
        $count=$count+1;
    //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";*/
    }

  }
} 
else {
  echo "0 results";
}
/*$tmpString = "hello zxchsr tistory";  
$srhString = "tistory";  
  
if(strpos($tmpString, $srhString) !== false) {  
    // 포함
    echo "Yes";
} else {  
    // 미포함
    echo "No";
}*/
echo "$count data(s) searched";
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