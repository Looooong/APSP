
<meta charset = "utf-8">

<?php
error_reporting(E_ALL & ~ E_NOTICE);  
	//$table = $_POST['table'];
$data = array();

function add_person( $idSTT, $name, $en , $vi ,$ch , $level,$code)
{
	global $data;
	$data[]=array('idSTT'=>$idSTT,'name'=>$name,'en'=>$en,'vi'=>$vi,'ch'=>$ch,'level'=>$level,'code'=>$code);
}
	
if( $_FILES['file']['tmp_name'])
{
 $dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
 $rows = $dom->getElementsByTagName('Row');
 $first_row = true;
 foreach ($rows as $row)
 {
   if( !$first_row)
   {
     $idSTT = "";
     $name = "";
     $en = "";
	 $vi = "";
     $ch = "";
     $level = "";
	$code = ""	;
	
     $index = 1;
     $cells = $row->getElementsByTagName( 'Cell' );
     foreach( $cells as $cell )
     {
       $ind = $cell->getAttribute( 'Index' );
       if ( $ind != null ) $index = $ind;

       if ( $index == 1 ) $idSTT = $cell->nodeValue;
       if ( $index == 2 ) $name = $cell->nodeValue;
       if ( $index == 3 ) $en = $cell->nodeValue;
       if ( $index == 4 ) $vi = $cell->nodeValue;
       if ( $index == 5 ) $ch = $cell->nodeValue;
       if ( $index == 6 ) $level = $cell->nodeValue;
       if ( $index == 7 ) $code = $cell->nodeValue;
	   $index += 1;
     }
	 
    add_person( $idSTT, $name, $en, $vi, $ch, $level, $code);
   
   }

   $first_row = false;
 }
}
?>

<?php
$url_get= $_SERVER["HTTP_REFERER"];
echo $url_get;
	 foreach($data as $row)
	 {
			//luu y : du lieu 1 dong trong file xml neu rong o 1 o^ nao do, thi se khong import dong do vao db
			require_once('../inc/database.class.php');
			require_once('../inc/config.php');				
			
			//neu tieude trong file excel rỗng thì chèn vào database 1 khoảng trắng(tùy ý),tuong tu voi tacgia
		    $a1 =$row['idSTT'];
			if($a1=='') $a1='0';
			
 			$a2 =$row['name'];
			if($a2=='') $a2=' ';
			
			$a3 =$row['en'];
			if($a3=='') $a3='';
			
			$a4 =$row['vi'];
			if($a4=='') $a4=' ';
			
 			$a5 =$row['ch'];
			if($a5=='') $a5=' ';
			
			$a6 =$row['level'];
			if($a6=='') $a6=0;
			
			$a7 =$row['code'];
			if($a7=='') $a7='';
			$query = "Insert into menus(idSTT,name,en,vi,ch,level,code) values ($a1,N'$a2','$a3',N'$a4','$a5',$a6,'$a7')";
			$db->querySql($query);
			//echo $query;exit;
			//echo '<script type = "text/javascript">window.location.href = "index.php"<script>';
		header("location: ../index.php");

			}
		//print_r($data);
		?>
		