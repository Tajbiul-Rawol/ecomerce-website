<?php  include_once "Library_Functions/Functionlib.php"; ?>
<?php  include_once "Library_Functions/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Entry</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

    <?php

            


            


       if (isset($_POST['add'])) {


       	    /**

       	     * data received from the form
       	     */
       	    
       	     $pname = $_POST['pname'];
       	     $rprice = $_POST['rprice'];
       	     $sprice = $_POST['sprice'];
       	     $description = $_POST['description'];
             $brand = $_POST['brand'];
             $category = $_POST['category'];
             $tag = $_POST['tag'];

       	     //retrieving file name 
       	    
       	     $file_name = $_FILES['image']['name'];
             $file_tmp_name = $_FILES['image']['tmp_name'];
             $file_size = $_FILES['image']['size'] ;
            
            
             //file size
              $size=(($file_size/1024)/1024);
              
              //$fil_ext = ['docx','pdf'];
              
              //$nam_format = 'dt';

              //$fol = 'cv/';
             
              
               
                



       	     //email explode
             /**
              *the string has been exploded to an array and stored in the exploded_email variable
              the end function is used to pickup the last element of the array and store in the valid_email variable
              */
       	     //$exploded_email = explode('@', $email); 
       	     //$valid_email = end($exploded_email);

       	    


       	     if (empty($pname) || empty($rprice) || empty($sprice) || empty($brand) || empty($description) || empty($category)||empty($tag) || empty($_FILES['image']['tmp_name']) ) 
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
       	     	      
       	     	      
       	     	      $data = File_upload($_FILES['image'], 'images/products/',['jpg','jpeg'], [
                                  'type' => 'image'       
       	     	      ]);

                    //query to insert data into the table........

                    echo $image_name = $data['file_name'];

                    $sql = "INSERT INTO products (product_name, regular_price, sale_price, product_description, category, tag, brand, image) VALUES ('$pname','$rprice','$sprice','$description', '$category', '$tag', '$brand', '$image_name')";
                    
                    $connection -> query($sql);


       	     	      //echo $data['image_name'];

       	     	      $mess = '<p class="alert alert-success"> Product Added to database! <button data-dismiss="alert" class="close"> &times; </button></p>';


       	     }

       }


    ?>

   <div class="container">
   	   
   	   <div class="log w-50 mx-auto mt-5">

   	   	<?php 
            
            if (isset($mess)) {
            	echo $mess;
            }

   	   	?>
   	   	
           <a  class="btn btn-success btn-sm" href="All_products.php">View All products</a>
   	   	  <div class="card shadow">
   	      	
   	      	<div class="card-header">
   	      		<h2>Product Entry</h2>
   	      	</div>
   	      	<div class="card-body">
   	      		
                 <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST"  enctype="multipart/form-data">
                 	 
                      <div class="form-group">
                      	<label for="">Product Name</label>
                      	<input class="form-control" type="text" name="pname">
                      	
                      </div>

                      <div class="form-group">
                      	<label for="">Regular Price</label>
                      	<input class="form-control" type="text" name="rprice">
                      	
                      </div>

                      <div class="form-group">
                      	<label for="">Sale Price</label>
                      	<input class="form-control" type="text" name="sprice">
                      	
                      </div>

                      <div class="form-group">
                      	<label for="">Description</label>
                      	<input class="form-control" type="text" name="description">
                      	
                      </div>

                      <div class="form-group">
                        <label for="">Brand</label>
                        <input class="form-control" type="text" name="brand">
                        
                      </div>

                      <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category">
                          <option value="">-select</option>
                          <option value="gadgets">Gadgets</option>
                          <option value="watches">Watch</option>
                          <option value="shoes">Shoes</option>
                          <option value="clothes">Clothes</option>
                          <option value="jewelery">Jewelery</option>
                        </select>
                        
                      </div>

                     <div class="form-group">
                        <label for="">Tag</label>
                        <input class="form-control" type="text" name="tag">
                        
                      </div>


                      <div class="form-group">
                      	
                      	<input type="file" name="image">
                      	
                      </div>



                      <div class="form-group">
                      	
                      	<input class="btn btn-info" type="submit" value="Add Product" name="add">
                      	
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