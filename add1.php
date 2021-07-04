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
?>
<html>
 <head>
 <title> Add </title>
 </head>
 <body>
<style>
 body {
 background-image: url('background.jpg');
 background-attachment: fixed;
 background-size: 100%100%;
 }
 </style>
 <br>
 <form action="" method="GET">
 <table border"0" bgcolor="white" align="center" cellspacing="20">
    <tr>
 <td>Product ID</td>
 <td><input type="text" value="" name="productid" required></td>
 </tr>

 <tr>
 <td>Product Name</td>
 <td><input type="text" value="" name="productname" required></td>
 </tr>

 <tr>
 <td>Product Price</td>
 <td><input type="text" value="" name="productprice" required></td>
 </tr>

 <tr>
 <td>Quantity</td>
 <td><input type="text" value="" name="quantityonhand" required></td>
 </tr>

 <tr>
 <td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Add"></td>
 </tr>
 </form>
 </table>
</body>
</html>
<?php
if($_GET['submit'])
{
$pi=$_GET['productid'];
$pn=$_GET['productname'];
$pp=$_GET['productprice'];
$qt=$_GET['quantityonhand'];
$query = "INSERT INTO atnshop1 VALUES ('$pi','$pn','$pp','$qt')";
$data = pg_query($pg_heroku,$query);
if($data)
{
echo "<script>alert('Added Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://atnshoptoys.herokuapp.com/login1.php" />
<?php
}
else
{
echo "Failed to update the table.";
}
}
?>
