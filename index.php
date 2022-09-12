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
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
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
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
				<a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
			</td>
        </tr>
    <?php } ?>
</table>
    <form method= "post">
       <div>
            <label>name</label>
            <input type="text" name = "name" value = "">
       </div>
       <div>
             <label>address</label>
             <input type="text" name = "address" value = "">
       </div>

       <div>
          <input type="submit" name = "save" value = "save">
       </div>
    </form>
</body>
</html>