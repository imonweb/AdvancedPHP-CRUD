<?php include_once('header.php'); ?>
<?php 
  $sql = "select * from users";
  $objDB->setQuery($sql);
  $result = $objDB->select();
  print_r($result);
?>
  <div class="container">
    <?php 
      if(isset( $_SESSION['success_msg']) && !empty($_SESSION['success_msg'] )){ ?>
        <h2><?php echo $_SESSION['success_msg']; ?> </h2>
        <?php $_SESSION['success_msg'] == ""; 
      }
    ?>
    <table>
      <tr>
        <th>Sr No.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
      <?php 
        $i = 1;
        foreach($result as $res) { 
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $res['first_name']; ?></td>
        <td><?php echo $res['last_name']; ?></td>
        <td><?php echo $res['email']; ?></td>
        <td><?php echo $res['phone']; ?></td>
        <td><a href="edit.php?id=<?php echo $res['id']; ?>">Edit</a> | <a href="save.php?action=delete&id=<?php echo $res['id']; ?>">Delete</a></td>
      </tr>
      <?php $i++; } ?>
      <!-- <tr>
        <td>2</td>
        <td>Josh</td>
        <td>Doe</td>
        <td>josh@gmail.com</td>
        <td>4444-111-222</td>
        <td><a href="edit.php">Edit</a> | <a href="#">Delete</a></td>
      </tr>
      <tr>
        <td>3</td>
        <td>John</td>
        <td>Doe</td>
        <td>john@gmail.com</td>
        <td>4444-333-222</td>
        <td><a href="edit.php">Edit</a> | <a href="#">Delete</a></td>
      </tr> -->
    </table>
  </div> <!--========= container ==========-->
</body>
</html>