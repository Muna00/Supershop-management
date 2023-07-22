<?php
  require_once('includes/load.php');
  
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
  $delete_id = delete_by_id('employee',(int)$employees['id']);
  if($delete_id){
      $session->msg("s","Employee deleted.");
      redirect('employee.php');
  } else {
      $session->msg("d","Employee deletion failed.");
      redirect('employee.php');
  }
?>