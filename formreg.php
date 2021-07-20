<?php
error_reporting(E_ALL ^ E_NOTICE);?>
<?php
$con = mysqli_connect("localhost","root","Kiru0411","ngodb"); //connecting to database
if ($con==false)
  {
  die('Could not connect: ' . mysqli_connect_error()); //if connection is unsuccessful it gives a message 'could not connect'
  }
mysqli_select_db($con,"ngodb");
$sql="insert into ngo(oname,oid,country,sector,statute,yoe,email,prime_awardee,cert_no) VALUES('$_POST[Org_name]','$_POST[Org_id]','$_POST[Country]','$_POST[Sector]','$_POST[Statute]','$_POST[Yoe]','$_POST[email]','$_POST[Primeawardee]','$_POST[Certificate_no]')";//inserting the values into table


if (mysqli_query($con, $sql)) {
     header('Location: indexreg.html'); //redirecting
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

//echo "Thank you";
mysqli_close($con); //closing connection to database
?>