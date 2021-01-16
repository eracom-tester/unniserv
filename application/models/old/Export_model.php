<?php
class Export_model extends CI_Model{
    
    public function export_to_excel($data){        
           $filename = time().".xls";       
           header("Content-Type: application/vnd.ms-excel");
           header("Content-Disposition: attachment; filename=\"$filename\"");
           $this->ExportFile($data);
         
    }
    public function export_to_csv($data){        
           $filename = time().".csv";       
           header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
           header("Content-type: text/csv");
           header("Content-Disposition: attachment; filename=\"$filename\"");
           header("Expires: 0");
           $this->ExportCSVFile($data);
         
    }

    function ExportCSVFile($records) {
        // create a file pointer connected to the output stream
        $fh = fopen( 'php://output', 'w' );
        $heading = false;
            if(!empty($records))
              foreach($records as $row) {
                if(!$heading) {
                  // output the column headings
                  fputcsv($fh, array_keys($row));
                  $heading = true;
                }
                // loop over the rows, outputting them
                 fputcsv($fh, array_values($row));
                  
              }
              fclose($fh);
    }
    function ExportFile($records) {
        $heading = false;
        if(!empty($records))
          foreach($records as $row) {
            if(!$heading) {
              // display field/column names as a first row
              echo implode("\t", array_keys($row)) . "\n";
              $heading = true;
            }
            echo implode("\t", array_values($row)) . "\n";
          }
        exit;
    }
}

