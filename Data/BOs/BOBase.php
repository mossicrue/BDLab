<?php
	/*
	*****************************************************************************************************
    *	CLASS BOBase																					*
	*		This class had function to execute query and call stored procedure to read data or do other	*
	*		from the database. It can be extended in a specific BO class (eg BOFoo) that can return a	*
	*		single element or a list of Foo objects using the appropriate Make function					*
	*****************************************************************************************************
	*/
	
	class BOBase
	{
		/* PROPERTIES */
		private $host = "";
		private $user = "";
		private $password = "";
		private $dbName = "";
		private $dbConnection = NULL;

		/* CONSTRUCTOR */
		public function __construct ($host = NULL, $user = NULL, $password = NULL, $dbName = NULL)
		{
			if(isset($host))
			{
				$this->host = $host;
			}
			else
			{
				$this->host = "";
			}
			if(isset($user))
			{
				$this->user = $user;
			}
			else
			{
				$this->user = "";
			}
			if(isset($password))
			{
				$this->password = $password;
			}
			else
			{
				$this->password = "";
			}
			if(isset($dbName))
			{
				$this->dbName = $dbName;
			}
			else
			{
				$this->dbName = "";
			}
		}


		/* SETTER (BAU!) */
		public function setHost($host)
		{
			$this->host = $host;
		}

		public function setUser($user)
		{
			$this->user = $user;
		}

		public function setPassword($password)
		{
			$this->password = $password;
		}

		public function setDBName($dbName)
		{
			$this->dbName = $dbName;
		}


		/* GETTER */
		public function getHost()
		{
			return $this->host;
		}

		public function getUser()
		{
			return $this->user;
		}

		public function getPassword()
		{
			return $this->password;
		}

		public function getDBNAME()
		{
			return $this->dbName;
		}


		/* METHODS */
		protected function connection($newUser = NULL, $newHost = NULL, $newPassword = NULL)
		{
			if(!isset($this->dbConnection))
			{
				if(isset($newUser))
				{
					$this->user = $newUser;
				}
				if(isset($newHost))
				{
					$this->host = $newHost;
				}
				if(isset($newPassword))
				{
					$this->password = $newPassword;
				}
				$this->dbConnection = mysql_connect($this->host, $this->user, $this->password) or die ("Impossibile connettersi all'host - ".$this->host."\n\t".mysql_error($this->dbConnection));
				mysql_select_db($this->dbName, $this->dbConnection) or die ("Impossibile connettersi al database - ".$this->dbName."\n\t".mysql_error($this->dbConnection));
			}
		}

		protected function closeConnection()
		{
			if(isset($this->dbConnection))
			{
				mysql_close($this->dbConnection);
			}
		}

		protected function clearResult($result)
		{
			mysql_free_result($result);
		}

		protected function clearResultAndCloseConnection($result)
		{
			$this->clearResult($result);
			mysql_close($this->dbConnection);
		}

		protected function readDataFromStoredProcedure($storedProcedure, $args = NULL)
		{
			$this->connection();
			$query = "";
			$procedureArgs = "";
			if(isset($args))
			{
				$i = 0;
				$length = count($args);
				$argType = gettype($args[$i]);
				// le date verranno trattate come stringhe
				if($argType == "string")
				{
					$procedureArgs .= "'";
				}
				$procedureArgs .= $args[$i];
				if($argType == "string")
				{
					$procedureArgs .= "'";
				}
				for($i = 1; $i < $length; $i++)
				{
					$procedureArgs .= ", ";
					$argType = gettype($args[$i]);
					// le date verranno trattate come stringhe
					if($argType == "string")
					{
						$procedureArgs .= "'";
					}
					$procedureArgs .= $args[$i];
					if($argType == "string")
					{
						$procedureArgs .= "'";
					}
				}
			}
			$query .= "CALL `$storedProcedure` ($procedureArgs);";
			$res = mysql_query($query, $this->dbConnection);
			$vett = array();
			$i = 0;
			$numRes = mysql_affected_rows();
			if($numRes != 0)
			{
				while($row = mysql_fetch_array($res, MYSQL_ASSOC))
				{
					$vett[$i] = $row;
					$i++;
				}
				$this->clearResultAndCloseConnection($res);
			}
			else
			{
				$vett = NULL;
			}
			return $vett;
		}

		protected function callStoredProcedure($storedProcedure, $args = NULL)
		{
			$this->connection();
			$query = "";
			$procedureArgs = "";
			if(isset($args))
			{
				$i = 0;
				$length = count($args);
				$argType = gettype($args[$i]);
				// le date verranno trattate come stringhe
				if($argType == "string")
				{
					$procedureArgs .= "'";
				}
				$procedureArgs .= $args[$i];
				if($argType == "string")
				{
					$procedureArgs .= "'";
				}
				for($i = 1; $i < $length; $i++)
				{
					$procedureArgs .= ", ";
					$argType = gettype($args[$i]);
					// le date verranno trattate come stringhe
					if($argType == "string")
					{
						$procedureArgs .= "'";
					}
					$procedureArgs .= $args[$i];
					if($argType == "string")
					{
						$procedureArgs .= "'";
					}
				}
			}
			$query .= "CALL `$storedProcedure` ($procedureArgs);";
			echo $query;
			mysql_query($query, $this->dbConnection);
			$this->closeConnection();
		}

		protected function readDataFromQuery($query)
		{
			$this->connection();
			$res = mysql_query($query, $this->dbConnection);
			$vett = array();
			$i = 0;
			while($row = mysql_fetch_array($res, MYSQL_ASSOC))
			{
				$vett[$i] = $row;
				$i++;
			}
			$this->clearResultAndCloseConnection($res);
			return $vett;
		}

		protected function executeQuery($query)
		{
			$this->connection();
			$res = mysql_query($query, $this->dbConnection);
			$this->closeConnection();
		}
	}
?>