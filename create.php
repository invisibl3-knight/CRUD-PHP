<?php 
include 'inc/header.php'; 
include 'inc/config.php'; 
include 'inc/Database.php'; 
?>


<?php
$db = new Database();

if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
	
	if($name == "" || $email =="" || $skill ==""){
		$error = "Field must not be empty !!";
	}
	else{
		$query  = "INSERT INTO tbl_user(name,email,skill) VALUES('$name','$email','$skill' ) ";
		$create = $db->create($query);
	}
}

?>
<?php
if (isset($error)){
	echo "<span style='color:green'>".$error."</span>";
}
?>
<form action="create.php" method="POST">
<table class="tblone">

<tr>
	<td>Name</td>
	<td><input type="text" name="name" placeholder="Please Enter Name" /></td>
</tr>
<tr>
	<td>E-mail</td>
	<td><input type="text" name="email" placeholder="Please Enter E-mail" /></td>
</tr>
<tr>
	<td>Skill</td>
	<td><input type="text" name="skill" placeholder="Please Enter Skill" /></td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="submit" name="submit" value="Submit" />
		<input type="reset" value="Cencel" />
	</td>
</tr>

</table>
</form>
<a href="index.php">Go Back</a>
 
<?php include 'inc/footer.php'; ?>