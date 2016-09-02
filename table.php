<?php include "head.php";  ?>
<?php include "header.php";  ?>


<?php if (loadUser()) : ?>
  <br>
<a class="btn btn-success" href="?action=create"> Create </a>
<a class="btn btn-success" href="?action=table1"> table1 </a>
<a class="btn btn-success" href="?action=table2"> table2 </a>

<table class="table table-bordered table-condensed table-striped">
  <tr>
  	<th>ID</th>
  	<th>Title</th>
  	<th>Body</th>
  	<th>Link</th>
  	<th>Date</th>
    <th>Author</th>
  	<th>&nbsp;</th>
  </tr>

<?php foreach ($result as $row) : ?>

  <tr>
  	<td><?= $row['id'] ?></td>
  	<td><?= $row['title'] ?></td>  	
  	<td><?= $row['body'] ?></td>  	
  	<td><?= $row['link'] ?></td>  	
  	<td><?= $row['created_date'] ?></td>  	
    <td><?= $row['userName'] ?></td>
  	<td>
      <?php if (loadUser()) : ?>
      <a class="btn btn-primary" href="?action=update&id=<?= $row['id'] ?>"> Edit </a>
      <a class="btn btn-danger" onclick="return confirm('Really delete?');" href="?action=delete&id=<?= $row['id'] ?>"> Remove</a>
      <?php endif; ?>
    </td>
  </tr>

<?php endforeach; ?>

</table>
<?php endif; ?>
<?php include "foot.php"; ?>