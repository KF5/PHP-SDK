<?php
	function SdkException($exception)
	{
		echo "<b>Exception:</b> " , $exception->getMessage(),"<br/>";
	}
	
	set_exception_handler('SdkException');