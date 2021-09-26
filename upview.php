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
$sem = $_POST['sem'];
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
<h2>Semester : <?php echo $sem;  ?></h2>
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
<a href="https://localhost/task3/hp.html">Back to Home Page</a><br><br>
 <?php $conn->close(); ?>
</body>
</html>