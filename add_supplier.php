<?php
  $page_title = 'Add Supplier';
  require_once('includes/load.php');
  
   page_require_level(1);
?>
<?php
if(isset($_POST['add_supplier'])){

    $req_fields = array('ssname','ssaddress','ssdealer');
    validate_fields($req_fields);
    if(empty($errors)){
        $s_name   = remove_junk($db->escape($_POST['ssname']));
        $s_address   = remove_junk($db->escape($_POST['ssaddress']));
        $s_dealer   = remove_junk($db->escape($_POST['ssdealer']));
       
        $query  = "INSERT INTO supplier (";
        $query .="sname,saddress,sdealer";
        $query .=") VALUES (";
        $query .=" '{$s_name}', '{$s_address}','{$s_dealer}'";
        $query .=")";
        if($db->query($query)){
            
            $session->msg('s',"Supplier has been added! ");
            redirect('add_supplier.php', false);
          } else {
            
            $session->msg('d',' Sorry failed to add Supplier!');
            redirect('add_supplier.php', false);
          }
     } else {
       $session->msg("d", $errors);
        redirect('add_supplier.php',false);
     }
   }
  ?>

<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Add new supplier</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="add_supplier.php" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Supplier Name</label>
              <input type="text" class="form-control" name="ssname">
        </div>
        
        <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="text" class="form-control" name="ssaddress">
        </div>
        <div class="form-group">
              <label for="dealer" class="control-label">Dealer Name</label>
              <input type="text" class="form-control" name="ssdealer">
        </div>
       
       
       
        <div class="form-group clearfix">
                <button type="submit" name="add_supplier" class="btn btn-info">Add</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
