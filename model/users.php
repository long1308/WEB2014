<?php
require_once 'pdo.php';

function users_insert($name, $image, $username, $password, $role)
{
    $sql = "INSERT INTO users(name,image, username, password, role) VALUES ('$name','$image','$username', '$password', '$role')";
    pdo_execute($sql);
}
function check_user($username, $password)
{
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    return pdo_query_one($sql);
}

function users_update($id, $name, $image,  $username, $password, $role)
{
    if ($image != '') {
        $sql = "UPDATE users SET name='$name', image='$image', username='$username', password='$password', role='$role' WHERE id=$id";
    } else {
        $sql = "UPDATE users SET name='$name', username='$username', password='$password', role='$role' WHERE id=$id";
    }
    pdo_execute($sql);
}

function users_delete($id)
{
    if (is_array($id)) {
        foreach ($id as $ma) {
            $sql = "DELETE FROM users  WHERE id=$ma";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM users  WHERE id=$id";
        pdo_execute($sql);
    }
}

function users_select_all()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

function users_select_by_id($id)
{
    $sql = "SELECT * FROM users WHERE id=$id";
    return pdo_query_one($sql);
}
