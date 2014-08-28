<?php

interface DBInterface
{
	public function select($table,$columns);
	public function insert($table,$columns);
	public function update($table,$columns,$where);
	public function delete($table,$columns,$where);
	public function select_by_id($table,$columns,$where);

}