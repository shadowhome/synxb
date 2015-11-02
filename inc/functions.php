<?php

function getOS($pass=false){
	$ip = $_REQUEST['ip'];
	$sshp = $_REQUEST['sshp'];
	if(!isset($_REQUEST['sshp'])) {
		$sshp = '22';
	}
	$lsbresult1   = array();

	$methods = array('hostkey', 'ssh-rsa');
	if(isset($pass) && $pass){
		$methods = array();
	}

	$connection = ssh2_connect($ip, $sshp, $methods);
	if(!($connection)){
		throw new Exception("fail: unable to establish connection, please Check IP or if server is on and connected");
	}
	$pass_success = false;

	if($methods){
		$rsa_pub = realpath($_SERVER['HOME'].'/.ssh/id_rsa.pub');
		$rsa = realpath($_SERVER['HOME'].'/.ssh/id_rsa');
		$pass_success = ssh2_auth_pubkey_file($connection, 'sysad',$rsa_pub, $rsa);
	}else{
		$pass_success = ssh2_auth_password($connection, 'root', $pass);
	}

	if(!($pass_success)){
		throw new Exception("fail: unable to establish connection\nPlease Check your password");
	}
	$cmd="lsb_release -as";
	$stream = ssh2_exec($connection, $cmd);
	$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
	stream_set_blocking($errorStream, true);
	stream_set_blocking($stream, true);
	$lsbresult1 = stream_get_contents($stream);


	stream_set_blocking($errorStream, false);
	stream_set_blocking($stream, false);
	flush();
	fclose($errorStream);
	fclose($stream);
	fclose($rsa_pub);
	fclose($rsa);
	unset($connection);

	print_r($lsbresult1);
	$lsbresult = explode("\n", $lsbresult1);
	if(!empty($lsbresult)) {
		$OS        = $lsbresult[0];
		$version  = $lsbresult[3];
		$releasever = $lsbresult[2];


	}

	else {
		echo "No values present";
		die();
	}

	ssh2_exec($connection, 'exit');
	fclose($stream);
	fclose($errorStream);
	flush();
	unset($connection);
	fclose($connection);
	return array($OS, $version, $releasever);
}


function sshiconn($cmd, $pass, $ip, $sshp=22){

	$ip = $_REQUEST['ip'];
	$pass = $_REQUEST['pass'];
	$sshp = $_REQUEST['sshp'];
	if(!isset($_REQUEST['sshp'])) {
		$sshp = '22';
	}

	$connection = ssh2_connect($ip, $sshp);
	if(!($connection)){
		throw new Exception("fail: unable to establish connection\nPlease IP or if server is on and connected");
	}
	$pass_success = ssh2_auth_password($connection, 'root', $pass);
	if(!($pass_success)){
		throw new Exception("fail: unable to establish connection\nPlease Check your password");
	}
	$stream = ssh2_exec($connection, $cmd);
	$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
	stream_set_blocking($errorStream, true);
	stream_set_blocking($stream, true);
	print_r($cmd);


	$output = stream_get_contents($stream);
	fclose($stream);
	fclose($errorStream);
	ssh2_exec($connection, 'exit');
	unset($connection);
	return $output;

}