<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2017/8/18
 * Time: 下午 04:05
 */
$conn = new mysqli("localhost", "root", "12345678", "db06");
$sql = "select * from footer;";
$result = $conn->query($sql);
$result_all = $result->fetch_all();
for($i=0; $i<count($result_all);$i++){
    for($j=0;$j<count($result_all[$i]);$j++){
        echo $result_all[$i][$j]."&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo "<br>";
}
?>
<script type="text/javascript" src="home_files/jquery-1.9.1.min.js"></script>

<input id="test" value="<?php $result_all[0][1];?>">
<button id="bt"></button>
