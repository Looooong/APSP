<?php 
include "inc/database.class.php";
require_once "inc/config.php";
session_start();
if($_GET['mod']=='addtb1'){
	$tabletb1 = $_SESSION['tab'];
		$arrt1 = $_POST['dttb1'];
		$keycol =  implode(",", array_map('mysql_real_escape_string',array_keys($arrt1)));
		$arr_1 = array_map('mysql_real_escape_string', $arrt1);
		$_str = "";
		foreach($arr_1 as $col){
			if(is_numeric($col)) $_str .= $col.",";
			else $_str .= "N'".$col."',";
		}
		$str = substr($_str,0,strlen($_str)-1);
			$query = "INSERT INTO $tabletb1(".$keycol.") VALUES ($str)";
			$db->querySql($query);		
}
if($_GET['mod']=='addrowphieu'){
$arr2 = $_POST['dataadd1'];
$reltab = $_SESSION['rel1'];
$reltab2 = $_SESSION['rel2'];
//$mkhang = $arr_2['mkhang'];
					
		$keyco =  implode(",", array_map('mysql_real_escape_string',array_keys($arr2)));
		$arr_2 = array_map('mysql_real_escape_string', $arr2);
	
		$_str2 = "";
		foreach($arr_2 as $col2){
			if(is_numeric($col2)) $_str2 .= $col2.",";
			elseif($col2 == "") $_str2 .= "'".$col2."',";
			else $_str2 .= "N'".$col2."',";
		}
		$strr = substr($_str2,0,strlen($_str2)-1);
			$query = "INSERT INTO $reltab(".$keyco.") VALUES ($strr)";
		
			$db->querySql($query);
			
				$query = "SELECT column_name
				FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
				WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
				AND table_name = '$reltab'";
				$db->querySql($query);
				$datainfo = $db->fetchArray();
				$datainfo = $datainfo['column_name'];
				
					$query = "SELECT IDENT_CURRENT('$reltab') as a ";
					$db->querySql($query);
					$arr = $db->fetchArray();
					$arr = $arr['a'];
					
						$arrt2 = $_POST['datatadd2'];
						foreach($arrt2 as $index => $data){
						$keyco_1 =  implode(",", array_map('mysql_real_escape_string',array_keys($data)));
						$arr_3 = array_map('mysql_real_escape_string', $data);
						$_str3 = "";
						foreach($arr_3 as $col3){
							if(is_numeric($col3)) $_str3 .= $col3.",";
							elseif($col3 == "") $_str3 .= "'".$col3."',";
							else $_str3 .= "N'".$col3."',";
							
						}
						$strr_1 = substr($_str3,0,strlen($_str3)-1);
						$query = "INSERT INTO $reltab2($datainfo,".$keyco_1.") 
						VALUES ( '$arr',$strr_1)";
						
						$db->querySql($query);
						}
						$now = date("Y-m-d",time());
						$mkhang = $arr2['mkhang'];
						foreach($arrt2 as $index =>$data){
							$valdata = $data['slhgui'];
							$tensp = $data['tensp'];
							$maso = $data['maso'];
							if($valdata !=0){
							$query = "INSERT INTO lxg($datainfo,mkhang,maso,tenhg,slgui,ngaygui) 
							VALUES('$arr','$mkhang','$maso',N'$tensp','$valdata','$now')";
							$db->querySql($query);
							}
					}	
}
 if($_GET['mod']=='edittb1'){
$tabletb1 = $_SESSION['tab'];
		$query = "SELECT column_name
		FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
		WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
		AND table_name = '$tabletb1'";
		$db->querySql($query);
		$primary = $db->fetchArray();
		$primary = $primary['column_name'];
		  foreach($_POST['edttb1'] as $data){
		   $query = "UPDATE $tabletb1 SET ";
		   $firstkey1 = true;
		   foreach($data as $key => $value){
   
				   if(!$firstkey1){
				   $query .= ", ";
				   }
					   else $firstkey1 = false;
					   if($primary != $key){
					   $str = (is_numeric($value)) ? $value : "N'".$value."'";
					   $query .= $key." = ".$str;
				   }
				   else $firstkey1 = true;
				};	   
					   $str1 = (is_numeric($data[$primary])) ? $data[$primary] : "'".$data[$primary]."'";
					   $query .= " WHERE " .$primary." = ".$str1;
					   $db->querySql($query);
					  
		   };
   /*foreach($_POST['edttb1'] as $data){
			foreach ($data as $key => $value) {
				$value = mysql_real_escape_string($value);
				$value = "'$value'";
				$updates[] = "$key = $value";
			  }	  
				  $ad = reset($data);
				  $keyid = array_search($ad,$data);
				  unset($updates[0]);	  
				  $implodeArray = implode(', ', $updates);
				  $query = sprintf("UPDATE %s SET %s WHERE %s='%s'", $tabletb1, $implodeArray, $keyid,$ad);
				  $db->querySql($query);	 
	}*/
} 

 if($_GET['mod']=='editphieu'){
 
 $reltab = $_SESSION['rel1'];
$reltab2 = $_SESSION['rel2'];
//print_r($_POST['datatb2']);EXIT;
		$query = "SELECT column_name
		FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
		WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
		AND table_name = '$reltab'";
		$db->querySql($query);
		$datainfo = $db->fetchArray();
		$datainfo = $datainfo['column_name'];
		   foreach($_POST['datatb1'] as $data){
		   $query = "UPDATE $reltab SET ";
		   $firstkey1 = true;
		   foreach($data as $key => $value){
   
				   if(!$firstkey1){
				   $query .= ", ";
				   }
					   else $firstkey1 = false;
					   if($datainfo != $key){
					   $str = (is_numeric($value)) ? $value : "N'".$value."'";
					   $query .= $key." = ".$str;
				   }
				   else $firstkey1 = true;
				};	   
					   $str1 = (is_numeric($data[$datainfo])) ? $data[$datainfo] : "'".$data[$datainfo]."'";
					   $query .= " WHERE " .$datainfo." = ".$str1;
					   $db->querySql($query);
					  // echo $query;exit;
		   };
	
				$query = "SELECT column_name
				FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
				WHERE OBJECTPROPERTY(OBJECT_ID(constraint_name), 'IsPrimaryKey') = 1
				AND table_name = '$reltab2'";
				$db->querySql($query);
				$primary = $db->fetchArray();
				$primary = $primary['column_name'];
				
					   foreach($_POST['datatb2'] as $dat){
					   $query = "UPDATE $reltab2 SET ";
					   $firstkey = true;
					   
								foreach($dat as $key => $value){
								   if(!$firstkey){
								   $query .= ", ";
								   }
									   else $firstkey = false;
									   if($primary != $key){
									   $str = (is_numeric($value)) ? $value : "N'".$value."'";
									   $query .= $key." = ".$str;
								   }
									   else $firstkey = true;
									};	   
										   $str = (is_numeric($dat[$primary])) ? $dat[$primary] : "'".$dat[$primary]."'";
										   $query .= " WHERE " .$primary." = ".$str;
										   
										   $db->querySql($query);
										  print_r($query);
						};
		}

?>
