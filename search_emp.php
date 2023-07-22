<?php
$page_title = 'Search Enployee';
$results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   //page_require_level(3);
?>
<?php
//   if(isset($_POST['submit'])){
//     $req_add = array('addr');
//     validate_fields($req_add);

    if(empty($errors)):
      $add   = remove_junk($db->escape($_POST['address']));
     
      $results      = find_employee($add);
    else:
      $session->msg("d", $errors);
      redirect('employee.php', false);
    endif;

   
//    else
//     {
//     $session->msg("d", "Select dates");
//     redirect('sales_report.php', false);
//   }
?>

<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Default Page Title</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .sale-head{
       margin: 40px 0;
       text-align: center;
     }.sale-head h1,.sale-head strong{
       padding: 10px 20px;
       display: block;
     }.sale-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
     }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.sale-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
</head>
<body>
  <?php if($results): ?>
    <div class="page-break">
       <div class="sale-head">
           <!-- <h1>Supershop Management System - Sales Report</h1> -->
            <!-- <strong><?php if(isset($add)){ echo $add;}?>  </strong>  -->
       </div>
      <table class="table table-border">
        <thead>
          <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>salary</th>
              <th>U_ID</th>
              
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $result): ?>
           <tr>
              <td class=""><?php echo remove_junk($result['first_name']);?></td>
              <td class="desc">
                <?php echo remove_junk(ucfirst($result['last_name']));?>
              </td>
              <td class="text-right"><?php echo remove_junk($result['address']);?></td>
              <td class="text-right"><?php echo remove_junk($result['salary']);?></td>
             
              <td class="text-right"><?php echo remove_junk($result['uid']);?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <!-- <tfoot>
         <tr class="text-right">
           <td colspan="4"></td>
           <td colspan="1">Grand Total</td>
           <td> $
           <?php //echo number_format(total_price($results)[0], 2);?>
          </td>
         </tr>
         <tr class="text-right">
           <td colspan="4"></td>
           <td colspan="1">Profit</td>
           <td> $<?php //echo number_format(total_price($results)[1], 2);?></td>
         </tr>
        </tfoot> -->
      </table>
    </div>
  <?php
    else:
        $session->msg("d", "Sorry no employee has been found. ");
        redirect('employee.php', false);
     endif;
  ?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
