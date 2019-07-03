<?php 

// manager model, for enterprise manager
class mproject extends model
{
	public $errmsg;
	public $sql;



	public function createProject($projectname)
	{
		$prj = $projectname;

		$prepare_sql = "
		DROP TABLE IF EXISTS `API_$prj`;
		DROP TABLE IF EXISTS `CONF_$prj`;
		DROP TABLE IF EXISTS `LOG_$prj`;
		DROP TABLE IF EXISTS `TESTCASE_$prj`;
		DROP TABLE IF EXISTS `TODO_$prj`;
		";

		$this->_db->query($prepare_sql);

		$create_sql = "
CREATE TABLE `API_$prj` (
  `id` int(11) NOT NULL,
  `apiname` int(11) NOT NULL,
  `apiuri` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `CONF_$prj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` char(64) NOT NULL,
  `value` text NOT NULL,
  `environment` char(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `LOG_$prj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `testcaseid` int(11) NOT NULL,
  `request` text NOT NULL,
  `response` text NOT NULL,
  `result` char(255) NOT NULL,
  `runtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `TESTCASE_$prj` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `APIid` int(11) NOT NULL,
 `testcasename` varchar(64) NOT NULL,
 `request_header` text NOT NULL,
 `request_body` text NOT NULL,
 `response_header` text NOT NULL,
 `response_body` text NOT NULL,
 `note` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `TODO_$prj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api` int(11) NOT NULL,
  `testcase` int(11) NOT NULL,
  `due` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
		";

		$this->_db->query($create_sql);

		return ture;
	}

	public function createTestQuest()
	{

	}
	
  public function getNextTODO($projectname)
  {
    $sql = "select * from TODO_$projectname limit 1";

    $ret = $this->_db->fetch_one_assoc($sql);

    return $ret;
  }
}
