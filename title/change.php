<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/18
 * Time: 下午 01:48
 */
 if(isset($_POST['t_seq']))
 {
     $t_seq=$_POST['t_seq'];
 }

$conn = new mysqli("localhost", "root", "12345678", "db06");
if($conn->connect_error)
{
    die("failed:" . $conn->connect_error);
}

if(isset($_FILES['pic']['name']))
{
    $sql = "select * from titles where t_del=0 and t_seq=".$t_seq;
    $result = $conn->query($sql);
    $result_all = $result->fetch_all();
    copy($_FILES['pic']['tmp_name'], "images/".$result_all[0][1]);
//    echo"<script>self.location.href='admin.php?do=admin&redo=title';</script>";
}
?>
<p class="t cent botli">新增標題區圖片</p>
        <form method="POST" enctype="multipart/form-data" name="form" action="admin.php?do=admin&redo=title_change">
          <table width="464" border="0">
          <tr>            </tr>
          </table>
          <p>
  <label for="new"></label>新增標題區圖片：
          <label for="pic"></label>
          <input type="file" name="pic" id="pic"/>
          </p>
          <table style="margin-top:40px; width:70%;">
            <tbody>
              <tr>
                <td width="200px"></td>
                <td class="cent"><input type="submit" value="修改">
                  <input type="reset" value="重置">
                  <input name="hiddenField" type="hidden" id="hiddenField" value="" /></td>
              </tr>
            </tbody>
          </table>
          <input type="hidden" name="MM_insert" value="form" />
</form>