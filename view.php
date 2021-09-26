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
font-size:30px;
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
$sql = "SELECT sem FROM slist where name='$nm'";
$res = mysqli_query($conn,$sql);
$sql1 = "SELECT subject,marks FROM intr1 where name='$nm'";
$res1 = mysqli_query($conn,$sql1);
$sql2 = "SELECT subject,marks FROM intr2 where name='$nm'";
$res2 = mysqli_query($conn,$sql2);
$sql3 = "SELECT subject,marks FROM intr3 where name='$nm'";
$res3 = mysqli_query($conn,$sql3);
$sql4 = "SELECT subject,marks FROM assign where name='$nm'";
$res4 = mysqli_query($conn,$sql4);
?>
<br>
<h2>Name : <?php echo $nm; ?></h2>
<h2>Semester : <?php if($row = mysqli_fetch_array($res)){ echo $row['sem']; } ?></h2>
<p>Internal Assessment 1</p>
<table>
<tr>
<th>Subject</th>
<th>Marks</th>
</tr>
<?php while($row = mysqli_fetch_array($res1)){ ?>
<tr>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['marks'];?></td>
</tr>
<?php } ?>
</table><br><br>
<p>Internal Assessment 2</p>
<table>
<tr>
<th>Subject</th>
<th>Marks</th>
</tr>
<?php while($row = mysqli_fetch_array($res2)){ ?>
<tr>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['marks'];?></td>
</tr>
<?php } ?>
</table><br><br>
<p>Internal Assessment 3</p>
<table>
<tr>
<th>Subject</th>
<th>Marks</th>
</tr>
<?php while($row = mysqli_fetch_array($res3)){ ?>
<tr>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['marks'];?></td>
</tr>
<?php } ?>
</table><br><br>
<p>Assignment</p>
<table>
<tr>
<th>Subject</th>
<th>Marks</th>
</tr>
<?php while($row = mysqli_fetch_array($res4)){ ?>
<tr>
<td><?php echo $row['subject'];?></td>
<td><?php echo $row['marks'];?></td>
</tr>
<?php } ?>
</table>
<br><br>
<hr style="background-color:white;margin-left:35px;margin-right:35px;min-height:2.5px;">
<br>
<p>To update the marks of the student:-</p><br>
<form action="upview(1).php" method="POST" style="color:white;font-size:20px;">
<label for="nm" style="margin-left:640px;">Name : </label>
<input type="text" id="nm" name="nm" value="<?php echo $_POST['nm']; ?>"><br><br>
<label for="type" style="margin-left:490px;">Internals 1 / Internals 2 / Internals 3 / Assignment : </label>
<input type="text" name="type" id="type"><br><br>
<label for="sub" style="margin-left:640px;">Subject : </label>
<input type="text" name="sub" id="sub"><br><br>
<label for="marks" style="margin-left:640px;">Marks : </label>
<input type="number" name="marks" id="marks"><br><br>
<button style="margin-left:710px;font-size:20px;" onclick="func()">Update Marks</button><br>
</form><br>
<script>
function func() {
  alert("Updated Successfully!");
}
</script>

<?php $conn->close(); ?>
</body>
</html>