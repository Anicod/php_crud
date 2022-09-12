<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
<?php  include('php_code.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if ($n = mysqli_fetch_array($record) ) {
			$name = $n['name'];
			$address = $n['address'];
		}
	}
?>
<?php $results = mysqli_query($db, "SELECT * FROM info");?>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['name'] ;?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
			</td>
        </tr>
    <?php } ?>
</table>
    <form method= "post">
        <div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
       <div>
            <label>name</label>
            <input type="text" name = "name" value = "<?php echo $name;?>">
       </div>
       <div>
             <label>address</label>
             <input type="text" name = "address" value = "<?php echo $address;?> ">
       </div>

       <div>
       <?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
    <?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
    <?php endif ?>
       </div>
    </form>
</body>
</html>