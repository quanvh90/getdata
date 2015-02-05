<?php
include_once("begin.php");
$re = mysql_query("SELECT id FROM content ORDER BY id DESC" );

$tv= new thuvien;

$tv->page=7;
$tv->link='index.php?prog=5&n=';
$tv->tong=mysql_num_rows($re);
$tv->numpage();

if(isset($_GET['n'])) $n=$_GET['n']; else $n=1;

$thutu=($n-1)*$tv->page;
$re=mysql_query("SELECT * FROM content LIMIT $thutu,$tv->page");

if(!$re) echo '<h2>sai cau lenh sql</h2>';
else{

    ?>

    <h1>Danh sách bài viết</h1>

    <table width="100%" border="1" cellspacing="3" cellpadding="3" class="csstable">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tiêu đề</th>

        <th scope="col">Alias</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Thao tác</th>
      </tr>
     <?php while($row=mysql_fetch_assoc($re)){ ?>
      <tr>
        <td><?php echo $row["id"]; ?></td>


        <td><a href="edit.php?&id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></a></td>

       <td><?php echo $row["alias"]; ?></td>
       <td><?php echo $row["created_date"]; ?></td>
       <td><?php if($row["state"]==1)echo 'Hoạt động'; else echo 'Khóa'; ?></td>

        <td><a href="edit.php?id=<?php echo $row["id"]; ?>">Sửa</a> | <a href="index.php?prog=5&act=xoa&id=<?php echo $row["id"]; ?>" onclick="return confirm('Ban co muon xoa?')">Xoá</a></td>

        <?php  }?>

      </tr>

    </table>
    <div class="page"><?php $tv->viewpage();?></div>
    <?php
    }

include_once("end.html");
?>

