<!DOCTYPE html>
<html ng-app="myApp">
<head>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-route.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="one.js"></script>
<script src="js/dirPagination.js"></script>


<style>
table, th, td {
	border: 1px solid black;
}

.header {
	background-color: #81CFE0;
	width: 800px;
	height: 100px;
	text-align: center;
}

.left {
	background-color: #F1A9A0;
	width: 80px;
	height: 500px;
	text-align: left;
}

.right {
	background-color: #DCC6E0;
	width: 500px;
	height: 500px;
}
</style>

</head>
<body>
<?php
$connection = mysql_connect ( "localhost", "root", "root" ); // Establishing Connection with Server
$db = mysql_select_db ( "practice", $connection ); // Selecting Database from Server
if (isset ( $_POST ['submit'] )) { // Fetching variables of the form which travels in URL
	$id = $_POST ['id'];
	$name = $_POST ['name'];
	$profession = $_POST ['profession'];
	$language = $_POST ['language'];
	if ($name != '' || $id != '' || $profession != '' || $language != '') {
		$query = mysql_query ( "insert into blogs(id, name, profession, language) values ('$id', '$name', '$profession', '$language')" );
		echo "Data Inserted successfully...!!";
	} else {
		echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
	}
}
mysql_close ( $connection );
?>
<div class="table-responsive" class="container">
		<table class="table">
			<tr>
				<td class="header" colspan="2"><h3>angular routing</h3></td>
			</tr>
			<tr>
				<td class="left"><a href="#/home" class="btn btn-info" role="button">Home</a><br>
				<br> <a href="#/languages" class="btn btn-info" role="button">Languages</a><br>
				<br> <a href="#/students" class="btn btn-info" role="button">Show
						people</a>
						</td>
				<td class="right">
				    
				    <br>
					<div ng-view>
					 
					</div>
				</td>
			</tr>
			<tr>
				<form class="form-inline" action="" method="post">
					<b>ID:</b><input class="input" name="id" type="text" value=""
						placeholder="Enter id"> <b>NAME:</b><input class="input"
						name="name" type="text" value="" placeholder="Enter name"> <b>PROFESSION:</b><input
						class="input" name="profession" type="text" value=""
						placeholder="Enter profession"> <b>LANGUAGE:</b><input
						class="input" name="language" type="text" value=""
						placeholder="Enter language"> <input class="submit" name="submit"
						type="submit" class="btn btn-primary" value="Insert">

				</form>
			</tr>
		</table>
		<center>
		<dir-pagination-controls
      					 max-size="5"
      					 direction-links="true"
       					boundary-links="true" >
       </dir-pagination-controls>
		</center>
	</div>
</body>
</html>
