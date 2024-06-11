<?php

	require_once "admin/db.php";
	$title = "Users Page";
	

	$user_found_query = "SELECT * FROM users";
	$user_found = $dbcon->query($user_found_query);



?>
<html>
    <style>
        .abc{
            width:850px;
            height:50px;
        background-color:lightgreen;
        margin-top:40px;
        margin-left:300px;
        }
        #head{
            
        }
    </style>
    <body>
        <div class="abc">
            <h1 id="head">User List</h1>
                
        </div>

        <div class="card mb-4">
  <div class="card-header bg-success text-center"><h2>User List</h2></div>
  <div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Serail</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Status</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        $serial = 1;        
        foreach ($user_found as $row) {?>   


          <tr>
            <td><?=$serial++?></td>
            <td><?=$row['fname']?></td>
            <td><?=$row['email']?></td>
            <td><img src="image/users/<?=$row['photo']?>" alt="" width='50'></td>

            <!-- show status  -->

            <td><?=$row['status']==1?"<span class='bg-danger p-2'>deactive</span>":"<span class='bg-success p-2'>active</span>"?></td>

            <td>
                <?php

                // active button
                if($row['status']==1){ ?>
                    <a class="btn btn-sm btn-success" href="active.php?id=<?php echo base64_encode($row['id']); ?>" >active</a>
                <?php }else{ ?>

                <!-- deactive button -->

               <a class="btn btn-sm btn-danger" href="deactive.php?id=<?php echo base64_encode($row['id']); ?>" >deactive</a>
            <?php   } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
 
  </div>
                                    


    </body>
</html>