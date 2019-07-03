<?php
include_once('commoncontroller.php');

class defaultcontroller extends CommonController
{
	public function __construct()
	{
	}
	
	public function index()
	{
		$projects = array();
		if(is_dir("./data"))
		{
			$d = dir("./data");
			while (false !== ($entry = $d->read())) {
				if($entry=='.' || $entry=='..')
				{
					continue;
				}
				if(is_dir("./data/".$entry))
				{
					$projects[] = $entry;
				}
			}
			$d->close();
		}

		echo "项目列表：<br/>";
		foreach($projects as $k=>$v)
		{
			echo $v,"<br/>";
		}
	}

	public function hidepage()
	{
		header('Content-Type:text/plain;charset=UTF8');
		readfile("interface.json");
		return ;
	}

}
