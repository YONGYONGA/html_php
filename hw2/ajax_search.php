<?php
//echo $_GET["ck"]." : ".$_GET["search"];
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

$sql = "SELECT * FROM Assignment WHERE ".$_GET["one"]."='".$_GET["two"]."'";
$result = $conn->query($sql);

/*$count=0;
$test=0;
if($_GET["ck"]=="interest"){
  if($_GET["search"]=="Computer Science" ||$_GET["search"]=="Electronic"||$_GET["search"]=="Chemical and Biomolecular"||$_GET["search"]=="Mechanical"||$_GET["search"]=="Else"){
    $test=1;
  }
}*/
//echo $_GET["one"].$_GET["two"];
//echo "hi?";
//echo $result->num_rows;
if ($result->num_rows > 0) {
    $outp="[";
  while($row = $result->fetch_assoc()) {
   if($outp!="["){$outp.=",";}
   $outp.='{"id":"'.$row["user"].'",';
    $outp.='"password":"'.$row["password"].'",';
    $outp.='"email":"'.$row["mail"].'",';
    $outp.='"Home_address":"'.$row["home_address"].'",';
    $outp.='"Phone_number":"'.$row["phone"].'",';
    $outp.='"School":"'.$row["school"].'",';
    $outp.='"Major":"'.$row["major"].'",';
    $outp.='"Interests":"'.$row["interest"].'"}';

    //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";*/
    

  }
  $outp.="]";
  echo $outp;
} 
else {
  echo "";
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

$conn->close();
?>
