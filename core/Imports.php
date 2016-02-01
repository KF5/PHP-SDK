<?php
require_once 'core/apiRequire.php';


class Imports extends ClientAbstract{
	
	/**
	 * 导入工单
	 * @param array $data
	 * @throws MissingParametersException
	 * @throws ResponseException
	 * @return mixed
	 */
	public function tickets($data = ''){
		$url = 'imports/tickets';
		$this->validatePara('array', $data,'data',__METHOD__);
		$data = array('ticket'=>$data);
		$response = Http::send($this->client, $url,$data,'POST');
		return ($this->validateResponse($response , __METHOD__));	
	}
}