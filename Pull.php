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
			//http://front-desk.ca/directories/dist/Pull.php?cmd=create&folder=test3&url=https://github.com/uplight/dirs.git
			
			$folder= getcwd().'/'.$_GET['folder'];
			$folder= $_GET['folder'];
			
			if(file_exists($folder)){
				$_SESSION['folder'] = $folder;
				 echo 'exists ';
			}else {				
				$url = $_GET['url'];
				set_time_limit (300);
				$cmd = "git clone $url $folder";
					$res=shell_exec($cmd);
				$_SESSION['folder'] = $folder;
				echo 'created: '.$res;				
			}		
						
			break;			
			case 'pull';
			//echo 'process:  '.shell_exec("git pull 2>&1");
			//exit();

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
			$cmd = "cd $dir && git pull 2>&1";
			$res = shell_exec($cmd);
			 echo 'process:  '.$res;
			break;			
				
			case 'fetch':
			$dir=  $_GET['folder'];			
			//$cmd = "cd $dir && git pull 2>&1; echo $?";
			$cmd = "cd $dir && git pull";
			
			 $res = shell_exec($cmd);
			 
			  echo 'process:  '.$res;
			break;
			default: echo '?????????????';
			
		}
		
	}
}else {
	
	$_SESSION['stamp'] = time();
	echo 'one more time';
}




?>
