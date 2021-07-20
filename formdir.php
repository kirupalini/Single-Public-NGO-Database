
<!DOCTYPE html>
<html>
<head>
<title>Search NGOs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>NGO DIRECTORY</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
      <?php
error_reporting(E_ALL ^ E_NOTICE);?>
<?php
$con = mysqli_connect("localhost","root","Kiru0411","ngodb"); //connecting to database
if ($con==false)
  {
  die('Could not connect: ' . mysqli_connect_error()); //if connection is unsuccessful it give a message 'could not connect'
  }
mysqli_select_db($con,"ngodb"); 
if(!empty($_POST["Org_name"])) //the non-empty field is considered
{
$sql = "SELECT oname, oid, country, sector, statute, yoe, email, prime_awardee, cert_no  FROM ngo WHERE oname='$_POST[Org_name]' ";
$result = $con->query($sql);
}
elseif(!empty($_POST["Org_id"]))
{
$sql = "SELECT oname, oid, country, sector, statute, yoe, email, prime_awardee, cert_no  FROM ngo WHERE oid='$_POST[Org_id]' ";
$result = $con->query($sql);
}
elseif(!empty($_POST["Country"]))
{
$sql = "SELECT oname, oid, country, sector, statute, yoe, email, prime_awardee, cert_no  FROM ngo WHERE country='$_POST[Country]' ";
$result = $con->query($sql);
}
else
{
$sql = "SELECT oname, oid, country, sector, statute, yoe, email, prime_awardee, cert_no  FROM ngo WHERE sector='$_POST[Sector]' ";
$result = $con->query($sql);
}


if ($result->num_rows > 0) {
  						// output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<br>"."Organisation name: " . $row["oname"]. "<br>"." Organisation id: " . $row["oid"]."<br>"."Country/Region: " . $row["country"]. "<br>"."Sector: " . $row["sector"]. "<br>"."Statute: " . $row["statute"]. "<br>"."Year of establishment: " . $row["yoe"]. "<br>"."Email: " . $row["email"]. "<br>"."Prime awardee: " . $row["prime_awardee"]. "<br>"."Certificate number: " . $row["cert_no"]."<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($con); //closing connection to database
?>
                
				
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					<input type="submit" value="Back" onclick="location.href='formdir.html'">
				</form>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2020 SPND.</p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>

