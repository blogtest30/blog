<?php
class Tables
	{
	function __construct($db,$path)
		{
		$this->db=$db;
		$this->path=$path;
		}
	function get(array $fields)
		{
		return $this->db->select($this->path,$fields);
		}
	function get_all($desc=false,$field=null)
		{
		$result=$this->db->select_all($this->path,$desc);
		if($field!=null)
			{
			foreach($result as $k=>$v)
				{
				$return[]=$v[$field];
				}
			return $return;
			}
		else
			return $result;
		}
	function update(array $newdata,$id)
		{
		return $this->db->update($this->path,$newdata,$id);
		}
	function set(array $fields)
		{
		return $this->db->insert($this->path,$fields);
		}
	function delete(array $fields)
		{
		return $this->db->delete($this->path,$fields);
		}
	function max()
		{
		return $this->db->get_max_id($this->path);
		}
	}
?>