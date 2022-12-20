<?php include_once('header.php'); ?>
 
  <h1>Add User</h1>
 
<form action="save.php" method="post">
  <div class="container">
    <label for="">First Name : </label>
    <input type="text" placeholder="Enter First Name" name="first_name" required>
    <label for="">Last Name : </label>
    <input type="text" placeholder="Enter Last Name" name="last_name" required>
    <label for="">Email : </label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <label for="">Phone Number : </label>
    <input type="text" placeholder="Enter Phone Number" name="phone" required>
    <button type="submit" name="submit" value="submit">Save</button>
  </div>
</form>
</body>
</html>