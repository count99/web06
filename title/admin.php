<?php require_once('Connections/db06.php'); ?>
<?php
$rad=array(); 
$del=array();

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

mysql_select_db($database_db06, $db06);
$query_Recordset1 = "SELECT * FROM titles WHERE t_del = 0";
$Recordset1 = mysql_query($query_Recordset1, $db06) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);


?>
<p class="t cent botli">網站標題管理</p>
<form name="form" method="POST">
    <table width="100%">
      <tr class="yel">
        <td>網站標題</td>
        <td>替代文字</td>
        <td>顯示</td>
        <td>刪除</td>
        <td></td>
      </tr>
    	<tbody>
        
    	  <?php 
		  $index=0;
		  do { ?>
   	      <tr>
   	        <td width="45%" align="center"><input type="hidden" name="hiddenField[]" id="hiddenField" value="<?php echo $row_Recordset1['t_seq']; ?>"/>
                <img src="<?php echo "images/".$row_Recordset1['t_til']; ?>" alt="<?php echo $row_Recordset1['t_sub']; ?>" width="120px"></td>
   	        <td width="23%" align="center"><label for="sub"></label>
            <input type="text" name="sub[]" id="sub" value="<?php echo $row_Recordset1['t_sub']; ?>"></td>
   	        <td width="7%" align="center"><input <?php if (!(strcmp($row_Recordset1['t_view'],1))) {echo "checked";}?> name="rad[]" type="radio" id="<?php echo $index;?>" value="<?php echo $index;?>">
            <label for="view"></label></td>
   	        <td width="7%" align="center"><input <?php if (!(strcmp($row_Recordset1['t_del'],1))) {echo "checked=\"checked\"";}?> name="del[]" type="checkbox" id="del" value="1">
            <?php
                $del[$index]=0;
				$rad[$index]=0;
				$index++;
				?>
            <label for="del"></label></td>
   	        <td align="center">
                <button formmethod="POST" name="t_seq" formaction="admin.php?do=admin&redo=title_change" value="<?php echo $row_Recordset1['t_seq'];?>" onclick="self.location.href='admin.php?do=admin&redo=title_change'">更新圖片</button></td>
  	      </tr>
    	    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </tbody></table>
           <table style="margin-top:40px; width:70%;">
     <tbody><tr>
      <td width="200px"><input type="button" onclick="self.location.href='admin.php?do=admin&redo=title_add'" value="新增網站標題圖片"></td><td class="cent"><input type="submit" value="修改確定" name="submit"><input type="reset" value="重置"></td>
     </tr>
    </tbody></table> 
    <input type="hidden" name="MM_update" value="form" />
</form>
<?php
if(isset($_POST['rad']))
{
  $rad_ind=$_POST['rad'][0];
  $rad[$rad_ind]=1;
}
if(isset($_POST['del'])){$_POST['del']=$_POST['del']+$del;}else{$_POST['del']=$del;}


if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
	for($i=0; $i<count($_POST['hiddenField']);$i++){
          $updateSQL = "UPDATE titles SET t_sub='".$_POST['sub'][$i]."', t_view='".$rad[$i]."', t_del='".$_POST['del'][$i]."' WHERE t_seq='".$_POST['hiddenField'][$i]."'";
          mysql_select_db($database_db06, $db06);
          $Result1 = mysql_query($updateSQL, $db06) or die(mysql_error());
    }
    echo"<script>self.location.href='admin.php?do=admin&redo=title';</script>";
//    header("Location:admin.php?do=admin&redo=title");
}

?>