<?PHP

session_start();

$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "table";

$username = $_POST['username'];
$password = $_POST['password'];
if ($username&&$password)
{
	mysql_connect("$db_host","$db_username","$db_pass") or die("Couldn't connect");
	mysql_select_db("$db_name") or die("couldn't find db");
	$query = mysql_query("SELECT * FROM login WHERE username='$username'");
	
	$numrows = mysql_num_rows($query);
	if ($numrows != 0)
	{
		while ($row = mysql_fetch_assoc($query))
		{
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
		}
		//check to see if they match!
		if($username==$dbusername&&$password==$dbpassword)
		{
			echo "You're in! <a href='search.php'>Click here </a>to enter the member page.";
			$_SESSION['username']=$username;
		}	
		else
			echo"Incorrect password!";
	}
	else
	{
		die("That user doesn't exist!");
	}
	
}
else
{
	die ("Please enter username and password!");
}

?>

<html>
<head>
<title>Login</title>

<!--[if lt IE 9]>
<script src="html5.js"></script>
<![endif]-->

<style type="text/css">

body {
	font-family: Arial, Helvetica, sans-serif;
	background: rgb(213,206,166); /* Old browsers */
background: -moz-linear-gradient(top, rgba(213,206,166,1) 33%, rgba(201,193,144,1) 47%, rgba(183,173,112,1) 64%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(33%,rgba(213,206,166,1)), color-stop(47%,rgba(201,193,144,1)), color-stop(64%,rgba(183,173,112,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* IE10+ */
background: linear-gradient(to bottom, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d5cea6', endColorstr='#b7ad70',GradientType=0 ); /* IE6-9 */
}
	color:#8B0000;
	width: 940px;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
	padding-top: 20px;
	padding-right: 0px;
	padding-bottom: 20px;
	padding-left: 0px;
}

h1 {
	font-size: 40px;
	margin-bottom:10px;
	margin-top:5px;
	margin-left:50px;
	margin-right:20px;
	font-family: '3DumbRegular',Arial, Helvetica, sans-serif;
	color:#000066;
}

</style>

</head>
<body>

</form>
</body>
</html>