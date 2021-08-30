<div>
    目前位置: 首頁 > 最新文章區 >
</div>

<style>
    .newsAll{
        display: none;
    }
</style>

<table> 
    <tr>
        <td width="30%">標題</td>
        <td>內容</td>
        <?=
        (isset($_SESSION['login']))?"<td>人氣</td>":"";
        ?>
        
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
$news = $News->all(['sh'=>1], "limit $start, $div");
foreach ($news as $n) {

?>
    <tr>
        <!-- 標題 -->
        <td class="clo newsHeader"><?= $n['title']; ?></td>

        <!-- 內容 / 字數控制 -->
        <td>
            <div class="newsTitle"><?= mb_substr($n['news'], 0, 20); ?>...</div>
            <div class="newsAll"><?= nl2br($n['news']);?></div>
        </td>

        <!-- 人氣 / 讚 / 收回讚 -->
        <?php
        
        if(isset($_SESSION['login'])){
            echo "<td>";

            // 判斷資料庫有無資料
            $chk = $Log->count(['acc'=>$_SESSION['login'], 'news'=>$n['id']]);
            if($chk>0){
                echo "<a id='good{$n['id']}' href='#' onclick=good(2,{$n['id']},&#39;{$_SESSION['login']}&#39;)>收回讚</a>";
            }else{
                echo "<a id='good{$n['id']}' href='#' onclick=good(1,{$n['id']},&#39;{$_SESSION['login']}&#39;)>讚</a>";
            }

            echo "</td>";
        }
        
        ?>
        
    </tr>

<?php
}
?>

</table>

<div>
    <?php

    if($now-1>0){
        echo "<a href='index.php?do=news&p=".($now-1)."' style='font-size':20px>";
        echo " < ";
        echo "</a>";
    }
    
    for($i=1; $i<=$pages; $i++){
        $fontsize=($now==$i)?'26px':'18px';
        echo "<a href='index.php?do=news&p=$i' style='font-size:$fontsize'>";
        echo "$i";
        echo "</a>";
    }

    if($now+1<=$pages){
        echo "<a href='index.php?do=news&p=".($now+1)."' style='font-size':20px>";
        echo " > ";
        echo "</a>";
    }
    
    
    
    ?>
</div>


<script>
    $(".newsAll, .newsTitle").on("click",function(){
        $(this).toggle();
        $(this).siblings().toggle();
        
    })
    $(".newsHeader").on("click",function(){
        $(this).next().children(".newsAll, .newsTitle").toggle();
        
    })
</script>