<?php
$config = array(
	'folderPath'	=>'D:\xampp\htdocs\check\5000000',
	'startNumber'	=>500,
	'endNumber'		=>599,
	'totalRequired'	=>1000,
	'trailingZero'	=>'0000'
);


$files = scandir($config['folderPath']);

$total_found 	= count($files)-2;
$data = array(
	'folder'		=>$config['folderPath'],
	'total_missing'	=>$config['totalRequired'] - $total_found,
	'total_found'	=>$total_found,
);

echo "<pre>";

if (count($files)>2){
	while($config['startNumber']<=$config['endNumber']) {
		$file = $config['folderPath'] .DIRECTORY_SEPARATOR. $config['startNumber'] .$config['trailingZero']. '.log';
		if(file_exists($file)){
			echo "<a target='_blank' href=\"list.php?filename={$config['startNumber']}{$config['trailingZero']}\">{$config['startNumber']}{$config['trailingZero']}.log</a><br/>";
		}else{
			echo $config['startNumber'].$config['trailingZero'].'.log<br/>';
		}
		$config['startNumber']++;
	}
}else{
	echo "No files!";
}
var_dump($data);
echo "</pre>";
?>
</pre>