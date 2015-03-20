<?php //LANGUAGES;
	class languages {
		private $table = 'languages'; // keyLang, en, vi, ch
		private $size = 0;
		private $db;
		
		public $lang;
        public $data = array(); //$data[int]['keyLang', 'en', 'vi', 'ch']
		public $index = array(); //Contain key index to retrieve key words from $data
        
		function __construct() {			
			global $db;
			$this->db = $db;
			
			if (isset($_SESSION['lang'])) {
				@$this->size = $_SESSION['lang']->size;
				$this->lang = $_SESSION['lang']->lang;
				@$this->data = $_SESSION['lang']->data;
				@$this->index = $_SESSION['lang']->index;
			};
			if (isset($_COOKIE['lang'])) $this->change($_COOKIE['lang']);
			else $this->change();
			if (isset($_GET['lang'])) $this->change($_GET['lang']);
		}
		
		function change($lang = 'vi') {
			$this->lang = $lang;
			@$_SESSION['lang']->lang = $this->lang;
			setcookie('lang',$this->lang,time() + (3600 * 24 * 30));
		}
		
		function init() {
			$this->size = 0;
			$this->data = array();
			$this->index = array();
			
            $this->db->querySQL("SELECT * FROM $this->table ORDER BY keyLang");
			
            while ($keyLang = $this->db->fetchArray()) {
                $this->data[] = $keyLang;
                $this->index[$keyLang['keyLang']] = $this->size;
                $this->size++;
            };

			$_SESSION['lang'] = $this;
		}
        
		//To retrieve key words where $key is key index and $lang is language (en, vi, ch)
		function get() {
			$args = func_get_args();
			$str = '';
			
			foreach ($args as $key) {
				if (isset($this->index[$key])) {
					$str .= (!empty($this->data[$this->index[$key]][$this->lang])) ? $this->data[$this->index[$key]][$this->lang] : $key;
					$str .= ' ';
				} else {
					$this->db->querySQL("SELECT * FROM $this->table WHERE keyLang = '$key'");
					
					if ($this->db->numrows()) {
						$this->data[] = $this->db->fetchArray();
						$this->index[$this->data[$this->size]['keyLang']] = $this->size;
                		
						$str .= $this->data[$this->size][$this->lang];
						$this->size++;
						$_SESSION['lang'] = $this;
					} else $str .= $key;
					$str .= ' ';
				};
			};
			
			$str = rtrim($str);
			return $str;
		}
		
		//To add a new key index
		function add($key, $en = 'NULL', $vi = 'NULL', $ch = 'NULL') {
			$this->db->querySQL("INSERT INTO $this->table (keyLang, en, vi, ch) VALUES ('$key', N'$en', N'$vi', N'$ch')");
		}
		
		//To remove a key index
		function remove($key) {
			$this->db->querySQL("DELETE $this->table WHERE keyLang = '$key'");	
		}
		
		//To change the key value
		function edit($key, $lang, $new) {
			$this->db->querySQL("UPDATE $this->table SET $lang = N'$new' WHERE keyLang = '$key'");
		}
    };
?>