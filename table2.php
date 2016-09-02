<?php include "head.php";  ?>
<?php include "header.php";  ?>


<?php if (loadUser()) : ?>
<br>
<a class="btn btn-success" href="?action=create2"> Create </a>
<a class="btn btn-success" href="?action=table1"> table1 </a>
<a class="btn btn-success" href="?action=table2" style="border:red"> table2 </a>

<table class="table table-bordered table-condensed table-striped">
  <tr>
  	<th>ID</th>
  	<th>Название</th>
  	<th>Широта</th>
  	<th>Долгота</th>
  	<th>Иконка</th>
    <th>Контент</th>
    <th>Описание</th>
    <th>Картинка</th>
  	<th>&nbsp;</th>
  </tr>

<?php foreach ($result as $row) : ?>

  <tr>
  	<td><?= $row['id'] ?></td>
  	<td><?= $row['p_name'] ?></td>  	
  	<td><?= $row['lat'] ?></td>  	
  	<td><?= $row['lng'] ?></td>  	
  	<td><?= $row['icon_link'] ?></td>  	
    <td> <?= $row['content'] ?> </td>
    <td><?= $row['about'] ?></td>
    <td><?= $row['image'] ?></td>   
  	<td>
      <?php if (loadUser()) : ?>
      <a class="btn btn-primary" href="?action=update2&id=<?= $row['id'] ?>"> Edit </a>
      <a class="btn btn-danger" onclick="return confirm('Really delete?');" href="?action=delete2&id=<?= $row['id'] ?>"> Remove</a>
      <?php endif; ?>
    </td>
  </tr>

<?php endforeach; ?>

</table>
<?php endif; ?>
<?php include "foot.php"; ?>