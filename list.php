<html>
<head>
<style>
body{
margin-top:40px;
background-image:url("bg.jpg");
background-repeat:no-repeat;
background-size:cover;
}
p{
font-size:40px;
text-align:center;
color:white;
}
table{
  border: 1px solid white;
  color:white;
  margin-left:615px;
}
 th {
  border: 1px solid white;
  font-size:25px;
  color:white;
  padding:10px;
}
td {
  border: 1px solid white;
  font-size:20px;
  color:white;
  padding:8px;
  text-align:center;
  font-weight:bold;
}
td button{
text-decoration:none;
background-color:purple;
color:white;
font-size:20px;
}
td button:hover{
background-color:white;
color:purple;
}
</style>
</head>
<body>
<p>Welcome <?php echo $_POST["namee"]; ?> !</p>
<p>Students List</p>
<?php
// Create connection
$conn = new mysqli("localhost","root","","srms");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if((strpos($_POST["pass"],"CSE")==3 && strpos($_POST["pass"],"M")==0) || (strpos($_POST["pass"],"CSE")==3 && strpos($_POST["pass"],"S")==0)){
$sql = "SELECT * from slist where sem='MSc,1st Sem'";
$res = mysqli_query($conn,$sql);
}
if((strpos($_POST["pass"],"CSE")==3 && strpos($_POST["pass"],"H")==0) || (strpos($_POST["pass"],"CSE")==3 && strpos($_POST["pass"],"N")==0)){
$sql = "SELECT * from slist where sem='BE,3rd Sem'";
$res = mysqli_query($conn,$sql);
}
if(strpos($_POST["pass"],"ADM")==3){
$sql = "SELECT * from slist";
$res = mysqli_query($conn,$sql);
}
if(strpos($_POST["pass"],"ECE")==3 && strpos($_POST["pass"],"D")==0){
$sql = "SELECT * from slist where sem='MSc,3rd Sem'";
$res = mysqli_query($conn,$sql);
}
if((strpos($_POST["pass"],"ECE")==3 && strpos($_POST["pass"],"K")==0) || (strpos($_POST["pass"],"ECE")==3 && strpos($_POST["pass"],"M")==0)){
$sql = "SELECT * from slist where sem='BE,5th Sem'";
$res = mysqli_query($conn,$sql);
}
if(strpos($_POST["pass"],"MEC")==3 && strpos($_POST["pass"],"R")==0){
$sql = "SELECT * from slist where sem='BE,1st Sem'";
$res = mysqli_query($conn,$sql);
}
if((strpos($_POST["pass"],"MEC")==3 && strpos($_POST["pass"],"G")==0) || (strpos($_POST["pass"],"MEC")==3 && strpos($_POST["pass"],"A")==0)){
$sql = "SELECT * from slist where sem='BE,7th Sem'";
$res = mysqli_query($conn,$sql);
}
?>
  <table>
  <tr>
  <th><u>Name</u></th>
  <th><u>Semester</u></th>
  </tr>
<?php
  while($row = mysqli_fetch_array($res)) {
?>
  <tr>
  <td><?php echo $row['name']; ?></td>
  <td><?php echo $row['sem']; ?></td>
  </tr>
<?php
    }
$conn->close();
?>
</table>
<br><br>
<p>To view details of the student:-</p><br>
<form action="view.php" method="POST" style="color:white;font-size:20px;margin-left:640px;">
<label for="nm">Name : </label>
<input type="text" id="nm" name="nm"><br><br>
<input type="submit" name="enter" value="Enter" style="margin-left:90px;font-size:20px;">
</form>
<br>
</body>
</html>