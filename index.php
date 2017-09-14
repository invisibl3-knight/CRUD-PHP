<?php 
include 'inc/header.php'; 
include 'inc/config.php'; 
include 'inc/Database.php'; 
?>


<?php
$db = new Database();
$query  = "SELECT * FROM tbl_user";
$read = $db->read($query);
?>

<?php
if (isset($_GET['msg'])){
	echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>
<table class="tblone">
<tr>
	<th width="10%">Serial</th>
	<th width="35%">Name</th>
	<th width="25%">E-mail</th>
	<th width="25%">Skill</th>
	<th width="25%">Action</th>
</tr>
<?php if($read){?>
<?php 
$i =1;
while($row = $read->fetch_assoc()){
	
?>
<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['skill'];?></td>
	<td><a href="update.php?id=<?php echo $row['id'];?>">edit</a></td>
</tr>
<?php } ?>
<?php } else {?>
<p>There is no data.</p>
<?php }?>
</table>
<a href="create.php">Create</a>
 
<?php include 'inc/footer.php'; ?>