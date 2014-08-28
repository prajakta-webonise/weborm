<?php
require_once("Datasource/Registry.php");
require_once("Datasource/ActiveRecord.php");

class Model extends ActiveRecord
{

	public function save()
	{
		$db=$this->autoload_connection();
		$table=get_class($this);
		$columns=get_object_vars($this);
		if($db->insert($table,$columns))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function modify()
	{
		$db=$this->autoload_connection();
		$table=get_class($this);
		$columns=get_object_vars($this);
		$where= 'id = '.$columns["id"];
		if($db->update($table,$columns,$where))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function remove()
	{
		$db=$this->autoload_connection();
		$table=get_class($this);
		$columns=get_object_vars($this);
		$where= 'id = '.$columns["id"];
		if($db->delete($table,$columns,$where))
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function find()
	{
		$db=$this->autoload_connection();
		$table=get_class($this);
		$columns=get_object_vars($this);
		$result= $db->select($table,$columns);
		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}

	}
	public function find_by_id($where)
	{
		$db=$this->autoload_connection();
		$table=get_class($this);
		$columns=get_object_vars($this);
		return $result=$db->select_by_id($table,$columns,$where);
	}
}



?>