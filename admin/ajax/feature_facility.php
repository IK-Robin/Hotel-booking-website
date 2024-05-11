<?php
require('../db/phplinks.php');
adminLogin();
 
// add team member 
if(isset($_POST['feature_name'])){
   $frm_data = filtaration($_POST);


   $values =[$frm_data['feature_name']];
   $q = "INSERT INTO `feature_facility`( `name`) VALUES ( ?)";
   $res = inserts($q,$values,'s');
   echo $res;

}

 


// show all team member form db 


if (isset($_POST['get_features'])) {



  // $q = "SELECT * FROM `feature_facility` ORDER BY `id` DESC";
  $data = selectAll('feature_facility');

  $i = 1;
  while ($row = mysqli_fetch_assoc($data)) {
    $seen = '';


    $seen = "<button onclick='delet_feature($row[id])' class='btn btn-sm btn-danger mx-auto text-center mt-2 '> Delete</button>";
    echo <<<tableRow
        <tr>
      
            <td>$i</td>
            <td>$row[name]</td>
            
            <td class="text-center">$seen</td>
      
            
        </tr>

     tableRow;
    $i++;
  }



}



// delete carosal 

if(isset($_POST['id'])){
$frm_data = filtaration($_POST);
$value = [$frm_data['id']];


$delet_q = "DELETE FROM `feature_facility` WHERE id=?";
$del_row = deletes($delet_q,$value,'i');

echo $del_row;


} 
?>