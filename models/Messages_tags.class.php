<?php
class Messages_tags extends Tables
	{
	function __construct($db)
		{
		parent::__construct($db,strtolower(get_class($this)));
		}
	function iget($innerj,array $on,array$where)
		{
		return $this->db->iselect($this->path,$innerj,$on,$where);
		}
	}
?>