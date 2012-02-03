<?php
abstract class database
	{
	
	}
class mysql extends database
	{
	function __construct()
		{
		$this->conn=mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD);
		mysql_select_db(DB_BASE,$this->conn);
		mysql_query("SET NAMES utf8");
		}
	function __destruct()
		{
		mysql_close($this->conn);
		}
	function select_all($tablename,$desc=false)
		{
		$sql='SELECT * FROM '.$tablename.' ORDER BY id';
		if($desc!==false)
			{
			$sql.=' DESC';
			}
		$result=mysql_query($sql);
	    while($row=mysql_fetch_assoc($result))
			{
			$returnarray[]=$row;
			}
		return $returnarray;
		}
	function select($tablename,array$filddata)
		{
		if(count($filddata)==1)
			{
			$sql='SELECT * FROM '.$tablename." WHERE ".key($filddata)."='".$filddata[key($filddata)]."' ORDER BY id";
			}
		else
			{
			for($i=1;$i<=count($filddata);$i++)
				{
				list($key,$value)=each($filddata);
				if($i<=1)
					{
					$sql='SELECT * FROM '.$tablename." WHERE ".$key."='".$value."'";
					}
				else
					{
					$sql.=" AND ".$key."='".$value."' ORDER BY id";
					}
				}
			}
		$result=mysql_query($sql);
	    while($row=mysql_fetch_assoc($result))
			{
			$returnarray[]=$row;
			}
		return $returnarray;
		}
	function iselect($tablename,$innerj,array $on,array$where)
		{
		$sql="SELECT DISTINCT * FROM ".$tablename."";
		$sql.=" INNER JOIN ".$innerj;
		$sql.=" ON (".$on[0]."=".$on[1].")";
		$sql.=" WHERE ".$where[0]."='".$where[1]."'";
		$result=mysql_query($sql);
	    while($row=mysql_fetch_assoc($result))
			{
			$returnarray[]=$row;
			}
		return $returnarray;
		}
	function update($tablename,array$filddata,$id)
		{
		$sql='UPDATE '.$tablename." SET ";
		foreach($filddata as $fildkey=>$fildvalue)
			{
			$sql.=$fildkey."='".$filddata[$fildkey]."',";
			}
		$sql=substr_replace($sql,'',-1,1);
		$sql.=" WHERE id='".$id."'";
		$result=mysql_query($sql);
		return $result;
		}
	function delete($tablename,array$filddata)
		{
		$sql='DELETE FROM '.$tablename." WHERE ";
		foreach($filddata as $fildkey=>$fildvalue)
			{
			$sql.=$fildkey."='".$filddata[$fildkey]."' AND ";
			}
		$sql=substr_replace($sql,'',-5,5);
		$result=mysql_query($sql);
		return $result;
		}
	function insert($tablename,array$filddata)
		{
		$sql='INSERT INTO '.$tablename." (";
		$fields='';
		$values='';
		foreach($filddata as $fildkey=>$fildvalue)
			{
			$fields.=$fildkey.',';
			$values.="'".$fildvalue."',";
			}
		$fields=substr_replace($fields,')',-1,1);
		$values=substr_replace($values,')',-1,1);
		$sql.=$fields.'VALUES ('.$values.'';
		$result=mysql_query($sql);
		return $result;
		}
	function get_last_id()
		{
		return mysql_insert_id();
		}
	function get_max_id($tablename)
		{
		$sql="SELECT MAX(id) AS maxid
FROM `".$tablename."`";
		$res=mysql_query($sql);
		$maxid=mysql_fetch_assoc($res);
		return $maxid['maxid'];
		}
	}
?>