<?php include_once('header.php'); ?>
<?php 
  $id = $_GET['id'];
  $sql = "select * from users where id='" . $id . "'";
  $objDB->setQuery($sql);
  $result = $objDB->selectOne();
  print_r($result);
?>
  <h1>Edit User</h1>
 
<form action="save.php" method="post">
  <div class="container">
    <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
    <label for="">First Name : </label>
    <input type="text" placeholder="Enter First Name" name="first_name" value="<?php echo $result['first_name']; ?>" required>
    <label for="">Last Name : </label>
    <input type="text" placeholder="Enter Last Name" name="last_name" value="<?php echo $result['last_name']; ?>" required>
    <label for="">Email : </label>
    <input type="email" placeholder="Enter Email" name="email" value="<?php echo $result['email']; ?>" required>
    <label for="">Phone Number : </label>
    <input type="text" placeholder="Enter Phone Number" name="phone" value="<?php echo $result['phone']; ?>" required>
    <button type="submit" name="submit" value="submit">Save</button>
  </div>
</form>
</body>
</html>