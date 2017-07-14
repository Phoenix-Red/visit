<?php
//数据库操作的类库
	if (!defined('IN_cnly'))
	{
		die('Hacking attempt');
	}
	//开始创建数据库类
	class dbClass 
	{  
		private $username = "";//定义登陆数据库的名字
		private $password = "";//登陆数据库的密码
		private $database = "";//所要选择的数据库
		private $hostname = "";//mysql数据库的名字
		private $link_id = "";//连接数据库的变量
		private $result = "";//结果集赋给$result
		//利用构造方法给变量赋值
		function dbClass ($username,$password,$database,$hostname)
		{
			$this->username=$username;
			$this->password=$password;
			$this->database=$database;
			$this->hostname=$hostname;
		}
		//这个函数用于连接数据库
		function connect() 
		{ 
			$this->link_id = @mysql_connect($this->hostname,$this->username,$this->password) 
			or die("对不起，连接数据库失败");
			return $this->link_id;
		}
		function select ()
		{ //这个函数用于选择数据库
			@mysql_select_db ($this->database,$this->link_id);
		}
		function query ($sql){ //这个函数用于送出查询语句并返回结果，常用。
			@mysql_query ("SET NAMES 'utf8'"); 
			if ($this->result=@mysql_query($sql,$this->link_id))
			{ 
				return $this->result;
			}
			else 
			{
				echo "<br>SQL语句错误： <font color='red'>$sql</font><BR>错误信息： ".mysql_error()."<br>";
				return false;
			}
		}
		/*
		以下函数用于从结果取回数组，一般与 while()循环、$db->query($sql) 配合使用，例如：
		*/
		function getarray ($result)
		{
			return @mysql_fetch_array($result);
		}
		
		function getAll ($sql)
		{
			@mysql_query ("SET NAMES 'utf8'"); 
			if ($this->result=@mysql_query($sql))
			{ 
				$row = array();
				while ($res = @mysql_fetch_array($this->result))
				{
					array_push($row,$res);
				}
			}
			else 
			{
				//echo "<br>SQL语句错误： <font color='red'>$sql</font><BR>错误信息： ".mysql_error()."<br>";
				return false;
			}
			
			return $row;
		}
		/*
		以下函数返回符合查询条件的总行数，例如用于分页的计算等要用到，例如：
		*/
		function getcount($sql)
		{
			return @mysql_num_rows($this->query($sql)); 
		}
		//这个函数用于取得刚插入行的id
		function getid()
		{
			return @mysql_insert_id();
		}
	}
?>