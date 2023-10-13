<?php
require_once 'pdo.php';
function comment_select_all($idProduct)
{
    $sql = "SELECT * FROM comments WHERE idProduct=$idProduct";
    return pdo_query($sql);
}
function comment_select_alls()
{
    $sql = "SELECT * FROM comments";
    return pdo_query($sql);
}
function comment_insert($idProduct, $idUser, $content)
{
    $sql = "INSERT INTO comments(idProduct, idUser, content) VALUES('$idProduct', '$idUser', '$content')";
    pdo_execute($sql);
}
function comment_delete($id)
{
    if (is_array($id)) {
        foreach ($id as $ma) {
            $sql = "DELETE FROM comments WHERE id=$ma";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM comments WHERE id=$id";
        pdo_execute($sql);
    }
}
function comment_select_by_id($id)
{
    $sql = "SELECT * FROM comment WHERE id=?";
    return pdo_query_one($sql, $id);
}
function comment_update($id, $idProduct, $idUser, $content)
{
    $sql = "UPDATE comment SET idProduct=?, idUser=?, content=? WHERE id=?";
    pdo_execute($sql, $idProduct, $idUser, $content, $id);
}
function comment_exist($id)
{
    $sql = "SELECT count(*) FROM comment WHERE id=?";
    return pdo_query_value($sql, $id) > 0;
}