<?php
/**
 * 
 * @param string $class_name
 */
function __autoload($className) {
	
	$file = __DIR__.DIRECTORY_SEPARATOR.'classMap.php';
	if(!file_exists($file)) {
		file_put_contents($file, "<?php\nreturn array(\n\t// class map\n);");
		chmod($file, 0644);
	}
	
	$map = require $file;
	if(!isset($map[$className])) { // not in the map
		if($f = findClassFile($className)) { // file found
			$map[$className] = $f;
			updateMap($map, $file);
			include $map[$className];
		} else { // file not found
			// let CI determine what to do
		}
	} else {
		include $map[$className];
	}
}

function findClassFile($className) {
	$it = new RecursiveDirectoryIterator(APPPATH.'classes');
	foreach(new RecursiveIteratorIterator($it) as $file) {
		if(substr($file, -strlen('/'.$className.'.php')) == '/'.$className.'.php')
			return $file;
	}
	
	return false;
}

function updateMap($map, $file) {
	$_string = "<?php\nreturn array(\n\t// class map\n";
	foreach ($map as $key => $value) {
		$_string .= "\t'".$key."' => '".$value."',\n";
	}
	$_string .= ');';
	file_put_contents($file, $_string);
}