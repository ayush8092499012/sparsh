<?php
function fetchProgrammingLanguages($db)
{
    $stmt = $db->prepare("SELECT * FROM programming_languages WHERE status = 1 AND is_deleted = 0");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>