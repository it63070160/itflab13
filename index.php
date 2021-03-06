<html>
  <head>
    <title>All Comments</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> <!-- Datatable -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script> <!-- Edit Icon -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php
    $conn = mysqli_init();
    mysqli_real_connect($conn, 'itflab13.mysql.database.azure.com', 'it63070160@itflab13', 'ITFlab13', 'itflab', 3306);
    if (mysqli_connect_errno($conn))
    {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
    }
    $res = mysqli_query($conn, 'SELECT * FROM guestbook');
    ?>
    <div class="container">
    <div class="display-3 text-center mt-3">Comments Table</div>
    <div class="text-left mb-2"><a href="form.html" class="btn btn-success"><i class="fa fa-plus"></i></a></div>
    <table id="commentTable" class="display table table-stripped table-bordered table-hover mt-5" style="width: 100%;">
      <thead class="thead-dark">
        <tr>
          <th width="20"> <div align="center">#</div></th>
          <th width="100"> <div align="center">Name</div></th>
          <th width="350"> <div align="center">Comment </div></th>
          <th width="100"> <div align="center">Action </div></th>
        </tr>
      </thead>
      <?php
      while($Result = mysqli_fetch_array($res))
      {
      ?>
        <tr>
          <td><div class="text-center"><?php echo $Result['ID'];?></td></div>
          <td><div class="text-center"><?php echo $Result['Name'];?></td></div>
          <td><div class="text-center"><?php echo $Result['Comment'];?></td></div>
          <td><div class="text-center"><a href="delete.php?delete_id=<?php echo $Result['ID']; ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a> <a href="update.php?edit_id=<?php echo $Result["ID"]; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a></div></td>
        </tr>
      <?php
      }
      ?>
    </table>
    <script>
        $(document).ready(function () {
            $("#commentTable").DataTable();
        });
    </script>
    </div>
    <?php
    mysqli_close($conn);
    ?>
  </body>
</html>
