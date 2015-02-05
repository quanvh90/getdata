<?php
include_once("begin.php");
if(isset($_GET['id']))$id=$_GET['id'];
$re = mysql_query("SELECT * FROM content where id=$id" );
if(!$re) echo '<h2>sai cau lenh sql</h2>';
else{
    while($row=mysql_fetch_assoc($re)){
?>
    <h1>Sửa bài viết</h1>
    <form action="" method="post" enctype="multipart/form-data" name="form1" >
    <input type="hidden" name="id" id="id" value="<?php echo $row["id"]; ?>" />
      <table width="50%" border="0" cellspacing="10" cellpadding="10" class="tbsua">
        <tr>
          <td>Tiêu đề</td>
          <td><input type="text" name="title" id="title" value="<?php echo $row["title"]; ?>" size="100"></td>
        </tr>
            <tr>
          <td width="131">Category</td>
          <td width="218">
            <select name="category">
                <?php
                $sql_section = "SELECT id, category_id FROM content WHERE id= $id ";
                $result_section = mysql_query ($sql_section);
                $row_section = mysql_fetch_row($result_section);
                $category_id = $row_section[1];

                $sql_category = "SELECT id, name FROM category WHERE id= $category_id ";
                $result_category = mysql_query($sql_category);
                $row_category = mysql_fetch_row($result_category);
                $category_name = $row_category[1];
                ?>
                <?php if(isset($category_id)){ ?>
                <option value="<?php if(isset($category_id)) echo $category_id?>"><?php echo $category_name; ?></option>
                <?php }else{ ?>
                <option value="0">&lt;Select&gt;</option>
                <?php } ?>

                <?php
                $sql_category = "SELECT id, name FROM category WHERE id != $category_id ";
                $result_category = mysql_query($sql_category);
                while($row_category = mysql_fetch_row($result_category)){
                ?>
                    <option value="<?php if(isset($row_category)) echo $row_category[0]?>"><?php echo $row_category[1]; ?></option>
                <?php }
                ?>
            </select></td>
        <tr>
          <td width="232"><label>Published
          </label></td>
          <td>

        <label>
          <input name="stateU" type="radio" id="rdt" value="0" <?php if($row['state']==0){ ?> checked <?php } ?> />
          Khóa</label>
        <label>
        <input type="radio" name="stateU" value="1" id="rdt1"<?php if($row['state']==1) { ?> checked <?php } ?>/>
          Hoạt động
        </label>
          </td>
         </tr>
        </tr>


        <tr>
          <td>Alias</td>
          <td><input type="text" name="alias" id="alias" value="<?php echo $row["alias"]; ?>" size="100" readonly></td>
        </tr>

        <tr>
          <td>Introtext</td>
          <td><textarea name="introtext" id="introtext"  class="mrk" cols="45" rows="5"><?php echo $row["introtext"]; ?></textarea></td>
        </tr>

        <tr>
          <td>Fulltext</td>
          <td><textarea name="fulltext" id="fulltext" class="mrk" cols="45" rows="5"><?php echo $row["content"]; ?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnadd" id="btnadd" value="Lưu lại"></td>
        </tr>

      </table>
    </form>
<?php }?>      
<?php
			}
include_once("end.html");
?>
<script type="text/javascript">
    var editor;

    function createEditor( languageCode ) {
        if ( editor )
            editor.destroy();

        // Replace the <textarea id="editor"> with an CKEditor
        // instance, using default configurations.
        editor = CKEDITOR.replace( 'fulltext');

        editor = CKEDITOR.replace( 'introtext');
    }

    // At page startup, load the default language:
    createEditor( '' );
</script>