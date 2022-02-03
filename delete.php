<?php 

	include 'model.php';
	$model = new Model();
	$id = $_REQUEST['id'];
	$delete = $model->delete($id);

	if ($delete) {
		echo "<script>alert('Uspesno izbrisana predstava!');</script>";
		echo "<script>window.location.href = 'predstave.php';</script>";
	}

 ?>