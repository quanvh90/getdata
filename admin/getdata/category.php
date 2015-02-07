<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 2/6/2015
 * Time: 4:27 PM
 */
class Category{
    public static function getAlias($category_id){
        $sql = "SELECT alias FROM category WHERE id = $category_id";
        try{
            $result = mysql_query($sql);
            $category_name = mysql_fetch_row($result);
            $category_name = $category_name[0];
            return $category_name;
        }catch (Exception $e){
            print "<pre>";print_r($e);print "</pre>";exit;
        }
    }
}
?>