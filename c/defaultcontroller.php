<?php
include_once('commoncontroller.php');

class defaultcontroller extends CommonController
{
	public function __construct()
	{
	}
	
	public function index()
	{
		echo "Hello, default controller!";
		phpinfo();
	}

	public function hidepage()
	{
		header('Content-Type:text/plain;charset=UTF8');
		readfile("interface.json");
		return ;
	}

}
