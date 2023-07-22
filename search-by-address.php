
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>search employee</title>
  </head>
  <body>
  
     <div class="container">
         <div class="row">
             <div class="col-md-12 mt-4">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Employee Records</h4>   
                     </div>
                     <div class="card-body">
                       <div class="row">
                           <div class="col-md-6">
                               <form action="" method="POST">
                               <div class="form-group">
                                   <input type="text" name="get_address" class="form-control" placeholder="Enter address" required>
                               </div>
                               <br>
                               <button type="submit" name="search_by_address" class="btn btn-primary">Search</button>
                               </form>
                           </div>
                       </div>
                       <?php
                         $connection = mysqli_connect("localhost","root","","test");
                         if(isset($_POST['search_by_address']))
                         {
                            $add = $_POST['get_address'];
                            $query = "SELECT * FROM employee WHERE address='$add' ";
                            $query_run = mysqli_query($connection,$query);
                    
                       ?>
                       <div class="table-responsive">
                       <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
      <th scope="col">Salary</th>
      <th scope="col">User ID</th>
    </tr>
  </thead>
  <tbody>
      <?php
         if(mysqli_num_rows($query_run)>0)
         {
             while($row = mysqli_fetch_array($query_run))
             {
      ?>
    <tr>
     <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['first_name']; ?></td>
      <td><?php echo $row['last_name']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['salary']; ?></td>
      <td><?php echo $row['uid']; ?></td>
    </tr>
    <?php
           }
        }
        else
        {
           ?>
           <tr>
               <td colspan="6">
                No record found.
               </td>
           </tr>

           <?php
        }
    ?>
  </tbody>
</table>
      

                       </div>
                       <?php
                         }
                       ?>
                     </div>
                 </div>
             </div>
         </div>
     </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>