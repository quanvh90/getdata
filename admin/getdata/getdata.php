<?php
$name = 'quanvh';
if($name==''){
	echo 'Mời bạn đăng nhập vào hệ thống!';
	?>
    <script type="text/javascript">
		setTimeout(function(){
            window.location.href= "<?php echo URL_HOME; ?>";
		},1200);
	</script>
    <?php
}else{
echo 'Xin chào : '.$name;
echo '<br />';
?>
<html>
<head>
	<title>Get Database</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
<!--
.error {color: #FF0000}
-->
    </style>

<!--<script src="tiny_mce/tiny_mce.js"></script>-->
<script type="text/javascript" src="libralies/ckeditor/ckeditor.js"></script>

</head>
<body>
<?php if(isset($error) && $error!='') {?><span class="error"> <?php echo $error; ?> </span> <?php } ?>
	<form action="" method="post">
  <table width="1024" border="0" align="center">
  <tr>
      <td>url</td>
      <td colspan="2"><input name="url" type="text" size="50"></td>
      <td width="425"><input name="getdata" type="submit" value="Get Data">
      <input type="submit" name="save" value="Save" /></td>
    </tr>
	<tr>
      <td width="131">Category</td>
      <td width="218">
        <select name="category">
                <option value="0">&lt;Select&gt;</option>
				<?php
                $sql_section = "SELECT id, name FROM category ORDER BY name ASC";
				$result_section = mysql_query ($sql_section);

                while($row = mysql_fetch_assoc($result_section)){?>
                        <option value="<?php if(isset($row)) echo $row['id'];?>"><?php if(isset($row)) echo $row['name']; ?></option>
				<?php } ?>
        </select></td>
      <td width="232"><label>Published
          <input type="checkbox" name="state" value="checkbox"/>
      </label></td>
      <td></td>
	</tr>
    <tr>
      <td width="131">Title</td>
      <td colspan="3">
        <input name="title" type="text" value='<?php if(isset($title)) echo $title ?>' size="50" />      </td>
    </tr>
	<tr>
      <td width="131">Alias</td>
      <td colspan="3">
        <input name="alias" type="text" value='<?php if(isset($alias)) echo $alias ?>' size="50" />      </td>
    </tr>
	
	<tr>
      <td>Introtext</td>
      <td colspan="3"><textarea name="introtext"  class="mrk"><?php if(isset($introtext)) echo $introtext?></textarea></td>
    </tr>
    <tr>
      <td>Content</td>
      <td colspan="3"><textarea name="fulltext" id="fulltext" class="mrk"><?php if(isset($fulltext)) echo $fulltext?></textarea></td>
    </tr>
	<tr>
      <td>Description</td>
      <td colspan="3"><textarea name="metadesc"><?php if(isset($metadesc)) echo $metadesc?></textarea></td>
    </tr>
	<tr>
      <td>Keywords</td>
      <td colspan="3"><textarea name="keywords"><?php if(isset($metakey)) echo $metakey?></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td colspan="2"><input name="created" type="hidden" value="<?php if(isset($created)) echo $created ?>" /></td>
      <td width="425"><input name="publish_up" type="hidden" value="<?php if(isset($created)) echo $created ?>" /></td>
    </tr>
  </table>
  </form>
<!--    Hệ thống có thể lấy tin từ các nguồn: <a href="http://dantri.com.vn">dantri.com.vn</a>, <a href="http://vnexpress.net">vnexpress.net</a>, <a href="http://24h.com.vn">24h.com.vn</a>, <a href="http://eva.vn">eva.vn</a>, <a href="http://ngoisao.net">ngoisao.net</a>, <a href="http://soha.vn">soha.vn</a>-->
    <br>
<?php }?>  

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
<body>
</html>