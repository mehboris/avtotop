<?php if (!loadUser()) : ?>
<form action="login.php" method="post" class="form-inline text-right">
   <div class="form-group <?= !empty($_SESSION['error']) ? 'has-error' : ''; ?>">

    <label class="sr-only" for="exampleInputEmail3">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
    
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Log In</button>
</form>
<?php else: ?>
  <form action="login.php" class="form-inline text-right">
    <ul class="user" type="none">
      <li style="display:inline"><a class="user menu_a" href="#"><?= $_SESSION['user']['name'] ?></a></li>
      <li style="display:inline"><a class="btn btn-default" href="logout.php"> Log Out </a></li>
    </ul>
  </form>
<?php endif; ?>


