<?php
require_once 'core/init.php';
include 'includes/head.php';
 include 'includes/navigate.php';
 include 'helpers.php';

 ?>
 <?php

 if (isset($_GET['restore']) && !empty($_GET['restore'])) {
   $res_id=(int)$_GET['restore'];
   $res_id=sanitize($res_id);
   $sql="UPDATE members set deleted = 0  WHERE id='$res_id'";
   $db->query($sql);
   header('Location: view.php');
 }
 if (isset($_GET['remove']) && !empty($_GET['remove'])) {
   $res_id=(int)$_GET['remove'];
   $res_id=sanitize($res_id);
   $sql="DELETE * FROM members  WHERE id='$res_id'";
   $db->query($sql);
   header('Location: view.php');
 }


  ?>
<div class="container">


 <h3 class="text-center top">Archived Members</h3>
 <a href="register.php" class="btn btn-primary pull-right" id="add-product-btn">Register New Member</a><div class="clearfix"></div>

 <div class="clearfix"></div>
 <hr>
 </div>
 <?php
   $display ="SELECT * FROM members WHERE deleted =1";
   $disp=$db->query($display);

  ?>

 <table class="table table-bordered table-condensed table-striped">
     <thead><th></th><th>ID</th><th>Firstname</th><th>Lastname</th><th>Date Of Birth</th><th>Gender</th><th>Occupation</th><th>Telephone</th><th>House Number</th><th>Adrress</th><th>Church leader</th><th>Generational Group</th><th>Intrest Group</th><th>Communicant</th></thead>
     <tbody>
       <?php while($view =mysqli_fetch_assoc($disp)): ?>
         <tr>
           <td>
             <a href="archived.php?restore=<?=$view['id'] ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
            <a href="archived.php?remove=<?=$view['id'] ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
           </td>
           <td><?=$view['id'] ?></td>
           <td><?=$view['firstname'] ?></td>
           <td><?=$view['lastname'] ?></td>
           <td><?=$view['bdate'] ?></td>
           <td><?=$view['gender'] ?></td>
           <td><?=$view['occupation'] ?></td>
           <td><?=$view['telephone'] ?></td>
           <td><?=$view['house'] ?></td>
           <td><?=$view['address'] ?></td>
           <td><?=$view['church_leader'] ?></td>
           <td><?=$view['gen_group'] ?></td>
           <td><?=$view['intrest_group'] ?></td>
           <td><?=$view['communicant'] ?></td>
         <?php endwhile; ?>
     </tbody>
 </table



 <?php include 'includes/footer.php'; ?>
