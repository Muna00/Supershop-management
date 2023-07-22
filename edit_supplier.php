<?php
  $page_title = 'Edit Supplier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $supplier = find_by_id('supplier',(int)$_GET['id']);
  if(!$supplier){
    $session->msg("d","Missing Supplier id.");
    redirect('supplier.php');
  }
?>

<?php
if(isset($_POST['update_supplier'])){

    $req_fields = array('ssname','ssaddress','ssdealer');
    validate_fields($req_fields);
    if(empty($errors)){
        $s_name   = remove_junk($db->escape($_POST['ssname']));
        $s_address   = remove_junk($db->escape($_POST['ssaddress']));
        $s_dealer   = remove_junk($db->escape($_POST['ssdealer']));
      
        $query  = "UPDATE supplier SET ";
        $query .= "sname='{$s_name}',saddress='{$s_address}',sdealer='{$s_dealer}'";
        $query .= "WHERE ID='{$db->escape($supplier['id'])}'";
        $result = $db->query($query);

        if($result && $db->affected_rows() === 1){
            //sucess
            $session->msg('s',"Supplier has been updated! ");
            redirect('edit_supplier.php?id='.(int)$supplier['id'], false);
          } else {
            //failed
            $session->msg('d',' Sorry failed to update!');
            redirect('edit_supplier.php?id='.(int)$supplier['id'], false);
          }
     } else {
       $session->msg("d", $errors);
      redirect('edit_supplier.php?id='.(int)$supplier['id'], false);
     }
   }
  ?>

<?php include_once('layouts/header.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Edit Supplier</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="edit_supplier.php?id=<?php echo (int)$supplier['id'];?>" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Supplier Name</label>
              <input type="text" class="form-control" name="ssname" value="<?php echo remove_junk(ucwords($supplier['sname'])); ?>">
        </div>
        <div class="form-group">
              <label for="address" class="control-label">Supplier Address</label>
              <input type="text" class="form-control" name="ssaddress" value="<?php echo remove_junk(ucwords($supplier['saddress'])); ?>">
        </div>
        <div class="form-group">
              <label for="dealer" class="control-label">Dealer Name</label>
              <input type="text" class="form-control" name="ssdealer" value="<?php echo remove_junk(ucwords($supplier['sdealer'])); ?>">
        </div>
       
        <div class="form-group clearfix">
                <button type="submit" name="update_supplier" class="btn btn-info">Update</button>
        </div>
    </form>
</div>

<?php include_once('layouts/footer.php'); ?>
