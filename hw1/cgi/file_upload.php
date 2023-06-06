<html>
  <body>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if(strtolower(pathinfo($target_file,PATHINFO_EXTENSION))!="xml"){
  echo "please upload .xml file";
  echo "<br>";
  $uploadOk=0;
}
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  echo "<br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  echo "<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<H1>Sign Up(xml file load)</H1>";
    echo "<br>";
    echo "<hr>";
  } else {
    echo "Sorry, there was an error uploading your file.<br>";
    $uploadOk=0;
  }
}
if($uploadOk==1){
  $xml=simplexml_load_file("uploads/".htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]))) or die("Error: Cannot create object");
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
  foreach($xml->children() as $student) {
    $id_same=0;
    $sql="SELECT * FROM Assignment Where user='".$student->id."'";
    $result = $conn->query($sql);
    if($result->num_rows!=0){
      $id_same=1;
    }
    if($id_same==0){
      echo "ID :".$student->id . "<br>";
      echo "Password: ".$student->password . "<br>";
      echo "E-mail: ".$student->mail . "<br>";
      echo "Home address: ".$student->home_address . "<br>";
      echo "Phone number: ".$student->phone . "<br>";
      echo "School: ".$student->school . "<br>";
      echo "Major: ".$student->major . "<br>";
      echo "Interests: ".$student->interest . "<br>";
      echo "<br>";
      $sql = "INSERT INTO Assignment (user, password, mail,home_address,phone,school,major,interest)
      VALUES ('".$student->id
          ."','".$student->password
          ."','".$student->mail
          ."','".$student->home_address
          ."','".$student->phone
          ."','".$student->school
          ."','".$student->major
          ."','".$student->interest."')";
      $conn->query($sql);
    }
    else{
      echo "Same id already exist in sql.(";
      echo $student->id."). So pass";
      echo "<br><br>";
    }
  }
  echo "<H2>File & mysql upload(file uploaded in uploads folder)</H2>";
}
?>

  <input type="button" value="signup page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/signup.html'">
<input type="button" value="search page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/search.html'">
<input type="button" value="delete page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/delete.html'">
<input type="button" value="file upload page" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/file_upload.html'">
<br>
<input type="button" value="all result" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/cgi-bin/all_result.php'">
<br>
<input type="button" value="all result" onClick="location.href='http://cspro.sogang.ac.kr/~cse20171300/login.html'">
</body></html>
