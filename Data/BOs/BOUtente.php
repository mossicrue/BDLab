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
	include_once $_SERVER['DOCUMENT_ROOT']."/BDLAB/TRUNK/Data/BOs/BOBase.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/BDLAB/TRUNK/Data/Entities/EntityBase.php";
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
		// This method allow to you to create an object of Utente or UtenteWithOptions
		// or EntityWithOptionsWithOptions and so on to save the result of a Join
		// I suggest to create a Entity for a specific View and don't write 'make' function with
		// 3 or more entity to have a clear result and a easy remember Options class

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

		// makeUtenteWithOptions
		public function makeUtenteWithOptions($row)
		{
			$UtenteWithOptions = new UtenteWithOptions();
			$UtenteWithOptions->idUtente 	  = $row['id_utente'];
			$UtenteWithOptions->cf 			  = $row['c_f'];
			$UtenteWithOptions->nome 		  = $row['nome'];
			$UtenteWithOptions->cognome 	  = $row['cognome'];
			$UtenteWithOptions->email 		  = $row['email'];
			$UtenteWithOptions->indirizzo 	  = $row['indirizzo'];
			$UtenteWithOptions->piva 		  = $row['p_iva'];
			$UtenteWithOptions->password 	  = $row['password'];
			$UtenteWithOptions->idLingua 	  = $row['id_lingua'];
			$UtenteWithOptions->l_descrizione = $row['lingue.descrizione'];
			$UtenteWithOptions->l_codice 	  = $row['lingue.codice'];
			$UtenteWithOptions->idValuta  	  = $row['id_valuta'];
			$UtenteWithOptions->v_codice 	  = $row['valuta.codice'];
			$UtenteWithOptions->v_descrizione = $row['valuta.descrizione'];
			$UtenteWithOptions->v_tassoCambio = $row['valuta.tassoCambio'];
			$UtenteWithOptions->v_codiceHTML  = $row['valuta.codiceHTML'];
			$UtenteWithOptions->v_codiceFA 	  = $row['valuta.codiceFA'];
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
		public function getAllFromId($argument)
		{
			$UtenteList;
			$arguments = func_get_args();
			$Utente = new Utente();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_Utente_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_Utente_GetAllFromId", $arguments);
			$i = 0;
			foreach($result as $element)
			{
				$Utente = $this->makeUtente($element);
				$UtenteList[$i] = $Utente;
				$i++;
			}
			return $UtenteList;
		}

		// getAllWithOptions: select all the record of Utente joined with Options table and return an array of UtenteWithEntityJoin object
		public function getAllWithOptions()
		{
			$UtenteWithOptionsList;
			$UtenteWithOptions = new UtenteWithOptions();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_BOUtente_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_Utente_GetAllWithOptions");
			$i = 0;
			foreach($result as $element)
			{
				$UtenteWithOptions = $this->makeUtenteWithOptions($element);
				$UtenteWithOptionsList[$i] = $UtenteWithOptions;
				$i++;
			}
			return $UtenteWithOptionsList;
		}

		public function getAllWithOptionsFromId($argument)
		{
			$UtenteWithOptionsList;
			$arguments = func_get_args();
			$UtenteWithOptions = new UtenteWithOptions();
			// Replace the name of the stored procedure with the right one, here I suggest a type for the name
			// You can call the procedure with other name, I use p_BOUtente_NameOfFunction
			$result = $this->readDataFromStoredProcedure("p_Utente_GetAllWithOptionsFromId", $arguments);
			$i = 0;
			foreach($result as $element)
			{
				$UtenteWithOptions = $this->makeUtenteWithOptions($element);
				$UtenteWithOptionsList[$i] = $UtenteWithOptions;
				$i++;
			}
			return $UtenteWithOptionsList;
		}
		
		// insertUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if there is a serial primary key you can not pass it, if the varX accept NULL value and you want to insert NULL value pass NULL
		public function insertUtente($idUtente, $cf, $nome, $cognome, $email, $indirizzo, $piva = NULL, $password, $idLingua, $idValuta)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_InsertUtente", $arguments);
		}

		
		
		// insertUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if there is a serial primary key you can not pass it, if the varX accept NULL value and you want to insert NULL value pass NULL
		public function insertUtenteWithOptions($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_InsertUtenteWithOptions", $arguments);
		}

		// updateUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON UPDATE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in Options before delete Utente
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
		//		   if the value is setted to NO ACTION you have to delete all record in Options before delete Utente
		//		   If you are using NO ACTION I suggest to don't implements this function and to simply delete it
		public function updateUtenteWithOptions($var1 = NULL, $var2 = NULL, $var3 = NULL, $var4 = NULL, $varA = NULL, $varB = NULL, $varC = NULL)
		{
			$arguments = func_get_args();
			$this->callStoredProcedure("p_Utente_UpdateUtente", $arguments);
		}

		// deleteUtente: insert a record in the Utente table in the database
		// you can insert all the arguments you want, I suggest you to don't pass a Utente object 'cause this class are
		// implemented for a clear reading of result, Utente should not be created without this function
		// if the varX accept NULL value and you want to insert NULL value pass NULL
		// NOTICE: When you call this function if the ON DELETE property of FK is CASCADE all the record are deleted else
		//		   if the value is setted to NO ACTION you have to delete all record in Options before delete Utente
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
		//		   if the value is setted to NO ACTION you have to delete all record in Options before delete Utente
		//		   If you are using NO ACTION I suggest to don't implements this function and to simply delete it

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