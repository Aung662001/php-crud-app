<?php
// $db = new PDO('mysql:dbname=localhost;dbname=project','root','',[
//     PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING,
//     PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
// ]);
// $sqlInsert = "INSERT INTO roles (name,value) VALUES (:name,:value)";
// $statement = $db->prepare($sqlInsert);
// $statement->execute([
//     ':name'=>'supervisor',
//     ':value'=>'999',
// ]);
// echo $db->lastInsertId();
//////////////////////////////////////////////
// $sql = "DELETE FROM roles WHERE id>3";
// $statement = $db->prepare($sql);
// $statement->execute();
 ///////////////////////////////////////////////
// $updateSql = "UPDATE roles SET name=:name where value='999'";
// $statement = $db->prepare($updateSql);
// $statement->execute([
//     ':name'=>"Hero",
// ]);
//////////////////////////////////////////////////
#$statement = $db->query("SELECT * FROM roles");
#$result = $statement->fetchAll();
#print_r ($result);
#echo $statement->rowCount();