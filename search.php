<?PHP

session_start();

if ($_SESSION['username'])
	echo "Welcome, ".$_SESSION['username']."!<br><a href='logout.php'>Logout</a>";
else
	die("You must be logged in!");
	
?>

<html>
<head>
<title>Search for Job</title>

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
bg{
	background: rgb(213,206,166); /* Old browsers */
background: -moz-linear-gradient(top, rgba(213,206,166,1) 33%, rgba(201,193,144,1) 47%, rgba(183,173,112,1) 64%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(33%,rgba(213,206,166,1)), color-stop(47%,rgba(201,193,144,1)), color-stop(64%,rgba(183,173,112,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* IE10+ */
background: linear-gradient(to bottom, rgba(213,206,166,1) 33%,rgba(201,193,144,1) 47%,rgba(183,173,112,1) 64%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d5cea6', endColorstr='#b7ad70',GradientType=0 ); /* IE6-9 */
}
	font-size:20px;
		
}

</style>

</head>
<body>
<form action='search.php' method='POST'>
<center>

<h1>Search for Job</h1>

<select name="filter3">
<option value="">Start Date</option>
<option value="2014">2014</option>
<option value="2012">2012</option>
</select>

<select name="filter">
<option value="">City</option>
<option value="pittsburgh">Pittsburgh</option>
<option value="san">San Diego</option>
</select>

<select name="filter2">
<option value="">Country</option>
<option value="usa">USA</option>
</select>

<select name="filter4">
<option value="">Job Type</option>
<option value="Engineer">Engineer</option>
</select>

<input type='text' size='20' name='search'>

<input type='submit' name='submit' value='Search' ></br></br></br>
<hr>
</center>
</form>
</body>
</html>

<?PHP

$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "table";

    mysql_connect("$db_host","$db_username","$db_pass") or die("Couldn't connect");
	mysql_select_db("$db_name") or die("couldn't find db");
$output = '';
$outcity = '';
$outcountry = '';
$outsearch = '';
$outjob = '';
$outstart = '';
$outdate = '';
//collect

if(isset($_POST['filter'],$_POST['filter2'],$_POST['filter3'],$_POST['filter4'],$_POST['search'])){
	$searchq = $_POST['filter'];
	
	$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	
	
	$query = mysql_query("SELECT * FROM search WHERE city LIKE '%$searchq%' OR job_title LIKE '%$searchq%' OR job_type LIKE '%$searchq%' OR country LIKE '%$searchq%' OR keywords LIKE '%$searchq%' OR job_number LIKE '%$searchq%'") or die("Couldn't search!");
	$count = mysql_num_rows($query);
	if($count == 0){
		echo "There was no search results!";
	}
	if($_POST['search'] == 'engineer'){
		while($row = mysql_fetch_array($query)){
			$id = $row['id'];
			$job_title = $row['job_title'];
			$job_type = $row['job_type'];
			$keywords = $row['keywords'];
			$job_number = $row['job_number'];
							
			$outsearch .='<div> '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'__'.$keywords.' </div>'; 
			
		}
			echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg>__<bg>Keywords</bg></b></br>";
			echo"<a href='1011.php'>$outsearch</a>";
	}
		
		if($_POST['filter3'] == '2014'){
			
			while($row = mysql_fetch_array ($query)){
					$id = $row['id'];
					$job_number = $row['job_number'];
					$job_title = $row['job_title'];
					$job_type = $row['job_type'];
					$start_date= $row['start_date'];
					$outstart .='<div> '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'__'.$start_date.' </div>'; 
				}
					echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg>__<bg>Start Date</bg></b></br>";
					echo"<a href='1011.php'>$outstart</a>";
				}
					else if($_POST['filter3'] == '2012'){
						while($row = mysql_fetch_array ($query)){
					$id = $row['id'];
					$job_number = $row['job_number'];
					$job_title = $row['job_title'];
					$job_type = $row['job_type'];
					$start_date= $row['start_date'];
					$outdate .='<div> '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'__'.$start_date.' </div>'; 
				}
					echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg>__<bg>Start Date</bg></b></br>";
					echo"<a href='1012.php'>$outdate</a>";
			}
	
		if($_POST['filter'] == 'pittsburgh'){
						
				while($row = mysql_fetch_array ($query)){
					$id = $row['id'];
					$job_number = $row['job_number'];
					$job_title = $row['job_title'];
					$job_type = $row['job_type'];
					$city = $row['city'];
					$output .='<div> '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'__'.$city.' </div>'; 
				}
					echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg>__<bg>City</bg></b></br>";
					echo"<a href='1011.php'>$output</a>";
				}
					else if($_POST['filter'] == 'san'){
						while($row = mysql_fetch_array ($query)){
					$id = $row['id'];
					$job_number = $row['job_number'];
					$job_title = $row['job_title'];
					$job_type = $row['job_type'];
					$city = $row['city'];
					$outcity .='<div> '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'__'.$city.' </div>'; 
				}
					echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg>__<bg>City</bg></b></br>";
					echo"<a href='1012.php'>$outcity</a>";
			}
			if($_POST['filter2'] == 'usa'){
						
				while($row = mysql_fetch_array ($query)){
					$id = $row['id'];
					$job_number = $row['job_number'];
					$job_title = $row['job_title'];
					$job_type = $row['job_type'];
					$country = $row['country'];
					$outcountry .='<div > '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'__'.$country.'</div>'; 
				}
					
					echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg>__<bg>Country</bg></b></br>";
					echo"<a href='1011.php'>$outcountry</a>";
						
				}	
					
			if($_POST['filter4'] == 'Engineer'){
						
				while($row = mysql_fetch_array ($query)){
					$id = $row['id'];
					$job_number = $row['job_number'];
					$job_title = $row['job_title'];
					$job_type = $row['job_type'];
					$outjob .='<div > '.$id.'__'.$job_number.'__'.$job_title.'__'.$job_type.'</div>'; 
				}
					
					echo "<br><b><bg>id</bg>__<bg>Job Num</bg>__<bg>Job Title</bg>__<bg>Job Type</bg></b></br>";
					echo"<a href='1011.php'>$outjob</a>";
						
				}
					
	}
		//else{
			//echo "There was no search results!";
		//}


?>