<?php
$listbo = array();
$query = "SELECT * FROM menus where level = 0 ";
$db->querySql($query);
?>	
<style type="text/css">
.load { padding:10px 10px; min-height:200px}
.load-width { width:230px; }
</style>
                    <div class="block-border" id="tab-panel-2">
                        <div class="block-header">
                            <h1>Cấp Quyền</h1>
                            <ul class="tabs">
                                <?php
								while($rowbo = $db->fetchArray())
								{
								$listbo[] =$rowbo;	
								}
								foreach ($listbo as $row_bo)
								{
                                	echo '<li><a href="#'.$row_bo['menuID'].'">'.$row_bo['name'].'</a></li>';
								}
								
								?>
                            </ul>
                        </div>
                        <div class=" load block-content tab-container">
                              <div id="1" class="tab-content">
									   <?php
                                            $listkt = array();
                                            $query = "SELECT * FROM menus where menuID in (1,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20)";
                                            $db->querySql($query);
                                            while($rowkt = $db->fetchArray())
                                            {
                                            $listkt[] =$rowkt;	
                                            }
                                            foreach ($listkt as $row_kt)
                                            {
                                            echo '<div class="load-width fl"><label><input type="checkbox" name="checkboxkt[]" value = "'.$row_kt['menuID'].'" />'.$row_kt['name'].'</label></div>';								
                                            }
                                      ?>
                                </div>
                                <div id="2" class="tab-content">
									<?php
                                            $listkt = array();
                                            $query = "SELECT * FROM menus where menuID in (2,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45)";
                                            $db->querySql($query);
                                            while($rowkt = $db->fetchArray())
                                            {
                                            $listkt[] =$rowkt;	
                                            }
                                            foreach ($listkt as $row_kt)
                                            {
                                            echo '<div class="load-width fl"><label><input type="checkbox" name="checkboxkt[]" value = "'.$row_kt['menuID'].'" />'.$row_kt['name'].'</label></div>';								
                                            }
                                      ?>
                                </div>
                             
                                
                                  <div id="3" class="tab-content">
									<?php
                                            $listkt = array();
                                            $query = "SELECT * FROM menus where menuID in (3,46,47,48,49,50,51,52,53)";
                                            $db->querySql($query);
                                            while($rowkt = $db->fetchArray())
                                            {
                                            $listkt[] =$rowkt;	
                                            }
                                            foreach ($listkt as $row_kt)
                                            {
                                            echo '<div class="load-width fl"><label><input type="checkbox" name="checkboxkt[]" value = "'.$row_kt['menuID'].'" />'.$row_kt['name'].'</label></div>';								
                                            }
                                      ?>
                                </div>
                                <div id="4" class="tab-content">
									<?php
                                            $listkt = array();
                                            $query = "SELECT * FROM menus where menuID in (4,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90)";
                                            $db->querySql($query);
                                            while($rowkt = $db->fetchArray())
                                            {
                                            $listkt[] =$rowkt;	
                                            }
                                            foreach ($listkt as $row_kt)
                                            {
                                            echo '<div class="load-width fl"><label><input type="checkbox" name="checkboxkt[]" value = "'.$row_kt['menuID'].'" />'.$row_kt['name'].'</label></div>';								
                                            }
                                      ?>
                                 
                                </div>
                                  <div id="5" class="tab-content">
									<?php
                                            $listkt = array();
                                            $query = "SELECT * FROM menus where menuID in (5,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139)";
                                            $db->querySql($query);
                                            while($rowkt = $db->fetchArray())
                                            {
                                            $listkt[] =$rowkt;	
                                            }
                                            foreach ($listkt as $row_kt)
                                            {
                                            echo '<div class="load-width fl"><label><input type="checkbox" name="checkboxkt[]" value = "'.$row_kt['menuID'].'" />'.$row_kt['name'].'</label></div>';								
                                            }
                                      ?>
                                </div>
                        </div>
                    </div>
			<script type="text/javascript">
				$().ready(function() {
					$("#tab-panel-2").createTabs();
					$("#tab-panel-1").createTabs();
				});
				
            </script>