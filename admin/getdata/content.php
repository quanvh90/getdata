<?php
//if(full_path() != URL_HOME.'index.php') {
//    require('../config/connect.php');
//}
class Content{
    public static function checkAlias($str){
        $sql = "SELECT id FROM content WHERE alias = '$str'";
        $result = mysql_query($sql);
        $id = 0;
        while($row = mysql_fetch_array($result)){
            $id = $row['id'];
        }
        if($id == 0) return array('state'=>false, 'id'=>$id);
        else{
            return array('state'=>true, 'id'=>$id);
        }
    }

    public static function insertContent($input){

        if(isset($input['category_id'])) $category_id = $input['category_id'];
        else $category_id = 0;

        if(isset($input['title'])) $title = $input['title'];
        else $title = '';

        if(isset($input['alias'])) $alias = $input['alias'];
        else $alias = '';

        if(isset($input['introtext'])) $introtext = $input['introtext'];
        else $introtext = '';

        if(isset($input['content'])) $fulltext = $input['content'];
        else $fulltext = '';

        if(isset($input['description'])) $metadesc = $input['description'];
        else $metadesc = '';

        if(isset($input['keyword'])) $metakey = $input['keyword'];
        else $metakey = '';

        if(isset($input['state'])) $state = $input['state'];
        else $state = 0;

        if(isset($input['created_date'])) $created = $input['created_date'];
        else $created = strtotime('now');

        if(isset($input['updated_date'])) $publish_up = $input['updated_date'];
        else $publish_up = strtotime('now');

        $sql_str = "INSERT INTO content (category_id,title, alias, introtext, content, description, keyword, state, created_date, updated_date) VALUES ( '$category_id', '$title', '$alias', '$introtext', '$fulltext', '$metadesc', '$metakey', '$state', '$created', '$publish_up')";
        try{
            $result = mysql_query($sql_str);
            return $result;
        }catch (Exception $e){
            return false;
        }
    }

    public static function updateContent($input = array()){

        if(isset($input['category_id'])) $category_id = $input['category_id'];
        else $category_id = 0;



        $sql = "UPDATE content ";
        $sql = $sql."SET category_id='$category_id'";

        if(isset($input['title'])) {
            $title = $input['title'];
            $sql .= ", title='$title'";
        }

        if(isset($input['alias'])) {
            $alias = $input['alias'];
            $sql .= ", alias='$alias'";
        }

        if(isset($input['introtext'])) {
            $introtext = $input['introtext'];
            $sql .= ", introtext='$introtext'";
        }

        if(isset($input['content'])) {
            $fulltext = $input['content'];
            $sql .= ", content='$fulltext'";
        }

        if(isset($input['description'])) {
            $metadesc = $input['description'];
            $sql .= ", description='$metadesc'";
        }

        if(isset($input['keyword'])) {
            $metakey = $input['keyword'];
            $sql .= ", keyword='$metakey'";
        }

        if(isset($input['state'])) {
            $state = $input['state'];
            $sql .= ", state='$state'";
        }

        try{
            $id = $input['id'];
            $publish_up = date('Y-m-d H:i:s');
            $sql .= ", updated_date='$publish_up' WHERE id=$id";
            return mysql_query($sql);
        }catch (Exception $e){
            return 'error id';
        }
    }
}
?>