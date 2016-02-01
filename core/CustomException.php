<?php
class CustomException extends Exception {

	/**
	 * @param string     $message
	 * @param int        $code
	 * @param \Exception $previous
	 */
    public function __construct($message, $code = 0) {
        parent::__construct($message, $code);
    }

}