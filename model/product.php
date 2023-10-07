<?php
require_once 'pdo.php';
//add 
function products_insert($name, $price, $image, $price_sale, $hot_sale, $description, $categoryId)
{
    $sql = "INSERT INTO products(name, price, image, price_sale,hot_sale, description,categoryId) VALUES ('$name', '$price', '$image', '$price_sale','$hot_sale', '$description','$categoryId')";
    pdo_execute($sql);
}

function products_update($id, $name, $price, $image, $price_sale, $hot_sale, $description, $categoryId)
{
    if ($image != '') {
        $sql = "UPDATE products SET name='$name',price='$price',image='$image',price_sale='$price_sale',hot_sale='$hot_sale',description='$description',categoryId='$categoryId' WHERE id=$id";
    } else {
        $sql = "UPDATE products SET name='$name',price='$price',price_sale='$price_sale',hot_sale='$hot_sale',description='$description',categoryId='$categoryId' WHERE id=$id";
    }
    pdo_execute($sql);
}

function products_delete($id)
{

    if (is_array($id)) {
        foreach ($id as $ma) {
            $sql = "DELETE FROM products WHERE  id=$ma";
            pdo_execute($sql);
        }
    } else {
        $sql = "DELETE FROM products WHERE  id=$id";
        pdo_execute($sql);
    }
}

function products_select_all($search = "", $categoryId = 0)
{
    $sql = "SELECT * FROM products";

    // Check if a search term is provided
    if (!empty($search)) {
        $sql .= " WHERE name LIKE '%$search%'";
    }

    // Check if a categoryId is provided
    if (!empty($categoryId)) {
        // Use AND or WHERE based on your requirements
        if (!empty($search)) {
            $sql .= " AND categoryId = $categoryId";
        } else {
            $sql .= " WHERE categoryId = $categoryId";
        }
    }

    $sql .= " ORDER BY id DESC";

    return pdo_query($sql);
}


function products_select_by_id($id)
{
    $sql = "SELECT * FROM products WHERE id=$id";
    return pdo_query_one($sql);
}

function products_increase_views($id)
{
    $sql = "UPDATE products SET view = view + 1 WHERE id=$id";
    pdo_execute($sql);
}
function products_select_top10()
{
    $sql = "SELECT * FROM products ORDER BY view DESC LIMIT 10";
    return pdo_query($sql);
}
