<?PHP

session_start();

if ($_SESSION['username'])
	echo "Computer Science, ".$_SESSION['username']."!<br><a href='search.php'>Search</a>|<a href='logout.php'>Logout</a>";
else
	die("You must be logged in!");

?>

<html>
<head>
<title>IT Engineer</title>

<!--[if lt IE 9]>
<script src="html5.js"></script>
<![endif]-->

<style type="text/css">

body {
	font-family: Arial, Helvetica, sans-serif;
	font-size:18px;
	//background-color: #FFE4C4 ;
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

<h1>Job Description</h1>
<hr>
Computer scientists, also called computer and information scientists, can work for government agencies and private software publishers, engineering firms or academic institutions. Businesses and government agencies usually employ these scientists to develop new products or solve computing problems. Computer scientists employed by academic institutions are typically involved in more theoretical explorations of computing issues, often using experimentation and modeling in their research.

</body>
</html>
