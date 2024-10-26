<?php
function registerUser($firstName, $lastName, $email, $password, $db)
{
    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement
    $stmt = $db->prepare("INSERT INTO candidates (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$firstName, $lastName, $email, $hashedPassword])) {       
        return $db->lastInsertId();
    }
}

function emailExists($email, $db)
{
    $stmt = $db->prepare("SELECT COUNT(*) FROM candidates WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}

function getUserByEmail($email, $db)
{
    $stmt = $db->prepare("SELECT candidate_id,firstname, lastname, email, password, status, is_deleted FROM candidates WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>