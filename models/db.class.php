<?php
class db{
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
	//khi chay lenh nay no bao loi ben trong sqlsrv_connect phai la 1 mang,1 kieu string
	//boi the phai dua no vao mang $this->_connection = sqlsrv_connect($this->_hostname,array($this->_user,$this->_pass) or die ('Không thể kết nối đến CSDL');
	// thi no bao k ket noi CSDL duoc
	//con neu chi chay $this->_connection = sqlsrv_connect($this->_hostname) or die ('Không thể kết nối đến CSDL'); thi no vo duoc,nhung thang sqlsrv nay no k co cau lenh select database(sqlsrv_seleect_db) nhu cua thang mysql_select_db va mssql_select_db boi the o khuc duoi phai lam sao hien tai mac dinh dang de la sqlsrv_query($this->_connection,$this->_database);
		$this->_connection = sqlsrv_connect($this->_hostname,$this->_params) or die ('Không thể kết nối đến CSDL');
		//$smst = sqlsrv_query($this->_connection,$this->_database);
		//câu lệnh cũ 
		//$this->_connection = mysql_connect("$this->_hostname","$this->_user","$this->_pass") or die ('Không thể kết nối đến CSDL');
		//mysql_select_db($this->_database,$this->_connection);
	}
	//sau khi giai quyet duoc van de o tren bang cach xoa di $this->_user va $this->_pass
	//thi buoc tiep theo no bao loi o public fuction query_Sql($query) sqlsrv_query() expects parameter 1 to be resource, string given in line 30 ; //sqlsrv_num_rows() expects parameter 1 to be resource, null given in line 85
	
	//hien tai chua su dung duoc cai db.class nay,chi su dung moi file config.php;
	// bang cach select truc tiep $query = "";
	//                            $result = sqlsrv_query($conn,$query);
	//							  while($row = sqlsrv_fetch_array($result)){ echo // }
	//edit lai cai file db.class de su dung nhu cũ bang $db->querySql($query);
	/*public function querySql($query){
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$result = sqlsrv_query($this->_connection,$query,array(),$options);
		if($result == FALSE){
			return FALSE;
		}else{
			$this->_resource = $result;
		}
		
	}*/
	public function querySql($query){
		$result = sqlsrv_query($this->_connection,$query,array(), array( "Scrollable" => 'static' ));
		if($result == FALSE){
			return FALSE;
		}else{
			$this->_resource = $result;
		}
		
	}
	public function fetchRow(){
		$result =  sqlsrv_fetch_row($this->_resource);
		return $result;
	}

	public function fetchArray(){
		$result =  sqlsrv_fetch_array($this->_resource,SQLSRV_FETCH_ASSOC);
		return $result;
	}
//	public function fetchAssocs(){
	//	$result = sqlsrv_fetch_array($this->_resource,$query);
		//return $result;
	//}
	
	
	/*	public function fetchAssocs(){
		$result = $this->_resource;
		$rows = array();
		if($result <> null){
		while($temp = sqlsrv_fetch_assoc($result,sqlsrv_fetch_assoc)){
			$rows[] = $temp;
		}
		}
		return $rows;
	}*/
	
	
	
//	public function fetchArray(){
	//	$result =  sqlsrv_fetch_array($this->_resource);
	//	return $result;
	//}
	
	/*public function hasrow(){
	$row = sqlsrv_fetch_array($this->_resource);
if($row)
{
    do{
        echo "loop";
    } while( $row = sqlsrv_fetch_array($this->_resource));
}
else
{
    print_r( sqlsrv_errors() );
}
	}*/
	//Set unicode
	//public function setUnicode(){
	//	return sqlsrv_query($this->_connection,"SET NAMES 'UTF8'");
	//}
	public function numrows(){
	return sqlsrv_num_rows($this->_resource);
	}
	
	//Đóng connect
	public function closeConnect(){
		sqlsrv_close($this->_connection);
	}
	
	
	
	
}


?>
