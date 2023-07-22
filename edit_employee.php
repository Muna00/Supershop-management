<?php
  $page_title = 'Edit Employee';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $employees = find_by_id('employee',(int)$_GET['id']);
  if(!$employees){
    $session->msg("d","Missing Employee id.");
    redirect('employee.php');
  }
?>
<?php
 if(isset($_POST['update_employee'])){
   $req_fields = array('emp-fname','emp-lname','emp-address','emp-salary', 'emp-uid' );
   validate_fields($req_fields);
   if(empty($errors)){
     $e_fname  = remove_junk($db->escape($_POST['emp-fname']));
     $e_lname   = remove_junk($db->escape($_POST['emp-lname']));
     $e_address   = remove_junk($db->escape($_POST['emp-address']));
     $e_salary   = remove_junk($db->escape($_POST['emp-salary']));
     $e_uid  = remove_junk($db->escape($_POST['emp-uid']));
    
     $query  = "UPDATE employee SET ";
     $query .= "first_name='{$e_fname}', last_name='{$e_lname}', address='{$e_address}', salary='{$e_salary}', uid='{$e_uid}'";
     $query .= "WHERE ID='{$db->escape($employees['id'])}'";
     $result = $db->query($query);
     if($result && $db->affected_rows() === 1){
        //sucess
        $session->msg('s',"Employee has been updated! ");
        redirect('edit_employee.php?id='.(int)$employees['id'], false);
      } else {
        //failed
        $session->msg('d',' Sorry failed to update!');
        redirect('edit_employee.php?id='.(int)$employees['id'], false);
      }
 } else {
   $session->msg("d", $errors);
  redirect('edit_employee.php?id='.(int)$employees['id'], false);
 }
}

?>

<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Edit Employee</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="edit_employee.php?id=<?php echo (int)$employees['id'];?>" class="clearfix">
        <div class="form-group">
              <label for="e_fname" class="control-label">First Name</label>
              <input type="text" class="form-control" name="emp-fname" value="<?php echo remove_junk(ucwords($employees['first_name'])); ?>">
        </div>
        <div class="form-group">
              <label for="e_lname" class="control-label">Last Name</label>
              <input type="text" class="form-control" name="emp-lname" value="<?php echo remove_junk(ucwords($employees['last_name'])); ?>">
        </div>
        <div class="form-group">
              <label for="e_address" class="control-label">Address</label>
              <input type="text" class="form-control" name="emp-address" value="<?php echo remove_junk(ucwords($employees['address'])); ?>">
        </div>
        <div class="form-group">
              <label for="e_salary" class="control-label">Salary</label>
              <input type="number" class="form-control" name="emp-salary" value="<?php echo remove_junk(ucwords($employees['salary'])); ?>">
        </div>
        <div class="form-group">
              <label for="e_uid" class="control-label">U_Id</label>
              <input type="number" class="form-control" name="emp-uid" value="<?php echo remove_junk(ucwords($employees['uid'])); ?>">
        </div>
       
        <div class="form-group clearfix">
                <button type="submit" name="update_employee" class="btn btn-info">Update</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
