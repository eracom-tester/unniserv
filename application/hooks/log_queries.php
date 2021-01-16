<?php
function log_queries() 
{
	$CI =& get_instance();

	$filepath = APPPATH . 'logs/Query-log-' . date('Y-m-d') . '.php'; // Creating Query Log file with today's date in application/logs folder
    $handle = fopen($filepath, "a+"); 

	$times = $CI->db->query_times;
	foreach ($CI->db->queries as $key=>$query) {
		//echo "Query: ". $query." | ".$times[$key] . "<br>";
		$sql = $query . " \n Execution Time:" . $times[$key]; // Generating SQL file alongwith execution time
        fwrite($handle, $sql . "\n\n");
	}
 
	$CI->output->_display();
}
?>