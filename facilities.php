<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAMJAIU-Facilities</title>
    
<style>
    .pop:hover{
        border-top-color: aqua !important;
        transform: scale(1.03);
        transition: .3s ease-in-out;
    }
</style>
<!-- swipper carosal  -->

    <?php require ("./inc/links.php") ?>
    
   <!-- <link rel="stylesheet" href=" <?php require ("css/style.css") ?>"> -->
    
  </head>

  <body class="bg-light">
    <div class="container-fluid bg-white">
      <div class="container">
        <?php require ("./components/header.php") ?>
      </div>
    </div>
    <!-- our rooms  -->
    <h2 class="mt-4 mb-1 pt-4 text-center font-bold merinda  ">Our Facilities</h2>
    <div class="h-line bg-dark"></div>
    <div class="container mt-5">
        <div class="row ">
          
        <?php 
    $res = selectAll('facilities');
    if($res){
        $facility_path = FACILITIES_IMG_PATH;
     while($row  = mysqli_fetch_assoc($res)){
        echo <<<facilitys
        <div class=" col-lg-4 col-mb-6 mb-5 px-4">
        <div class ="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
            <div class="d-flex align-items-center mb-2 " >
                <img width="40px" src="$facility_path$row[icon]" alt="$row[name]">
                <h5 class="m-0 ps-2">$row[name]</h5>
            </div>
            <p>$row[desc]</p>
        </div>
    </div>
    facilitys;
     }  
    }
        
        ?>

          
        </div>
    </div>
    
    <?php require("components/footer.php"); ?>

  
  </body>
</html>
