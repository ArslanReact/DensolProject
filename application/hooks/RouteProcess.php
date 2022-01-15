<?php
class RouteProcess 
{

    function __construct() 
    {
    }


    function logQueries() 
    {
        $CI = & get_instance();

        $filepath = APPPATH . 'logs/Query-log-' . date('Y-m-d') . '.php'; 
        $handle = fopen($filepath, "a+");                        

        $times = $CI->db->query_times;
        foreach ($CI->db->queries as $key => $query) 
        { 
            $sql = $query . " \n Execution Time:" . $times[$key]; 
            $sql .= "\n Time:" . date("d-m-Y h:i:s"); 

            fwrite($handle, $sql . "\n\n");    
        }

        fclose($handle);
    }

}