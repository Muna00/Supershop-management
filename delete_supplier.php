<?php
  require_once('includes/load.php');
 
  page_require_level(1);
?>
<?php
  $supplier = find_by_id('supplier',(int)$_GET['id']);
  if(!$supplier){
    $session->msg("d","Missing Supplier Id.");
    redirect('supplier.php');
  }
?>
<?php
  $delete_id = delete_by_id('supplier',(int)$supplier['id']);
  if($delete_id){
      $session->msg("s","Supplier deleted.");
      redirect('supplier.php');
  } else {
      $session->msg("d","Supplier deletion failed.");
      redirect('supplier.php');
  }
?>