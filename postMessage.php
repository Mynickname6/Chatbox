<?php


if(isset($_POST['pseudo']))
{
	$pseudo = htmlspecialchars(trim($_POST['pseudo']));
	$message = htmlspecialchars($_POST['message']);
	
	$message = str_replace(':)', img('smile'), $message);
	$message = str_replace(':(', img('sad'), $message);
	$message = str_replace(':p', img('tongue'), $message);
	$message = str_replace(';)', img('wink'), $message);
	$message = str_replace(':o', img('ohmy'), $message);
	$message = str_replace('o_o', img('blink'), $message);
	$message = str_replace('--\'', img('dry'), $message);
	$message = str_replace(':@', img('angry'), $message);
	$message = str_replace(':D', img('biggrin'), $message);
	$message = str_replace(':s', img('wacko'), $message);
	$message = str_replace('^^', img('happy'), $message);
	$message = str_replace(':$', img('wub'), $message);
	$message = str_replace('/!\\', img('excl'), $message);
	$message = str_replace(':sleep:', img('sleep'), $message);
	$message = str_replace(':ninja:', img('ph34r'), $message);

	
	$content = file_get_contents('content.html');
	$content .= '<b>'.$pseudo.'</b> : '.$message.'<br />';
	$file = fopen('content.html', 'r+');
	fputs($file, $content);
	fclose($file);
}

function img($name){
	return '<img alt="" src="img/'.$name.'.png" />';
}


