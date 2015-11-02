<?php
//Include a generic header
include 'inc/html/header.php';
include 'inc/functions.php';
include 'inc/setts.php';
// Create connection
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
// Check connection
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
<div class="container">
	<div class="page-header">
		<h1 style="text-align: center;">Add New Server</h1>
	</div>
	<form action="new.php" method="post">
		<div class="form-group">
			<label for="servername">Server Name</label>
			<input type="text" class="form-control" id="servername" name="servername" placeholder="servername">
		</div>
		<div class="form-group">
			<label for="ip">IP</label>
			<input type="text" class="form-control" id="ip" name="ip" placeholder="ip">
		</div>
		<div class="form-group">
			<label for="sshp">SSH Port</label>
			<input type="text" class="form-control" id="sshp" name="sshp" placeholder="<?php echo '22';?>">
		</div>
		<div class="form-group">
			<label for="fuser">FTP User</label>
			<input type="text" class="form-control" id="fuser" name="fuser" placeholder="fuser">
		</div>
		<div class="form-group">
			<label for="fpass">FTP Password</label>
			<input type="text" name="fpass" class="form-control" id="fpass" placeholder="fpass">
		</div>
		<div class="form-group">
			<label for="fserver">FTP server</label>
			<input type="text" name="fserver" class="form-control" id="fserver" placeholder="fserver">
		</div>
		<div class="form-group">
			<label for="pass">Root Password</label>
			<input type="text" class="form-control" id="pass" name="pass" placeholder="pass">
		</div>
		<p style="font-size: 11px; font-style: italic;">This is used to create the nessesary script and to setup an unprivileged user on remote with access using ssh-key from origin server</p>

		<input class="btn btn-default" type="submit">

	</form>
	<br />
	<div class="well">
		<p>Have you added the web servers ssh-key to the remote root account /root/.ssh/authorized_keys, if not please do so now! Also please check you can ssh as root the your server without the security check, you will need to access the ip not the servername
		Please ensure PermitRootLogin without-password is not set in sshd_config or else it will fail to login</p>
	</div>
</div>

<?php



	//Include a generic footer
	include 'inc/html/footer.php';
	
	
?>