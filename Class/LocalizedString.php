<?php
	/*
	*********************************************************************************************************
    *	FUNCTION LOCALIZEDSTRING																			*
	*		This function has methods to translate a string in a specific language reading an XML source	*
	*********************************************************************************************************
	*/

	function LocalizedString($code, $language = NULL, $source = NULL)
	{
		$val = NULL;
		if(isset($code))
		{
			if(!isset($language))
			{
				$language = "DEF";
			}
			if(!isset($source))
			{
				$source = "Class/source.xml";
			}
			$content = simplexml_load_file($source);
			$temp = $content;
			foreach($content->code as $element)
			{
				if($element['id'] == $code)
				{
					foreach($element->lang as $lang)
					{
						if($lang['id'] == $language)
						{
							$val = $lang->value;
						}
					}
				}
			}
		}
		return $val;
	}
?>