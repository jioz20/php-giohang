<?php 
class database
{
	var $pdo,$sqlquery,$statement;
	function __construct()
	{
		try{
			$opt=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			$this->pdo=new PDO('mysql:host=localhost;dbname=nhom18web','root','',$opt);
			$this->pdo->query('set names utf8');	
		}
		catch (PDOException $e)
		{
			exit('sever error').$e->getMessage();	
		}
	}
	function setquery($sqlquery)
	{
		$this->sqlquery=$sqlquery;	
	}
	function loadrow($param = array())
	{
		$this->statement=$this->pdo->prepare($this->sqlquery)	;
		$this->statement->execute($param);
		return $this->statement->fetch(PDO::FETCH_OBJ);
	} 
	function loadrows($param=array())
	{
		$this->statement=$this->pdo->prepare($this->sqlquery);
		$this->statement->execute($param);
		return $this->statement->fetchAll(PDO::FETCH_OBJ);	
	}
	function thucthi($param = array())
	{
		$this->statement=$this->pdo->prepare($this->sqlquery);
		return  $this->statement->execute($param);
		
	}
	function disconnect()
	{
			$this->pdo=NULL;
			$this->sqlquery='';
			$this->statement=NULL;
	}
}
?>