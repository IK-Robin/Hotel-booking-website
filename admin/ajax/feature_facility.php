<?php
require ('../db/phplinks.php');
adminLogin();

// add team member 
if (isset($_POST['feature_name'])) {
   $frm_data = filtaration($_POST);


   $values = [$frm_data['feature_name']];
   $q = "INSERT INTO `feature_facility`( `name`) VALUES ( ?)";
   $res = inserts($q, $values, 's');
   echo $res;

}




// show all features form db 


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

if (isset($_POST['id'])) {
   $frm_data = filtaration($_POST);
   $value = [$frm_data['id']];


   $delet_q = "DELETE FROM `feature_facility` WHERE id=?";
   $del_row = deletes($delet_q, $value, 'i');

   echo $del_row;


}




// add facility 
if (isset($_POST['add_facility'])) {
   $frm_data = filtaration($_POST);
   $img_upload = uploadSvgImage($_FILES['icon'], FACILITE_FOLDER);

   if ($img_upload == 'inv_img') {
      echo 'inv_img';
   } else if ($img_upload == 'upd_failed') {
      echo 'upd_failed';
   } else if ($img_upload == 'inv_size') {
      echo 'inv_size';
   } else {


      $values = [$frm_data['facility_name'], $frm_data['desc'], $img_upload];
      $q = "INSERT INTO `facilities`( `name`, `desc`, `icon`) VALUES (?,?,?)";
      $res = inserts($q, $values, 'sss');
      echo $res;
   }
}



// show all facilitiey form db 


if (isset($_POST['get_facility'])) {

$path = FACILITIES_IMG_PATH;

   $data = selectAll('facilities');

   $i = 1;
   while ($row = mysqli_fetch_assoc($data)) {
      $seen = '';


      $seen = "<button onclick='delet_facilitey($row[id])' class='shadow-none btn btn-sm btn-danger mx-auto text-center mt-2 '> Delete</button>";
      echo <<<tableRow
        <tr>
      
            <td>$i</td>
            <td><img class=""  width="60px" src="$path$row[icon]"></td>
            <td>$row[name]</td>
            <td>$row[desc]</td>
            
            <td class="">$seen</td>
      
            
        </tr>

     tableRow;
      $i++;
   }



}



if (isset($_POST['facility_id'])) {


   $frm_data = filtaration($_POST);
   $value = [$frm_data['facility_id']];


   $new_q ="SELECT * FROM `facilities` WHERE id=?";
   $res = select($new_q,$value,'i');
   
   $data = mysqli_fetch_assoc($res);

   $m_img = $data['icon'];

   if(deleteImage($m_img,FACILITE_FOLDER)){


      $delet_q = "DELETE FROM `facilities` WHERE id =?";
      $del_row = deletes($delet_q,$value,'i');
      if($del_row){
        echo $del_row;
      }else{
        echo "Can't delete the member";
      }
    }else{
      echo  'Delete faild';
    }









}

?>