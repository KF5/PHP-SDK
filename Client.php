<?php
require_once 'core/apiRequire.php';
class Client{
	
	protected  $subdomain;
	protected  $email;
	protected  $token;
	protected  $password;
	
	protected  $apiUrl;
	/**
	 * @var 工单（客服）类
	 */
	protected  $tickets;
	/**
	 * 
	 * @var 工单（普通用户）类
	 */
	protected  $requests;
	/**
	 *
	 * @var 工单自定义字段
	 */
	protected  $fields;
	/**
	 *
	 * @var 工单查看分类
	 */
	protected  $views;
	/**
	 * 
	 * @var 用户类
	 */
	protected  $users; 
	/**
	 * 
	 * @var 客服组类
	 */
	protected  $groups;
	/**
	 * @var 公司组织类
	 */
	protected  $organizations ; 
	/**
	 * 
	 * @var 附件类
	 */
	protected  $attachments ;
	/**
	 * 
	 * @var 文档分区类
	 */
	protected  $categories;
	/**
	 * 
	 * @var 文档分类
	 */
	protected  $forums;
	/**
	 * 
	 * @var 文档类
	 */
	protected  $posts;
	/**
	 * 
	 * @var 社区话题类
	 */
	protected  $topics;
	/**
	 * 
	 * @var 社区问题类
	 */
	protected  $questions;
	/**
	 * 
	 * @var 导入类
	 */
	protected  $imports ;
	/**
	 *
	 * @var 导出类
	 */
	protected  $exports ;
	protected  $apiVer = 'v2';
	protected  $debug;
	
	public function __construct($subdomain,$email){
		
		$this->subdomain = $subdomain; 
		$this->email     = $email;
		
		$this->tickets 		  = new Tickets($this);
		$this->requests 	  = new Requests($this);
		$this->users 		  = new Users($this);
		$this->fields 		  = new Fields($this);
		$this->views 		  = new Views($this); 
		$this->groups         = new Groups($this);	
		$this->organizations  = new Organizations($this);
		$this->categories = new Categories($this);
		$this->forums         = new Forums($this);
		$this->posts          = new Posts($this);
		$this->topics  		  = new Topics($this); 
		$this->questions      = new Questions($this);  
		$this->attachments    = new Attachments($this);
		$this->imports        = new Imports($this);
		$this->exports        = new Exports($this);
		$this->debug          = new Debug();
		if(stristr($this->subdomain,'kf5.com'))
			$this->apiUrl = 'http://'.$this->subdomain.'/api'.$this->apiVer.'/';
		else
			$this->apiUrl = 'http://'.$this->subdomain.'.kf5.com/api'.$this->apiVer.'/';
	}
	public function __call($name, $arguments) {
		if(isset($this->$name)) {
			//return ((isset($arguments[0])) && ($arguments[0] != null) ? $this->$name->setLastId($arguments[0]) : $this->$name);
			return $this->$name;
		}else{
			throw new CustomException("No method called $name available in ".__CLASS__);
		}
	}
	/**
	 * 设置验证的方式（token or password）
	 *
	 * @param string $method
	 * @param string $value
	 */
	public function setAuth($method, $value){
		switch($method) {
			case 'password':    
				 $this->password = $value;
				 $this->token    = '';
			break;
			case 'token':       
				 $this->password = '';
			   	 $this->token    = $value;
			break;
		}
	}
	public function validateToken(){
		return $this->token ? true:false;
	}
    /**
     * 返回当前的apiurl根路径
     *
     * @return string
     */
    public function getApiUrl() {
        return $this->apiUrl;
    }
    /**
     * 根据验证的方式不同，拼接参数
     *
     * @return string
     */
    public function getAuthText() {
    	return ($this->email.($this->password ? ':'.$this->password : '/token:'.$this->token));
    }
    /**
     * 存入返回数据的信息
     *
     * @param mixed $lastRequestHeaders
     * @param mixed $lastResponseCode
     * @param string $lastResponseHeaders
     */
    public function setDebug($lastRequestHeaders, $lastResponseCode, $lastResponseHeaders, $lastResponBody) {
    	$this->debug->lastRequestHeaders  = $lastRequestHeaders;
    	$this->debug->lastResponseCode    = $lastResponseCode;
    	$this->debug->lastResponseHeaders = $lastResponseHeaders;
    	$this->debug->lastResponseBody    = $lastResponBody;
    }
    /**
     * 取出返回数据的信息
     *
     * @return Debug
     */
    public function getDebug() {
    	return $this->debug;
    }    
}