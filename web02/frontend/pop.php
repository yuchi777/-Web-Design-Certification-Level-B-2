<div>
    目前位置: 首頁 > 人氣文章區 >
</div>


<table> 
    <tr>
        <td width="30%">標題</td>
        <td>內容</td>
        <td>人氣</td>
    </tr>

<?php
// 分頁
// 總筆數
$all = $News->count(['sh'=>1]);
// 幾筆為一頁
$div = 5;
// 分幾頁,無條件進位
$pages = ceil($all/$div);
// 現在頁數
$now = (isset($_GET['p']))?$_GET['p']:1;
//開始
$start = ($now-1)*$div;

// 全部有顯示的資料
$news = $News->all(['sh'=>1], "order by `pop` desc limit $start, $div");
foreach ($news as $n) {

?>
    <tr>
        <td class="clo"><?= $n['title']; ?></td>
        <!-- 字數控制 -->
        <td><?= mb_substr($n['title'], 0, 20); ?>...</td>
        <td></td>
        <td></td>
    </tr>

<?php
}
?>

</table>


<div>
    <?php

    if($now-1>0){
        echo "<a href='index.php?do=pop&p=".($now-1)."' style='font-size':20px>";
        echo " < ";
        echo "</a>";
    }
    
    for($i=1; $i<=$pages; $i++){
        $fontsize=($now==$i)?'26px':'18px';
        echo "<a href='index.php?do=pop&p=$i' style='font-size:$fontsize'>";
        echo "$i";
        echo "</a>";
    }

    if($now+1<=$pages){
        echo "<a href='index.php?do=pop&p=".($now+1)."' style='font-size':20px>";
        echo " > ";
        echo "</a>";
    }
    
    
    
    ?>
</div>