<?php
  $page_title = 'All Employee';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $empp = find_all('employee');
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Employees</span>
     </strong>
       <a href="add_employee.php" class="btn btn-info pull-right btn-sm"> Add New Employee</a>
    </div>
    </br>

    <div class="panel-body">
          <form method="post" action="search-by-address.php">
             <button type="submit" name="search" class="btn btn-primary">Search </button>
         </form>
         </div>
       </div>
     </div>
        </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>First Name</th>
            <th class="text-center" style="width: 20%;">Last Name</th>
            <th class="text-center" style="width: 15%;">Address</th>
            <th class="text-center" style="width: 15%;">Salary</th>
            <th class="text-center" style="width: 100px;">User Id</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($empp as $a_emp): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_emp['first_name']))?></td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_emp['last_name']))?>
           </td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_emp['address']))?>
           </td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_emp['salary']))?>
           </td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_emp['uid']))?>
           </td>
           <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_employee.php?id=<?php echo (int)$a_emp['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_employee.php?id=<?php echo (int)$a_emp['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>

          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>