<?php
	// ini_set('error_reporting', E_ALL);
	// ini_set("display_errors", 1);

	/*
	*********************************************************************************************************
    *	CLASS BOAttore																					 	*
	*		This class extends BOBase. Can read the data from the Database passed and return an array of	*
	*		Attore object. Is also possible insert, delete or do other work writing the right function  	*
	*********************************************************************************************************
	*/
	
	/* INCLUDE BOBASE, ENTITY BASE AND ATTORE ENTITIY */
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/BOs/BOBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/Entities/EntityBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/Entities/Attore.php";

	class BOAttore extends BOBase
	{
		/* CONSTRUCTOR */
		// Call BOBase construct to create a BOAttore with the passed arguments
		// Notice: if an arguments is not required pass NULL or an empty string
		public function __construct ($host = NULL, $user = NULL, $password = NULL, $dbName = NULL)
		{
			parent::__construct($host, $user, $password, $dbName);
		}

		
		/* MAKE METHOD */
		
		// makeAttore: Return an object of type Attore
		public function makeAttore($row)
		{
			$attore = new Attore();
			$attore->codice = $row['codice'];
			$attore->nome = $row['nome'];
			$attore->cognome = $row['cognome'];
			$attore->naz = $row['naz'];
			$attore->BOD = $row['BOD'];
			$attore->VAL = $row['VAL'];
			return $attore;
		}
		
		public function takeAttore($attore)
		{
			return get_object_vars($attore);
		}
		
		/* METHODS */
		
		// getAll: select all the record of Attore table and return an array of object with type Attore  
		public function getAll()
		{
			$attori;
			$attore = new Attore();
			$result = $this->readDataFromStoredProcedure("p_Attore_GetAll");
			$i = 0;
			foreach($result as $element)
			{
				$attore = $this->makeAttore($element);
				$attori[$i] = $attore;
				$i++;
			}
			return $attori;
		}

		// insertAttore: insert a record in the Attori table in the database
		public function insertAttore($codice, $nome = NULL, $cognome = NULL, $naz = NULL, $BOD = NULL, $VAL = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Attore_InsertAttore", $arguments);
		}

	}
?>