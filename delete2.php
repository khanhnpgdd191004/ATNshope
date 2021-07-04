<?php
$host_heroku = "ec2-3-224-7-166.compute-1.amazonaws.com";
$db_heroku = "d6achetke3qsrm";
$user_heroku = "qdmyunzjumiaap";
$pw_heroku =
"c4f2f1852f1ef8adea080add5bfa868f9f4161afbb02957155c78630803d404c";
$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
$pg_heroku = pg_connect($conn_string);
if (!$pg_heroku)
{
die('Error: Could not connect: ' . pg_last_error());
}
$productid=$_GET['pi'];
$query = "DELETE FROM atnshop2 WHERE productid = '$productid'";
$data = pg_query($pg_heroku,$query);
if($data)
{
 echo "<script>alert('Delete Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://atnshoptoys.herokuapp.com/login2.php" />
<?php
}
else
{
 echo "Failed to delete.";
}
?>
