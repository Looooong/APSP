
<meta charset = "utf-8">

<?php
error_reporting(E_ALL & ~ E_NOTICE);  
	//$table = $_POST['table'];
$data = array();

function add_person( $keyLang, $name, $en , $vi ,$ch )
{
	global $data;
	$data[]=array('keyLang'=>$keyLang,'en'=>$en,'vi'=>$vi,'ch'=>$ch);
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
     $keyLang = "";
     $en = "";
	 $vi = "";
     $ch = "";

	
     $index = 1;
     $cells = $row->getElementsByTagName( 'Cell' );
     foreach( $cells as $cell )
     {
       $ind = $cell->getAttribute( 'Index' );
       if ( $ind != null ) $index = $ind;

       if ( $index == 1 ) $keyLang = $cell->nodeValue;
       if ( $index == 2 ) $en = $cell->nodeValue;
       if ( $index == 3 ) $vi = $cell->nodeValue;
       if ( $index == 4 ) $ch = $cell->nodeValue;
	   $index += 1;
     }
	 
    add_person( $keyLang, $en, $vi, $ch);
   
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
		    $a1 =$row['keyLang'];
			if($a1=='') $a1='';
		
			$a2 =$row['en'];
			if($a2=='') $a2='';
			
			$a3 =$row['vi'];
			if($a3=='') $a3=' ';
			
 			$a4 =$row['ch'];
			if($a4=='') $a4=' ';
			
			
		$query=("Insert into menus(keyLang,en,vi,ch) values (N'$a1',N'$a2','$a3',N'$a4')");	
					$db->querySql($query);
			//echo $query;exit;
			
					
		echo '<script type = "text/javascript">window.location.href = "index.php"</script>';
			}
			
		//header("location:index.php");

		//print_r($data);
		?>