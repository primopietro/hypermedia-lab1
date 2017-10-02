<?php
$data = array();

if(isset($_GET['files']))
{
	$error = false;
	$files = array();
	
	//$uploaddir = $_SERVER ["DOCUMENT_ROOT"] . '/hypermedia-lab1/Lab1/images/services/';
	$uploaddir ='../images/services/';
	foreach($_FILES as $file)
	{
		if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir .$file['name'];
		}
		else
		{
			$error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}