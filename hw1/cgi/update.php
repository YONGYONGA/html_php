<html>
<body>
<?php
echo "<H1>Update ".$_GET["id"]." data</H1>";
?>
<FORM METHOD="GET" ACTION="">
<hr>
<br> Select update options : <P>
<UL>
<LI><INPUT TYPE="radio" NAME="ck" VALUE="password" checked>Password
<LI><INPUT TYPE="radio" NAME="ck" VALUE="mail">Email
<LI><INPUT TYPE="radio" NAME="ck" VALUE="home_address">Address
<LI><INPUT TYPE="radio" NAME="ck" VALUE="phone">Phone number   
<LI><INPUT TYPE="radio" NAME="ck" VALUE="school">School   
<LI><INPUT TYPE="radio" NAME="ck" VALUE="major">Major   
<LI><INPUT TYPE="radio" NAME="ck" VALUE="interest">Interests   
</UL>
<P>
update content : <INput name="uu" required><P>
<Input type="hidden" name="u_p" value=1> <P>
  <?php        
  echo "<Input type=\"hidden\" name=\"id\" value=".$_GET["id"].">";
  ?>
To update, press this button: <INPUT TYPE="submit"VALUE="Update"><P>

<?php
if($_GET["u_p"]==1){
  echo "<hr>";

  $servername = "localhost";
  $username = "cse20171300";
  $password = "asdf1234";
  $dbname = "db_cse20171300";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT * FROM Assignment WHERE user='".$_GET["id"]."'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $original=$row[$_GET["ck"]]; 
  if($original!=$_GET["uu"]){
    echo $_GET["id"]."'s ".$_GET["ck"]." data update success";
    echo "<br>";
    echo $original;
    echo " -> ";
    $sql ="UPDATE Assignment SET ".$_GET["ck"]."='".$_GET["uu"]."' WHERE user='".$_GET["id"]."'";
    $conn->query($sql);
    /*echo $sql;
    echo "<br>";
    $sql = "SELECT * FROM Assignment WHERE user='".$_GET["id"]."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $original=$row[$_GET["ck"]]; */
    echo $_GET["uu"];
  }
  else{
    echo "Same data. update fail<br>";
    echo $_GET["uu"]."<br>";
  }
}
?>
<br>
<hr>
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