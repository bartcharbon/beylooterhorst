
<?php
	$tekstOutput= "";
	$morseOutput= "";
	$natoOutput= "";
	
	if(isset($_POST['submitTekst'])){
	
		$tekst= trim($_POST['tekst']);
		
		$tekstArray = str_split($tekst);
		
		translate($tekstArray, "tekst"); 
	
	}
	
	if(isset($_POST['submitMorse'])){
	
		$morse= trim($_POST['morse']);
		
		$morseArray = preg_split('/[ ]/', $morse);
		
		translate($morseArray , "morse");
	
	}
	
	if(isset($_POST['submitNATO'])){
	
		$nato= trim($_POST['nato']);
		
		$natoArray = preg_split('/ /', $nato);
		
		translate($natoArray , "nato");
	
	}

	function translate($input, $inputType) 
	{ 
	global $tekstOutput;
			global $natoOutput;
			global $morseOutput;
		if($inputType == "tekst"){
			foreach ($input as &$arr) {
				$output = $output.$arr;
			}
			
			 $tekstOutput= $output;
			 $natoOutput= tekst2nato($input);
			 $morseOutput= tekst2morse($input);
		}
	
		else if($inputType == "nato"){
		foreach ($input as &$arr) {
				$output = $output.$arr." ";
			}

			$natoOutput= $output;
			$tekstOutput= nato2tekst($input);
			$morseOutput= tekst2morse(str_split($tekstOutput));
		}
	
		else if($inputType == "morse"){
		foreach ($input as &$arr) {
				$output = $output.$arr." ";
			}
			$morseOutput= $output;
			$tekstOutput= morse2tekst($input);
			$natoOutput= tekst2nato(str_split($tekstOutput));
		}
		else{	
			$tekstOutput= "-";
			$natoOutput= "-";
			$morseOutput= "-";
		
		}

	} 
	    function tekst2nato($input) 
	    { 
	   $nato  = array(
    "a" => "alfa",
    "b" => "bravo",
    "c" => "charlie",
    "d" => "delta",
    'e' => "echo",
    "f" => "foxtrot",
    "g" => "golf",
    "h" => "hotel",
    "i" => "india",
    "j" => "juiliet",
    "k" => "kilo",
    "l" => "lima",
    "m" => "mike",
    "n" => "november",
    "o" => "oscar",
    "p" => "papa",
    "q" => "quebec",
    "r" => "romeo",
    "s" => "sierra",
    "t" => "tango",
    "u" => "uniform",
    "v" => "victor",
    "w" => "whiskey",
    "x" => "xray",
    "y" => "yankee",
    "z" => "zulu",
    "1" => "one",
    "2" => "two",
    "3" => "three",
    "4" => "four",
    "5" => "five",
    "6" => "six",
    "7" => "seven",
    "8" => "eight",
    "9" => "nine",   
    "0" => "zero",
    " " => "/",
    "" => "",
    "/" => " ",
);
		    foreach ($input as &$arr) {				    
			    if(array_key_exists($arr, $nato)){
					$output = $output.$nato[$arr]." ";
				}else{
					$output = $output."[?]";
				}}
				return $output;	
	    
	    }
	    function tekst2morse($input) 
	    { 
	    $morse  = array(
    "a" => "*-",
    "b" => "-***",
    "c" => "-*-*",
    "d" => "-**",
    "e" => "*",
    "f" => "**-*",
    "g" => "--*",
    "h" => "****",
    "i" => "**",
    "j" => "*---",
    "k" => "-*-",
    "l" => "*-**",
    "m" => "--",
    "n" => "-*",
    "o" => "---",
    "p" => "*--*",
    "q" => "--*-",
    "r" => "*-*",
    "s" => "***",
    "t" => "-",
    "u" => "**-",
    "v" => "***-",
    "w" => "*--",
    "x" => "-**-",
    "y" => "-*--",
    "z" => "--**",
    "0" => "-----",
    "1" => "*----",
    "2" => "**---",
    "3" => "***--",
    "4" => "****-",
    "5" => "*****",
    "6" => "-****",
    "7" => "--***",
    "8" => "---**",   
    "9" => "----*",
    " " => "/",
    "" => "",);
		    foreach ($input as &$arr) {				    
			    if(array_key_exists($arr, $morse)){
					$output = $output.$morse[$arr]." ";
				}else{
					$output = $output."[?]";
				}}
				return $output;	
	    
	    }
	    function nato2tekst($input) 
	    { 
	   $nato  = array(
    "alfa" => "a",
    "bravo" => "b",
    "charlie" => "c",
    "delta" => "d",
    "echo" => "e",
    "foxtrot" => "f",
    "golf" => "g",
    "hotel" => "h",
    "india" => "i",
    "juiliet" => "j",
    "kilo" => "k",
    "lima" => "l",
    "mike" => "m",
    "november" => "n",
    "oscar" => "o",
    "papa" => "p",
    "quebec" => "q",
    "romeo" => "r",
    "sierra" => "s",
    "tango" => "t",
    "uniform" => "u",
    "victor" => "v",
    "whiskey" => "w",
    "xray" => "x",
    "yankee" => "y",
    "zulu" => "0",
    "one" => "1",
    "two" => "2",
    "three" => "3",
    "four" => "4",
    "five" => "5",
    "six" => "6",
    "seven" => "7",
    "eight" => "8",
    "nine" => "9",   
    "zero" => "0",
    "/" => " ",
    " " => "",
);
		    foreach ($input as &$arr) {				    
			    if(array_key_exists($arr, $nato)){
					$output = $output.$nato[$arr];
				}else{
					$output = $output."[?]";
				}}
				return $output;	
	    
	    } 
	    function morse2tekst($input) 
	    { 
		   $morse  = array( "*-" => "a",
"-***" => "b",
"-*-*" => "c",
"-**" => "d",
"*" => "e",
"**-*" => "f",
"--*" => "g",
"****" => "h",
"**" => "i",
"*---" => "j",
"-*-" => "k",
"*-**" => "l",
"--" => "m",
"-*" => "n",
"---" => "o",
"*--*" => "p",
"--*-" => "q",
"*-*" => "r",
"***" => "s",
"-" => "t",
"**-" => "u",
"***-" => "v",
"*--" => "w",
"-**-" => "x",
"-*--" =>"y",
"--**" => "z",
"-----" => "0",
"*----" => "1",
"**---" => "2",
"***--" => "3",
"****-" => "4",
"*****" => "5",
"-****" => "6",
"--***" => "7",
"---**" => "8",
"----*" => "9",
"/" => " ",
" " => "",
"" => "",);
		    foreach ($input as &$arr) {				    
			    if(array_key_exists($arr, $morse)){
					$output = $output.$morse[$arr];
				}else{
					$output = $output."[?]";
				}}
				return $output;	
	    
	    }



?>

<html><head><link href="beyloo_oud.css" REL="stylesheet" TYPE="text/css"><link href="beyloo.css" REL="stylesheet" TYPE="text/css"></head>
<body>
<div style="width:1010px;">
	<div class="content-header-background">
		<div class="content-header">
			Vertaal Morse en NATO
		</div>
	</div>
	<div class="content-background">
		<div class="content">
			<form action="" method="post">
			
			tekst:<BR>
			<TEXTAREA Name="tekst" rows="10" cols="50"><?php echo  $tekstOutput;?></TEXTAREA><br>
			
			<input type="submit" name="submitTekst" value="vertaal" /><br>
			
			
			</form>
			<form method="post" action="">
			
			
			NATO: woorden scheiden door " / " ([spatie][slash][spatie])<br> 
			
			<TEXTAREA Name="nato" rows="10" cols="50"><?php echo $natoOutput;?></TEXTAREA><br>
			
			<input type="submit" name="submitNATO" value="vertaal" /><br>
			
			
			</form>
			<form method="post" action="">
			
			
			Morse: woorden scheiden door " / " ([spatie][slash][spatie])<BR>
			
			<TEXTAREA Name="morse" rows="10" cols="50"><?php echo $morseOutput;?> </TEXTAREA><br>
			
			<input type="submit" name="submitMorse" value="vertaal" />
			
			</form>
	   	</div>
&nbsp
	</div>
	<div class="content-footer-background"></div>
</div>
</body>
</html>

