<?php 
Class Url 
{
	public $page = "signin";
    public $class ="signin";
	public function __construct()
	{
		$url = $this->splitURL();
       
 		if(file_exists("../app/controller/".ucfirst($url[0]) .".php"))
 		{
 			$this->page = ucfirst($url[0]);
 			
 		}
        
        $href= "controller"."\\" .$this->page;
 		$this->class= new $href();
	} 
	public function splitURL()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : "signin";
		return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));
	}
}