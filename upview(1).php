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
font-size:50px;
font-weight:bold;
font-style:italic;
text-align:center;
color:white;
}
h2{
text-align:center;
color:white;
}
table{
  border: 1px solid white;
  color:white;
  margin-left:585px;
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
a{
text-decoration:none;
font-size:20px;
color:white;
margin-left:670px;
}
a:hover{
text-decoration:underline;
font-weight:bold;
}
</style>
</head>
<body>
<?php
// Create connection
$conn = new mysqli("localhost","root","","srms");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<?php
$nm = $_POST['nm'];
$mrk = $_POST['marks'];
$sub = $_POST['sub'];
if(strpos($_POST["type"],"1")==10){
$upd1 = "UPDATE intr1 set marks=$mrk where subject='$sub' and name='$nm'";
$result = mysqli_query($conn,$upd1);
}

else if(strpos($_POST["type"],"2")==10){
$upd2 = "UPDATE intr2 set marks=$mrk where subject='$sub' and name='$nm'";
$result = mysqli_query($conn,$upd2);
}

else if(strpos($_POST["type"],"3")==10){
$upd3 = "UPDATE intr3 set marks=$mrk where subject='$sub' and name='$nm'";
$result = mysqli_query($conn,$upd3);
}

else if(strpos($_POST["type"],"A")==0){
$upd4 = "UPDATE assign set marks=$mrk where subject='$sub' and name='$nm'";
$result = mysqli_query($conn,$upd4);
}
$sql = "SELECT sem from slist where name='$nm'";
$res = mysqli_query($conn,$sql);

?>
<?php if($result){ ?>
      <p><?php echo "Updated Successfully !"; ?></p>
       <?php }
    else{
       echo "Update not possible";
 } ?>
<h2>Details of the student whose marks has been updated:-</h2><br>
<form action="upview.php" method="POST" style="color:white;font-size:25px;font-weight:bold;">
<label for="nm" style="margin-left:640px;">Name : </label>
<input type="text" id="nm" name="nm" value="<?php echo $_POST['nm']; ?>"><br><br>
<label for="sem" style="margin-left:640px;">Semester : </label>
<input type="text" id="sem" name="sem" value="<?php if($row = mysqli_fetch_array($res)){ echo $row['sem']; } ?>"><br><br>
<input type="submit" style="margin-left:650px;padding:10px;font-size:25px;font-weight:bold;color:purple;background-color:white;" value="View Updated Marks" id="btn">
</form>
<br><br>
</body>
</html>
