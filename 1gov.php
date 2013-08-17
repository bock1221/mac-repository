<?php
 $first_run = true;
  if  (($handle = fopen("gov.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
    if($first_run == TRUE) {
    $field_names = $data;
     $first_run = FALSE;
      } else {
    $data = array_combine($field_names, $data);
   $records[] = $data;
}
  } 
   fclose($handle);
  print_r($records); 
 } else {
  echo 'no file found or something';

}
?>
