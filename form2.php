<?php include "head.php";  ?>

<form method="post" action="index.php?a=2">
	<input  name="a" value="2" style="display:none">
	<input type="hidden" name="id" value="<?= !empty($record['id']) ? $record['id'] : '' ?>">
	Название: <input type="text" value="<?= !empty($record['p_name']) ? $record['p_name'] : '' ?>" name="p_name"><br>
	Широта:  <input type="text" value="<?= !empty($record['lat']) ? $record['lat'] : '' ?>" name="lat"><br>
	Долгота: <input type="text" value="<?= !empty($record['lng']) ? $record['lng'] : '' ?>" name="lng"><br>
	Иконка: <input type="text" value="<?= !empty($record['icon_link']) ? $record['icon_link'] : '' ?>" name="icon_link"><br>
	Контент: <textarea name="content"><?= !empty($record['content']) ? $record['content'] : '' ?></textarea><br>
	Описание: <input type="text" value="<?= !empty($record['about']) ? $record['about'] : '' ?>" name="about"><br>
	Картинка: <input type="text" value="<?= !empty($record['image']) ? $record['image'] : '' ?>" name="image"><br>
	<br>
	<input class="btn btn-primary" type="submit" value="Save">
	<input class="btn btn-default" type="reset" value="Reset">
</form>

