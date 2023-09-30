<?php
include 'connect.php' ;
session_start();
if ($_SESSION['log'] == '')
{
    header("location:adminindex.php");
}
include 'adminheader.php';

?>
 <!DOCTYPE html>  
 <html>  
 <link rel='stylesheet' href='index.css'>

<style>

table#data {
    font-size:16px;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
}

#data td, #data th {
    border: 1px solid #ddd;
    text-align: left;
    padding: 8px;
}

#data tr:nth-child(even){background-color: #f2f2f2}

#data th {
    padding-top: 11px;
    padding-bottom: 11px;
    background-color: black;
    color: white;
}

</style>

      <head>  
           
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
             
           <div class="container">  
                <h3 align="center">TEACHER'S DETAILS</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>
                                    <th>  T_ID  </th>
                                    <th> Name </th>
                                  
                                    <th> Contact Number </th>
                                    <th> Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                               </tr>  
                          </thead>  
                          <tbody>
  <?php 
   $result = mysqli_query($conn , "select * From teachers");
  while ($row = mysqli_fetch_assoc($result)): 
    
  ?>
  <tr>
    
    <td><?php echo $row['T_id']; ?></td>
    <td><?php echo $row['Name']; ?></td>

    <td><?php echo $row['Contact Number']; ?></td>
    <td><?php echo $row['Email']; ?></td>
     <td><?php echo "<a href = 'update_teacher.php?teacher_id={$row['T_id']}'> Edit</a>"; ?></td>
      <td><?php echo "<a href = 'delete_teacher.php?teacher_id={$row['T_id']}'> Delete</a>"; ?></td>
   
    </tr>
  
  <?php endwhile; ?>

    
</tbody>

                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#data').DataTable({
        "order": [[ 1, "desc" ]]
    } );
} ); 
 </script>  


<table align='center'>
<tr><!--<td><a href='pay.php'><button>Proceed</button></a></td>-->
  
  <td><a href="add_teacher.php"> <button style="background-color:black; font-family:'Arial';">Add Teacher</button></a></td>
 </tr> 