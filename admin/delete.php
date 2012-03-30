<?php

/**
  *To delete a page to open-data-app*
  *@package com.marysarsfield.open-data-app
  *copyright 2012
  *@author Mary Sarsfield <msarsfield@rogers.com>
  *@link http://msarsfield.github.com/open-data-app/
  *@license New BSD License <https://github.com/msarsfield/open-data-app/blob/master/copyright_license.txt>
  *version 1.0.0
  */


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

require_once '../includes/db.php';

$sql = $db->prepare('
	DELETE FROM gardens
	WHERE id = :id
	LIMIT 1
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);

$sql->execute();

header('Location: index.php');
exit;
