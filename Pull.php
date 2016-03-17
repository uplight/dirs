<?
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_SESSION['stamp'])){
	if(time() - $_SESSION['stamp']<5) die('OH');
	else {		
		$_SESSION['stamp'] = time();
		$dir = getcwd();
		
		switch($_GET['cmd']){
			case 'create':
			http://front-desk.ca/directories/dist/Pull.php?cmd=create&folder=test
			
			$folder= $_GET['folder'];
			if(file_exists($folder)){
				$_SESSION['folder'] = $folder;
				 echo 'exists ';
			}else if(@mkdir($folder, 0755)){
				$_SESSION['folder'] = $folder;
				echo 'success';
			}else echo 'error creating folder '.$folder;			
			
						
			break;
			case 'clone':
			//http://front-desk.ca/directories/dist/Pull.php?cmd=clone&url=https://github.com/vladvaldtitov/dir_test.git
			
			$url = $_GET['url'];
			set_time_limit (300);
			$dest= $_SESSION['folder'];
			$src = $url;
			$cmd = "git clone -l  $src $dest 2>&1";	
			echo 'process:  '.shell_exec($cmd);
			break;	
			
			case 'pull';
			echo 'process:  '.shell_exec("git pull 2>&1");
			exit();

			if(!isset( $_GET['folder']) || !file_exists($_GET['folder'])){
				
				$out =new stdClass();
				$out->folders = scandir('./');
				$out->msg='specify: folder=?';
				header('Content-Type: application/json');
				echo json_encode($out);
				exit();
			}
			//http://front-desk.ca/directories/dist/Pull.php?cmd=pull&folder=test		
			$dir=  $_GET['folder'];
			//$cmd = "cd $dir && git pull 2>&1";
			 echo 'process:  '.shell_exec($cmd);
			break;	
			case 'fetch':
			$dir=  $_GET['folder'];
			//$cmd = "cd $dir && git fetch 2>&1";
			 echo 'process:  '.exec($cmd);
			break;
			default: echo '?????????????';
			
		}
		
	}
}else {
	
	$_SESSION['stamp'] = time();
	echo 'one more time';
}




?>
