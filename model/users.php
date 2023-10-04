<?php
require_once 'pdo.php';

function users_insert( $name, $username, $password, $role){
    $sql = "INSERT INTO users(name, username, password, role) VALUES ('$name', '$username', '$password', '$role')";
    pdo_execute($sql);
}
function check_user($username, $password){
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    return pdo_query_one($sql);
}

function users_update($id, $name, $username, $password, $role){
    $sql = "UPDATE users SET name='$name', username='$username', password='$password', role='$role' WHERE id=$id";
    pdo_execute($sql);
}

function users_delete($id){
    if(is_array($id)){
        foreach ($id as $ma) {
            $sql = "DELETE FROM users  WHERE id=$ma";
            pdo_execute($sql);
        }
    }
    else{
        $sql = "DELETE FROM users  WHERE id=$id";
        pdo_execute($sql);
    }
}

function users_select_all(){
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

function users_select_by_id($id){
    $sql = "SELECT * FROM users WHERE id=$id";
    return pdo_query_one($sql);
}

function users_exist($ma_kh){
    $sql = "SELECT count(*) FROM users WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function users_select_by_role($vai_tro){
    $sql = "SELECT * FROM users WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}

function users_change_password($ma_kh, $mat_khau_moi){
    $sql = "UPDATE users SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}