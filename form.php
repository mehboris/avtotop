<?php include "head.php";  ?>

<form method="post" action="index.php?a=1">
	<input  name="a" value="1" style="display:none">
	<input type="hidden" name="id" value="<?= !empty($record['id']) ? $record['id'] : '' ?>">
	Title: <input type="text" value="<?= !empty($record['title']) ? $record['title'] : '' ?>" name="title"><br>
	Body: <textarea name="body"><?= !empty($record['body']) ? $record['body'] : '' ?></textarea><br>
	Link: <input type="text" value="<?= !empty($record['link']) ? $record['link'] : '' ?>" name="link"><br>
	<br>
	<input class="btn btn-primary" type="submit" value="Save">
	<input class="btn btn-default" type="reset" value="Reset">
</form>