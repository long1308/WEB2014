<?php
require_once 'pdo.php';
//add category
function category_insert($category){
    $sql = "INSERT INTO categorys(name) VALUES('$category')"; 
    pdo_execute($sql);
}
//update category
function category_edit($id, $category){
    $sql = "UPDATE categorys SET name = '$category' WHERE id = $id";
    pdo_execute($sql);
}
// delete
function category_delete($id){
    if(is_array($id)){
        foreach ($id as $ma) {
            $sql = "DELETE FROM categorys WHERE id = $ma";
            pdo_execute($sql);
        }
    }
    else{
        $sql = "DELETE FROM categorys WHERE id = $id";
        pdo_execute($sql);
    }
}
//get all category desc giảm dần
function category_select_all(){
    $sql = "SELECT * FROM categorys ORDER BY id DESC";
    return pdo_query($sql);
}
//get one category_insert
function category_select_by_id($id){
    $sql = "SELECT * FROM categorys WHERE id = $id";
    return pdo_query_one($sql);
}