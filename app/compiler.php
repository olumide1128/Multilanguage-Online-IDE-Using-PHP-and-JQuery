<?php  
	
	require 'config.php';

	//Retrive data from Ajax
	$language = strtolower($_POST['language']);
	$code = $_POST['code'];

	$random = substr(md5(mt_rand()), 0, 7);

	$filePath = "temp/" . $random . "." . $language;
	$programFile = fopen($filePath, "w");

	fwrite($programFile, $code);
	fclose($programFile);


	//Check for Compilers and compile
	if($language == 'php'){
		if(empty($php_exe)){
			echo "No PHP Interpreter Detected!";
		}else{		
			$output = shell_exec("$php_exe $filePath 2>&1");
			unlink($filePath); //delete tmp file
			echo $output;
		}
	}

	else if($language == "py"){
		if(empty($py_exe)){
			echo "No Python Interpreter Detected!";
		}else{		
			$output = shell_exec("$py_exe $filePath 2>&1");
			unlink($filePath); //delete tmp file
			echo $output;
		}
	}

	else if($language == "c"){

		if(empty($c_exe)){
			echo "No c Compiler Detected!";
		}else{		
			$output = shell_exec("$c_exe $filePath 2>&1");
			unlink($filePath); //delete tmp file
			echo $output;
		}
		
	}

	else if($language == "cpp"){
		if(empty($cpp_exe)){
			echo "No c++ Compiler Detected!";
		}else{
			$output = shell_exec("$cpp_exe $filePath 2>&1");
			unlink($filePath); //delete tmp file
			echo $output;
		}

	}

	else if($language == "js"){
		echo "Error - No Implementation yet!";
	}
?>