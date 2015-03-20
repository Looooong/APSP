<?php
	class database{
		public $_hostname;
		public $_user;
		public $_pass;
		public $_database;
		public $_connection;
		public $_resource;
		
		public function __construct($params){
			$this->_hostname = $params["hostname"];
			$this->_user 	 = $params["UID"];
			$this->_pass	 = $params["PWD"];
			$this->_database = $params["Database"];
			$this->_params	 = array('Database'=>$params["Database"],'UID'=>$params["UID"],'PWD'=>$params["PWD"], "CharacterSet"=>'UTF-8');
		}
	
		public function connect(){
			$this->_connection = sqlsrv_connect($this->_hostname,$this->_params) or die ('Không thể kết nối đến CSDL');
		}
		
		public function querySql($query){
			$result = sqlsrv_query($this->_connection,$query,array(), array( "Scrollable" => 'static' ));
			if($result == FALSE){
				return FALSE;
			}else{
				$this->_resource = $result;
			}
		}

		public function fetchArray(){
			$result =  sqlsrv_fetch_array($this->_resource,SQLSRV_FETCH_ASSOC);
			return $result;
		}
		
		public function fetchToArray(){
			$row;
			$result = array();
			while ($row =  sqlsrv_fetch_array($this->_resource,SQLSRV_FETCH_ASSOC)) {
				$result[] = $row;
			};
			return $result;
		}
		
		public function numrows(){
			return sqlsrv_num_rows($this->_resource);
		}
		
		public function closeConnect(){
			sqlsrv_close($this->_connection);
		}
		
		
	}
?>
