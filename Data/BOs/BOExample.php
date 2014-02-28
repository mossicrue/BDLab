<?php
	// To create a specific BO replace EntityName with the name of the Entity that you need
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row

	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);

	/*
	*********************************************************************************************************
    *	CLASS BOEntityName																			 	*
	*		This class extends BOBase. Can read the data from the Database passed and return an array of	*
	*		EntityName object. Is also possible insert, delete or do other work writing the right function*
	*********************************************************************************************************
	*/

	/* INCLUDE BOBASE, ENTITYBASE AND EntityName ENTITIY */
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/BOs/BOBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/Entities/EntityBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/Entities/EntityName.php";

	class BOEntityName extends BOBase
	{
		/* CONSTRUCTOR */
		// Call BOBase construct to create a BOEntityName with the passed arguments
		// Notice: if an arguments is not required pass NULL or an empty string
		public function __construct ($host = NULL, $user = NULL, $password = NULL, $dbName = NULL)
		{
			parent::__construct($host, $user, $password, $dbName);
		}


		/* MAKE METHOD */
		// This method allow to you to create an object of EntityName or EntityNameWithJoinEntity
		// or EntityWithJoinEntityWithJoinEntity and so on to save the result of a Join
		// I suggest to create a Entity for a specific View and don't write 'make' function with
		// 3 or more entity to have a clear result and a easy remember JoinEntity class

		// makeEntityName: Return an object of type EntityName
		public function makeEntityName($row)
		{
			// Replace var1, var2 ecc with the name of the Entity's properties
			// Delete also the unusued vars for a more efficent object
			$EntityName = new EntityName();
			$EntityName->var1 = $row['var1'];
			$EntityName->var2 = $row['var2'];
			$EntityName->var3 = $row['var3'];
			$EntityName->var4 = $row['var4'];
			$EntityName->var5 = $row['var5'];
			$EntityName->var6 = $row['var6'];
			return $EntityName;
		}

		// makeEntityNameWithJoinEntity
		public function makeEntityNameWithJoinEntity($row)
		{
			// TODO: Controllare spezzamento array e passaggio di variabili, al massimo si fa for
			$EntityNameWithJoinEntity = new EntityNameWithJoinEntity();
			$EntityNameWithJoinEntity->var1 = $row['var1'];
			$EntityNameWithJoinEntity->var2 = $row['var2'];
			$EntityNameWithJoinEntity->var3 = $row['var3'];
			$EntityNameWithJoinEntity->var4 = $row['var4'];
			$EntityNameWithJoinEntity->var5 = $row['var5'];
			$EntityNameWithJoinEntity->var6 = $row['var6'];
			$EntityNameWithJoinEntity->varA = $row['varA'];
			$EntityNameWithJoinEntity->varB = $row['varB'];
			$EntityNameWithJoinEntity->varC = $row['varC'];
			$EntityNameWithJoinEntity->varD = $row['varD'];
			return $EntityNameWithJoinEntity;
		}

		/* METHODS */

		// getAll: select all the record of EntityName table and return an array of object with type EntityName
		public function getAll()
		{
			$EntityNameList;
			$EntityName = new EntityName();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_EntityName_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_EntityName_GetAll");
			$i = 0;
			foreach($result as $element)
			{
				$EntityName = $this->makeEntityName($element);
				$EntityNameList[$i] = $EntityName;
				$i++;
			}
			return $EntityNameList;
		}

		// getAllFromArgument: select all the record of EntityName with the passed argument equals at the one of all record
		// You can change the argument or add it using getAllFromArgument1AndArgument2OrArgument3 for a more clear function's name
		public function getAllFromArgument($argument)
		{
			$EntityNameList;
			$arguments = func_get_args();
			$EntityName = new EntityName();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_EntityName_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_EntityName_GetAllFromArgument");
			$i = 0;
			foreach($result as $element)
			{
				$EntityName = $this->makeEntityName($element);
				$EntityNameList[$i] = $EntityName;
				$i++;
			}
			return $EntityNameList;
		}

		// getAllWithJoinEntity: select all the record of EntityName joined with JoinEntity table and return an array of EntityNameWithEntityJoin object
		public function getAllWithJoinEntity()
		{
			$EntityNameWithJoinEntityList;
			$EntityNameWithJoinEntity = new EntityNameWithJoinEntity();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_BOEntityName_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_EntityName_GetAllWithJoinEntity");
			$i = 0;
			foreach($result as $element)
			{
				$EntityNameWithJoinEntity = $this->makeEntityName($element);
				$EntityNameWithJoinEntityList[$i] = $EntityNameWithJoinEntity;
				$i++;
			}
			return $EntityNameList;
		}

		// insertEntityName: insert a record in the EntityName table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a EntityName object 'cause this class are
		// implemented for a clear reading of result, EntityName should not be created without this function
		// if there is a serial primary key you can not pass it, if the varX accept NULL value and you want to insert NULL value pass NULL
		public function insertEntityName($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $var5 = NULL, $var6 = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_EntityName_InsertEntityName", $arguments);
		}

		// insertEntityName: insert a record in the EntityName table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a EntityName object 'cause this class are
		// implemented for a clear reading of result, EntityName should not be created without this function
		// if there is a serial primary key you can not pass it, if the varX accept NULL value and you want to insert NULL value pass NULL
		public function insertEntityNameWithJoinEntity($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_EntityName_InsertEntityNameWithJoinEntity", $arguments);
		}

		// updateEntityName: insert a record in the EntityName table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a EntityName object 'cause this class are
		// implemented for a clear reading of result, EntityName should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON UPDATE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete EntityName
		public function updateEntityName($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $var5 = NULL, $var6 = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_EntityName_UpdateEntityName", $arguments);
		}

		// updateEntityName: insert a record in the EntityName table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a EntityName object 'cause this class are
		// implemented for a clear reading of result, EntityName should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON UPDATE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete EntityName
		//		   If you are using NO ACTION I suggest to don't implements this function and to simply delete it
		public function updateEntityNameWithJoinEntity($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_EntityName_UpdateEntityName", $arguments);
		}

		// deleteEntityName: insert a record in the EntityName table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a EntityName object 'cause this class are
		// implemented for a clear reading of result, EntityName should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON DELETE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete EntityName
		public function deleteEntityName($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $var5 = NULL, $var6 = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_EntityName_DeleteEntityName", $arguments);
		}

		// deleteEntityNameWithJoinEnity: insert a record in the EntityName table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a EntityName object 'cause this class are
		// implemented for a clear reading of result, EntityName should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON DELETE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete EntityName
		//		   If you are using NO ACTION I suggest to don't implements this function and to simply delete it
		public function deleteEntityName($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_EntityName_DeleteEntityName", $arguments);
		}

		// you can implement other function, like ones that don't return an EntityName object,
		// e.g. if I have to implements the function that return me the sum of the Var2 in EntityName table you can implements a function like this
		public function getSumOfVar1()
		{
			$result = $this->readDataFromStoredProcedure("p_EntityName_GetSumOfVar1");
			// NOTICE: remember to create an Alias for the sum in the stored procedure!
			return $result['sum'];
		}
	}
?>