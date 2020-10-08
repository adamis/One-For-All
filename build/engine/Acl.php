<?php

namespace engine;

class Acl {

    function getAcls()
    {
		$permission = Array();
		
        
            
            //COLUMN_STATS
            $permission = $this->setRouter("column_stats","POST"  ,"find",$permission);
            $permission = $this->setRouter("column_stats","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("column_stats","DELETE","remove" ,$permission);
            $permission = $this->setRouter("column_stats","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("column_stats","POST"  ,"create" ,$permission);
            
            
            //COLUMNS_PRIV
            $permission = $this->setRouter("columns_priv","POST"  ,"find",$permission);
            $permission = $this->setRouter("columns_priv","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("columns_priv","DELETE","remove" ,$permission);
            $permission = $this->setRouter("columns_priv","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("columns_priv","POST"  ,"create" ,$permission);
            
            
            //DB
            $permission = $this->setRouter("db","POST"  ,"find",$permission);
            $permission = $this->setRouter("db","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("db","DELETE","remove" ,$permission);
            $permission = $this->setRouter("db","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("db","POST"  ,"create" ,$permission);
            
            
            //EVENT
            $permission = $this->setRouter("event","POST"  ,"find",$permission);
            $permission = $this->setRouter("event","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("event","DELETE","remove" ,$permission);
            $permission = $this->setRouter("event","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("event","POST"  ,"create" ,$permission);
            
            
            //FUNC
            $permission = $this->setRouter("func","POST"  ,"find",$permission);
            $permission = $this->setRouter("func","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("func","DELETE","remove" ,$permission);
            $permission = $this->setRouter("func","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("func","POST"  ,"create" ,$permission);
            
            
            //GENERAL_LOG
            $permission = $this->setRouter("general_log","POST"  ,"find",$permission);
            $permission = $this->setRouter("general_log","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("general_log","DELETE","remove" ,$permission);
            $permission = $this->setRouter("general_log","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("general_log","POST"  ,"create" ,$permission);
            
            
            //GLOBAL_PRIV
            $permission = $this->setRouter("global_priv","POST"  ,"find",$permission);
            $permission = $this->setRouter("global_priv","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("global_priv","DELETE","remove" ,$permission);
            $permission = $this->setRouter("global_priv","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("global_priv","POST"  ,"create" ,$permission);
            
            
            //GTID_SLAVE_POS
            $permission = $this->setRouter("gtid_slave_pos","POST"  ,"find",$permission);
            $permission = $this->setRouter("gtid_slave_pos","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("gtid_slave_pos","DELETE","remove" ,$permission);
            $permission = $this->setRouter("gtid_slave_pos","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("gtid_slave_pos","POST"  ,"create" ,$permission);
            
            
            //HELP_CATEGORY
            $permission = $this->setRouter("help_category","POST"  ,"find",$permission);
            $permission = $this->setRouter("help_category","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("help_category","DELETE","remove" ,$permission);
            $permission = $this->setRouter("help_category","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("help_category","POST"  ,"create" ,$permission);
            
            
            //HELP_KEYWORD
            $permission = $this->setRouter("help_keyword","POST"  ,"find",$permission);
            $permission = $this->setRouter("help_keyword","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("help_keyword","DELETE","remove" ,$permission);
            $permission = $this->setRouter("help_keyword","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("help_keyword","POST"  ,"create" ,$permission);
            
            
            //HELP_RELATION
            $permission = $this->setRouter("help_relation","POST"  ,"find",$permission);
            $permission = $this->setRouter("help_relation","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("help_relation","DELETE","remove" ,$permission);
            $permission = $this->setRouter("help_relation","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("help_relation","POST"  ,"create" ,$permission);
            
            
            //HELP_TOPIC
            $permission = $this->setRouter("help_topic","POST"  ,"find",$permission);
            $permission = $this->setRouter("help_topic","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("help_topic","DELETE","remove" ,$permission);
            $permission = $this->setRouter("help_topic","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("help_topic","POST"  ,"create" ,$permission);
            
            
            //INDEX_STATS
            $permission = $this->setRouter("index_stats","POST"  ,"find",$permission);
            $permission = $this->setRouter("index_stats","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("index_stats","DELETE","remove" ,$permission);
            $permission = $this->setRouter("index_stats","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("index_stats","POST"  ,"create" ,$permission);
            
            
            //INNODB_INDEX_STATS
            $permission = $this->setRouter("innodb_index_stats","POST"  ,"find",$permission);
            $permission = $this->setRouter("innodb_index_stats","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("innodb_index_stats","DELETE","remove" ,$permission);
            $permission = $this->setRouter("innodb_index_stats","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("innodb_index_stats","POST"  ,"create" ,$permission);
            
            
            //INNODB_TABLE_STATS
            $permission = $this->setRouter("innodb_table_stats","POST"  ,"find",$permission);
            $permission = $this->setRouter("innodb_table_stats","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("innodb_table_stats","DELETE","remove" ,$permission);
            $permission = $this->setRouter("innodb_table_stats","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("innodb_table_stats","POST"  ,"create" ,$permission);
            
            
            //PLUGIN
            $permission = $this->setRouter("plugin","POST"  ,"find",$permission);
            $permission = $this->setRouter("plugin","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("plugin","DELETE","remove" ,$permission);
            $permission = $this->setRouter("plugin","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("plugin","POST"  ,"create" ,$permission);
            
            
            //PROC
            $permission = $this->setRouter("proc","POST"  ,"find",$permission);
            $permission = $this->setRouter("proc","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("proc","DELETE","remove" ,$permission);
            $permission = $this->setRouter("proc","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("proc","POST"  ,"create" ,$permission);
            
            
            //PROCS_PRIV
            $permission = $this->setRouter("procs_priv","POST"  ,"find",$permission);
            $permission = $this->setRouter("procs_priv","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("procs_priv","DELETE","remove" ,$permission);
            $permission = $this->setRouter("procs_priv","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("procs_priv","POST"  ,"create" ,$permission);
            
            
            //PROXIES_PRIV
            $permission = $this->setRouter("proxies_priv","POST"  ,"find",$permission);
            $permission = $this->setRouter("proxies_priv","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("proxies_priv","DELETE","remove" ,$permission);
            $permission = $this->setRouter("proxies_priv","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("proxies_priv","POST"  ,"create" ,$permission);
            
            
            //ROLES_MAPPING
            $permission = $this->setRouter("roles_mapping","POST"  ,"find",$permission);
            $permission = $this->setRouter("roles_mapping","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("roles_mapping","DELETE","remove" ,$permission);
            $permission = $this->setRouter("roles_mapping","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("roles_mapping","POST"  ,"create" ,$permission);
            
            
            //SERVERS
            $permission = $this->setRouter("servers","POST"  ,"find",$permission);
            $permission = $this->setRouter("servers","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("servers","DELETE","remove" ,$permission);
            $permission = $this->setRouter("servers","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("servers","POST"  ,"create" ,$permission);
            
            
            //SLOW_LOG
            $permission = $this->setRouter("slow_log","POST"  ,"find",$permission);
            $permission = $this->setRouter("slow_log","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("slow_log","DELETE","remove" ,$permission);
            $permission = $this->setRouter("slow_log","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("slow_log","POST"  ,"create" ,$permission);
            
            
            //TABLE_STATS
            $permission = $this->setRouter("table_stats","POST"  ,"find",$permission);
            $permission = $this->setRouter("table_stats","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("table_stats","DELETE","remove" ,$permission);
            $permission = $this->setRouter("table_stats","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("table_stats","POST"  ,"create" ,$permission);
            
            
            //TABLES_PRIV
            $permission = $this->setRouter("tables_priv","POST"  ,"find",$permission);
            $permission = $this->setRouter("tables_priv","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("tables_priv","DELETE","remove" ,$permission);
            $permission = $this->setRouter("tables_priv","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("tables_priv","POST"  ,"create" ,$permission);
            
            
            //TIME_ZONE
            $permission = $this->setRouter("time_zone","POST"  ,"find",$permission);
            $permission = $this->setRouter("time_zone","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("time_zone","DELETE","remove" ,$permission);
            $permission = $this->setRouter("time_zone","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("time_zone","POST"  ,"create" ,$permission);
            
            
            //TIME_ZONE_LEAP_SECOND
            $permission = $this->setRouter("time_zone_leap_second","POST"  ,"find",$permission);
            $permission = $this->setRouter("time_zone_leap_second","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("time_zone_leap_second","DELETE","remove" ,$permission);
            $permission = $this->setRouter("time_zone_leap_second","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("time_zone_leap_second","POST"  ,"create" ,$permission);
            
            
            //TIME_ZONE_NAME
            $permission = $this->setRouter("time_zone_name","POST"  ,"find",$permission);
            $permission = $this->setRouter("time_zone_name","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("time_zone_name","DELETE","remove" ,$permission);
            $permission = $this->setRouter("time_zone_name","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("time_zone_name","POST"  ,"create" ,$permission);
            
            
            //TIME_ZONE_TRANSITION
            $permission = $this->setRouter("time_zone_transition","POST"  ,"find",$permission);
            $permission = $this->setRouter("time_zone_transition","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("time_zone_transition","DELETE","remove" ,$permission);
            $permission = $this->setRouter("time_zone_transition","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("time_zone_transition","POST"  ,"create" ,$permission);
            
            
            //TIME_ZONE_TRANSITION_TYPE
            $permission = $this->setRouter("time_zone_transition_type","POST"  ,"find",$permission);
            $permission = $this->setRouter("time_zone_transition_type","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("time_zone_transition_type","DELETE","remove" ,$permission);
            $permission = $this->setRouter("time_zone_transition_type","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("time_zone_transition_type","POST"  ,"create" ,$permission);
            
            
            //TRANSACTION_REGISTRY
            $permission = $this->setRouter("transaction_registry","POST"  ,"find",$permission);
            $permission = $this->setRouter("transaction_registry","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("transaction_registry","DELETE","remove" ,$permission);
            $permission = $this->setRouter("transaction_registry","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("transaction_registry","POST"  ,"create" ,$permission);
            
            
            //USER
            $permission = $this->setRouter("user","POST"  ,"find",$permission);
            $permission = $this->setRouter("user","GET"   ,"findAll"    ,$permission);
            $permission = $this->setRouter("user","DELETE","remove" ,$permission);
            $permission = $this->setRouter("user","PUT"   ,"update"    ,$permission);
            $permission = $this->setRouter("user","POST"  ,"create" ,$permission);
            
        return $permission;
	}
	
	function setRouter($url,$type,$method,$permission) {	

		$len = count($permission);
		
		$permission[$len][0] = $type;
		$permission[$len][1] = $method;
		$permission[$len][2] = $url;		

		return $permission;
	}
}  
?>