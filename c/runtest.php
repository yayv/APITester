<?php
include_once('commoncontroller.php');

class runtest extends CommonController
{
	public function __construct()
	{
	}

	public function index()
	{
		parent::initDb(Core::getInstance()->getConfig('database'));
		$prj = $_GET['params2'];
	}
	
	private function getNext()
	{
		parent::initDb(Core::getInstance()->getConfig('database'));

		$prj = $_GET['params2'];
		
		// TODO: 1. 获取
		$todolist = $this->getModel("mproject")->getNextTODO($prj);

		// 
		print_r($todolist);

		return $todolist;
	}

	public function runOne($obj)
	{
		print_r($obj);
	}

	public function run()
	{
		echo "<pre>";
		echo 'start:<br/>';

		if(!isset($_GET['params2']))
		{
			echo "NEED PROJECT NAME!";
			return ;
		}

		$prj = $_GET['params2'];

		while($one = $this->getNext())
		{
			$ret = $this->runOne($one);
		}
		echo "end";

		return ;
	}

}



