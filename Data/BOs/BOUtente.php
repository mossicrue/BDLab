<?php
	// To create a specific BO replace Utente with the name of the Entity that you need
	// In Notepad++ type CTRL+H to replace the string and then delete this starter row

	// This are error reporting settings, if you have finished to create this class comment it
	ini_set('error_reporting', E_ALL);
	ini_set("display_errors", 1);

	/*
	*********************************************************************************************************
    *	CLASS BOUtente																			 	*
	*		This class extends BOBase. Can read the data from the Database passed and return an array of	*
	*		Utente object. Is also possible insert, delete or do other work writing the right function*
	*********************************************************************************************************
	*/

	/* INCLUDE BOBASE, ENTITYBASE AND Utente ENTITIY */
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/BOs/BOBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/Entities/EntityBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BD/Data/Entities/Utente.php";

	class BOUtente extends BOBase
	{
		/* CONSTRUCTOR */
		// Call BOBase construct to create a BOUtente with the passed arguments
		// Notice: if an arguments is not required pass NULL or an empty string
		public function __construct ($user = NULL, $password = NULL, $host = NULL, $dbName = NULL)
		{
			parent::__construct($host, $user, $password, $dbName);
		}


		/* MAKE METHOD */
		// This method allow to you to create an object of Utente or UtenteWithJoinEntity
		// or EntityWithJoinEntityWithJoinEntity and so on to save the result of a Join
		// I suggest to create a Entity for a specific View and don't write 'make' function with
		// 3 or more entity to have a clear result and a easy remember JoinEntity class

		// makeUtente: Return an object of type Utente
		public function makeUtente($row)
		{
			// Replace var1, var2 ecc with the name of the Entity's properties
			// Delete also the unusued vars for a more efficent object
			$Utente = new Utente();
			$Utente->idUtente  = $row['id_utente'];
			$Utente->cf        = $row['c_f'];
			$Utente->nome      = $row['nome'];
			$Utente->cognome   = $row['cognome'];
			$Utente->email     = $row['email'];
			$Utente->indirizzo = $row['indirizzo'];
			$Utente->piva      = $row['p_iva'];
			$Utente->password  = $row['password'];
			$Utente->idLingua  = $row['id_lingua'];
			$Utente->idValuta  = $row['id_valuta'];
			
			return $Utente;
		}

		// makeUtenteWithJoinEntity
		public function makeUtenteWithOptions($row)
		{
			// TODO: Controllare spezzamento array e passaggio di variabili, al massimo si fa for
			$UtenteWithOptions = new UtenteWithOptions();
			$UtenteWithOptions->idUtente  = $row['id_utente'];
			$UtenteWithOptions->cf        = $row['c_f'];
			$UtenteWithOptions->nome      = $row['nome'];
			$UtenteWithOptions->cognome   = $row['cognome'];
			$UtenteWithOptions->email     = $row['email'];
			$UtenteWithOptions->indirizzo = $row['indirizzo'];
			$UtenteWithOptions->piva      = $row['p_iva'];
			$UtenteWithOptions->password  = $row['password'];
			$UtenteWithOptions->idLingua  = $row['id_lingua'];
			$UtenteWithOptions->idValuta  = $row['id_valuta'];
			// TODO: FINIRE
			return $UtenteWithOptions;
		}

		/* METHODS */

		// getAll: select all the record of Utente table and return an array of object with type Utente
		public function getAll()
		{
			$UtenteList;
			$Utente = new Utente();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_Utente_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_Utente_GetAll");
			$i = 0;
			foreach($result as $element)
			{
				$Utente = $this->makeUtente($element);
				$UtenteList[$i] = $Utente;
				$i++;
			}
			return $UtenteList;
		}

		// getAllFromArgument: select all the record of Utente with the passed argument equals at the one of all record
		// You can change the argument or add it using getAllFromArgument1AndArgument2OrArgument3 for a more clear function's name
		public function getAllFromArgument($argument)
		{
			$UtenteList;
			$arguments = func_get_args();
			$Utente = new Utente();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_Utente_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_Utente_GetAllFromArgument");
			$i = 0;
			foreach($result as $element)
			{
				$Utente = $this->makeUtente($element);
				$UtenteList[$i] = $Utente;
				$i++;
			}
			return $UtenteList;
		}

		// getAllWithJoinEntity: select all the record of Utente joined with JoinEntity table and return an array of UtenteWithEntityJoin object
		public function getAllWithJoinEntity()
		{
			$UtenteWithJoinEntityList;
			$UtenteWithJoinEntity = new UtenteWithJoinEntity();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_BOUtente_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_Utente_GetAllWithJoinEntity");
			$i = 0;
			foreach($result as $element)
			{
				$UtenteWithJoinEntity = $this->makeUtente($element);
				$UtenteWithJoinEntityList[$i] = $UtenteWithJoinEntity;
				$i++;
			}
			return $UtenteList;
		}

		// insertUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if there is a serial primary key you can not pass it, if the varX accept NULL value and you want to insert NULL value pass NULL
		public function insertUtente($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $var5 = NULL, $var6 = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_InsertUtente", $arguments);
		}

		// insertUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if there is a serial primary key you can not pass it, if the varX accept NULL value and you want to insert NULL value pass NULL
		public function insertUtenteWithJoinEntity($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_InsertUtenteWithJoinEntity", $arguments);
		}

		// updateUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON UPDATE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete Utente
		public function updateUtente($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $var5 = NULL, $var6 = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_UpdateUtente", $arguments);
		}

		// updateUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON UPDATE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete Utente
		//		   If you are using NO ACTION I suggest to don't implements this function and to simply delete it
		public function updateUtenteWithJoinEntity($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_UpdateUtente", $arguments);
		}

		// deleteUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON DELETE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete Utente
		public function deleteUtente($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $var5 = NULL, $var6 = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_DeleteUtente", $arguments);
		}

		// deleteUtenteWithJoinEnity: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON DELETE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in JoinEntity before delete Utente
		//		   If you are using NO ACTION I suggest to don't implements this function and to simply delete it
		public function deleteUtente($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_DeleteUtente", $arguments);
		}

		// you can implement other function, like ones that don't return an Utente object,
		// e.g. if I have to implements the function that return me the sum of the Var2 in Utente table you can implements a function like this
		public function getSumOfVar1()
		{
			$result = $this->readDataFromStoredProcedure("p_Utente_GetSumOfVar1");
			// NOTICE: remember to create an Alias for the sum in the stored procedure!
			return $result['sum'];
		}
	}
?>