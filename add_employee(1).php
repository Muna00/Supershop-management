<?php
  $page_title = 'Add Employee';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
 if(isset($_POST['add_employee'])){
   $req_fields = array('emp-fname','emp-lname','emp-address','emp-salary', 'emp-uid' );
   validate_fields($req_fields);
   if(empty($errors)){
     $e_fname  = remove_junk($db->escape($_POST['emp-fname']));
     $e_lname   = remove_junk($db->escape($_POST['emp-lname']));
     $e_address   = remove_junk($db->escape($_POST['emp-address']));
     $e_salary   = remove_junk($db->escape($_POST['emp-salary']));
     $e_uid  = remove_junk($db->escape($_POST['emp-uid']));
    
     $query  = "INSERT INTO employee (";
     $query .=" first_name,last_name,address,salary,uid";
     $query .=") VALUES (";
     $query .=" '{$e_fname}', '{$e_lname}', '{$e_address}', '{$e_salary}', '{$e_uid}'";
     $query .=")";
     if($db->query($query)){
       $session->msg('s',"Employee added ");
       redirect('add_employee.php', false);
     } else {
       $session->msg('d',' Sorry failed to add!');
       redirect('add_employee.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_employee.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Add new Employee</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="add_employee.php" class="clearfix">
        <div class="form-group">
              <label for="e_fname" class="control-label">First Name</label>
              <input type="text" class="form-control" name="emp-fname">
        </div>
        <div class="form-group">
              <label for="e_lname" class="control-label">Last Name</label>
              <input type="text" class="form-control" name="emp-lname">
        </div>
        <div class="form-group">
              <label for="e_address" class="control-label">Address</label>
              <input type="text" class="form-control" name="emp-address">
        </div>
        <div class="form-group">
              <label for="e_salary" class="control-label">Salary</label>
              <input type="number" class="form-control" name="emp-salary">
        </div>
        <div class="form-group">
              <label for="e_uid" class="control-label">U_Id</label>
              <input type="number" class="form-control" name="emp-uid">
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="add_employee" class="btn btn-info">Update</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
