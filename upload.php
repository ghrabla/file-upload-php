<?php
 	// Connection Config 
	$conn= mysqli_connect("localhost","root","","practice");
	
	if(!$conn){
		header("location: https://httpstat.us/404");
	}
	
	if(isset($_POST['insert'])){
		// if($_FILES['image']['tmp_name']!=null){
			$file=addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$sql= "INSERT INTO test values (null,'$file')";
			mysqli_query($conn,$sql);
			// 	echo '<script>alert("File Inserted successfully")</script>';
			// }else{
			// 	echo '<script>alert("Error in insertion")</script>';
			// }
	}	
		// }else{
		// 	echo '<script>alert("Please Select Image");</script>';
		// }
	// }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>


<div class="container" style="width: 500px">
	<form method="POST" class="justify-content-center " enctype="multipart/form-data">
		<h3 class="mt-4"> Insert Image</h3><br><br>
		<input type="file" name="image" accept="image/*" required id="image">
		<br><br>
		<input type="submit" name="insert" id="insert" class="btn btn-primary" value="insert" onclick="selected_image();">
	</form>

	<br><br>

	<table class="table table-bordered" width="60px">
		<tr>
			<th>Images from Database</th>
		</tr>
		<?php
			$sql="SELECT * FROM `test`";
			$result=mysqli_query($conn,$sql);
			while ($row=mysqli_fetch_assoc($result)) {
				echo '<tr>
				<td>
				<img src="data:image/jpeg;base64,'.base64_encode($row['Data']).'" style="width: 200px;">
				</td>
					</tr>';		
			}
		?>
	</table>

</div>


</body>
</html>