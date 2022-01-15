<?php
if(isset($_GET["term"]))
{
$query =  $this->db->query("select * from products WHERE title LIKE '%".$_GET["term"]."%'  ORDER BY student_name ASC");
$data_product= $query->result_array();
 if($data_product)
 {
  foreach($data_product as $row)
  {
   $temp_array = array();
   $temp_array['value'] = $row['title'];
   $temp_array['label'] = '<img src="images/'.$row['image'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['title'].'';
   $output[] = $temp_array;
  }
 }
 else
 {
  $output['value'] = '';
  $output['label'] = 'No Record Found';
 }

 echo json_encode($output);
 exit;
 
}