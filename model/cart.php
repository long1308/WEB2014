<?php
include_once 'pdo.php';
function cart_select_all($idUser)
{
    $sql = "SELECT * FROM cart WHERE idUser=$idUser ORDER BY id DESC";
    return pdo_query($sql);
}
function cart_select_by_idUser($idUser)
{
    $sql = "SELECT * FROM carts WHERE idUser=$idUser ORDER BY id DESC";
    return pdo_query($sql);
}
function cart_select_alls()
{
    $sql = "SELECT * FROM cart";
    return pdo_query($sql);
}
function cart_insert($idUser, $idProduct, $quantity)
{
    $sql = "INSERT INTO carts(idUser, idProduct, quantity) VALUES('$idUser', '$idProduct', '$quantity')";
    pdo_execute($sql);
}
function cart_delete($idCart, $idUser)
{
    $sql = "DELETE FROM carts WHERE id=$idCart AND idUser=$idUser";
    pdo_execute($sql);
}
function cart_select_by_id($idProduct, $idUser)
{
    $sql = "SELECT * FROM carts WHERE idProduct=$idProduct AND idUser=$idUser";
    return pdo_query_one($sql);
}
function cart_update($id, $quantity)
{
    $sql = "UPDATE carts SET quantity='$quantity' WHERE id=$id";
    pdo_execute($sql);
}
