<?php session_start(); ?>
<?php if (isset($_POST['submit'])): ?>
	<?php include 'koneksi.php'; ?>
	<?php $username = $_POST['username']; $password = md5($_POST['password']); ?>
	<?php $sql = mysqli_query($conn, "select * from login where username='$username' and password='$password' ") ?>
	<?php $count = mysqli_num_rows($sql); ?>
	<?php $data= mysqli_fetch_assoc($sql); ?>
	<?php if ($count == 1): ?>
		<?php $_SESSION['username'] = $_POST['username']; ?>

		//<?php $_SESSION['level']=$data['level']; ?>
		

		<?php header('Location: monitoring.php') ?>
		<?php else: ?>
			<script type="text/javascript">alert('Username dan Password tidak cocok');</script>
			<?php header('Location: login.php'); ?>
	<?php endif ?>
<?php endif ?>