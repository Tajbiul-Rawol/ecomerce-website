<?php  include_once "Library_Functions/Functionlib.php"; ?>
<?php  include_once "Library_Functions/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Students</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

    <?php

            //get student id from $_GET 
           if (isset($_GET['id'])) {
             $id_url = $_GET['id'];
           }
          
    


       if (isset($_POST['update'])) {


            /**
             * data received from the form
             */
            
             $pname = $_POST['pname'];
             $rprice = $_POST['rprice'];
             $sprice = $_POST['sprice'];
             $category = $_POST['category'];
             $brand = $_POST['brand'];
             $tag = $_POST['tag'];
             $description = $_POST['description'];

             //retrieving photo name 
            
             $file_name = $_FILES['image']['name'];
             $file_tmp_name = $_FILES['image']['tmp_name'];
             $file_size = $_FILES['image']['size'] ;
            
            
             //file size
              $size=(($file_size/1024)/1024);
              
         

            


             if (empty($pname) || empty($rprice) || empty($sprice) || empty($brand) || empty($description) || empty($category)||empty($tag) ) 
             {

                   $mess = '<p class="alert alert-danger"> All fields required! <button data-dismiss="alert" class="close"> &times; </button></p>';

             }
             elseif ($size > 1) 
             {
              $mess = '<p class="alert alert-warning">file too large!!<button data-dismiss="alert" class="close"> &times; </button></p>';
             }
             elseif ($sprice > $rprice) {
               
               $mess = '<p class="alert alert-warning">Selling price should be smaller!<button data-dismiss="alert" class="close"> &times; </button></p>';
             }
             else
             {
                    
                    if (isset($file_name)) {

                        $data = File_upload($_FILES['image'], 'images/products/',['jpg','jpeg'],[
                                  'type' => 'image'       
                                  ]);
                        
                        $photo_name = $data['file_name'];
                        unlink('images/products/'.$_POST['old_photo']);

                        echo "ekhane update hocche";

                    }else{
                           //the old photo that is stored in the $_POST array
                          $photo_name = $_POST['old_photo'];                        
                    }
                  

                    //query to Update data into the table........

                    $sql = "UPDATE products SET
                            product_name = '$pname',
                            regular_price = '$rprice',
                            sale_price = '$sprice',
                            product_description = '$description',
                            category = '$category',
                            tag = '$tag',
                            brand = '$brand',
                            image = '$photo_name'
                            WHERE  id = '$id_url' ";
                    
                    $connection -> query($sql);


                    $mess = '<p class="alert alert-success"> Update Successful! <button data-dismiss="alert" class="close"> &times; </button></p>';


             }



       }

       // retrieve all data of the product from the id
           $sql = "SELECT * FROM products WHERE id='$id_url' ";
           $data = $connection -> query($sql);
           $single_data = $data -> fetch_assoc();


    ?>

   <div class="container">
       
       <div class="log w-50 mx-auto mt-5">

        <?php 
            
            if (isset($mess)) {
              echo $mess;
            }

        ?>
        
           <a  class="btn btn-success btn-sm" href="All_products.php">View All Products</a>
          <div class="card shadow">
            
            <div class="card-header">
              <h2>Update Product Info</h2>
            </div>
            <div class="card-body">
              
                <!---the id is passed to the url when the update btn is pressed, so that the id stays in the url to load the data in the form-->

                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo"$id_url"; ?>" method="POST"  enctype="multipart/form-data">
                   
                      <div class="form-group">
                        <label for=""> Product Name</label>
                        <input class="form-control" type="text" value="<?php echo $single_data['product_name'] ?>" name="pname">
                        
                      </div>

                      <div class="form-group">
                        <label for="">Regular Price</label>
                        <input class="form-control" type="text"  value="<?php echo $single_data['regular_price'] ?>" name="rprice">
                        
                      </div>

                      <div class="form-group">
                        <label for="">Sale Price</label>
                        <input class="form-control" type="text" value="<?php echo $single_data['sale_price'] ?>" name="sprice">
                        
                      </div>


                      <div class="form-group">
                        <label for="">Description</label>
                        <input class="form-control" type="text" value="<?php echo $single_data['product_description'] ?>" name="description">
                        
                      </div>

                      <div class="form-group">
                        <label for="">Brand</label>
                        <input class="form-control" type="text" value="<?php echo $single_data['brand'] ?>" name="brand">
                        
                      </div>



                      <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category">
                          <option value="">-select</option>
                          <option <?php if($single_data['category']=='gadgets'): echo "selected"; endif; ?> value="Gulshan">Gulshan</option>
                          <option <?php if($single_data['category']=='watches'): echo "selected"; endif; ?> value="Banani">Banani</option>
                          <option <?php if($single_data['category']=='shoes'): echo "selected"; endif; ?> value="Bashundhara">Bashundhara</option>
                          <option <?php if($single_data['category']=='clothes'): echo "selected"; endif; ?> value="Baridhara">Baridhara</option>
                          <option <?php if($single_data['category']=='jewelery'): echo "selected"; endif; ?> value="Badda">Badda</option>
                        
                        </select>
                        
                      </div>

                      <div class="form-group">
                        <label for="">Tag</label>
                        <input class="form-control" type="text" value="<?php echo $single_data['tag'] ?>" name="tag">
                        
                      </div>

                        
                       <div class="form-group">
                           <img  style="width: 150px;"src="photos/<?php echo $single_data['image'] ?>">
                           <input type="hidden" value="<?php echo $single_data['image'] ?>" name="old_photo">
                       </div>
                      <div class="form-group">
                        
                        <input type="file" name="image">
                        
                      </div>



                      <div class="form-group">
                        
                        <input class="btn btn-info" type="submit" value="update" name="update">
                        
                      </div>

                 </form>

            </div>

                
            
          </div>

       </div>
         
   </div>


   



<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>   