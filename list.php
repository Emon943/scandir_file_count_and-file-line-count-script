<?php
$config = array(
	'folderPath'	=>'D:\xampp\htdocs\check\5000000',
	'totalRequired'	=>10000,
);

$file = $_GET['filename'];
$file = $config['folderPath'].DIRECTORY_SEPARATOR.$file.'.log';

$file = file_get_contents($file,true);

$lines = preg_split('/\s+/', $file);

$total_found 	= count($lines);
$data = array(
	'folder'		=>$config['folderPath'],
	'total_missing'	=>$config['totalRequired'] - $total_found,
	'total_found'	=>$total_found,
);

foreach ($lines as $key => $line) {
	$line = explode('/', $line);
	if(isset($line[4])){
		$line = explode(',', $line[4]);
		$line = reset($line);
		echo $line.'<br/>';
	}else{
		echo "<span style='color:red'>Full</span><br/>";
	}
	
}
var_dump($data);
?>