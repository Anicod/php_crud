<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        table{
            background-color:grey;
            font-size:25px;
            font-weight:bold;
           width:30%;
        }
        input{
            width:300px;
            padding: 10px;
            border-radius:10px;
        }
        label{
            font-size:25px; 
            font-weight:bold;
        }
        button{
            width:100px;
            background-color:blue;
            font-size:30px;
            padding: 5px;
            font-weight:bold;
        }
        .del{
            color:red;
        }
    </style>
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
            <td>
				<a href="index.php?del=<?php echo $row['id']; ?>" class="del">Delete</a>
			</td>
        </tr>
    <?php } ?>
</table>
    <form method= "post">
        <div>
        <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
        </div>
       <div>
            <label>name</label>
            <input type="text" name = "name" value = "<?php echo $name;?>">
       </div><br>
       <div>
             <label>address</label>
             <input type="text" name = "address" value = "<?php echo $address;?> "><br>
       </div><br>

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