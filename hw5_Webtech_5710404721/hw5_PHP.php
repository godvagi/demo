<html>
<body>

Firstname <?php echo $_POST["firstname"]; ?><br>
Lastname <?php echo $_POST["lastname"]; ?><br>
<?php echo $_POST["province"]; ?><br>
<?php
$province = $_POST["province"];

$myfile = fopen("slogan/$province.txt", "r") ;
echo fread($myfile,filesize("slogan/$province.txt"));
fclose($myfile);
?>

</body>
</html>