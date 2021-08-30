<div>
    目前位置: 首頁 > 人氣文章區 >
</div>
<style>
    /* .newsAll { //替換.alerr
        display: none;
    } */

    .newsAll  {
			background: rgba(51, 51, 51, 0.8);
			color: #FFF;
			height: 400px;
			width: 300px;
			position: absolute;
			display:none;
			z-index: 9999;
			overflow: auto;
		}
</style>

<table>
    <tr>
        <td width="30%">標題</td>
        <td>內容</td>
        <td>人氣</td>
    </tr>

    <?php
    // 分頁
    // 總筆數
    $all = $News->count(['sh' => 1]);
    // 幾筆為一頁
    $div = 5;
    // 分幾頁,無條件進位
    $pages = ceil($all / $div);
    // 現在頁數
    $now = (isset($_GET['p'])) ? $_GET['p'] : 1;
    //開始
    $start = ($now - 1) * $div;

    // 全部有顯示的資料 //增加排序
    $news = $News->all(['sh' => 1], "order by `pop` desc limit $start, $div");
    foreach ($news as $n) {

    ?>
        <tr>
            <!-- 標題 -->
            <td class="clo newsHeader"><?= $n['title']; ?></td>

            <!-- 內容 / 字數控制 -->
            <td class="newsMid" style="position: relative;">
                <?= mb_substr($n['news'], 0, 20); ?>...

                <!-- 全部內容 -->
                <div class="newsAll">
                    <!--標題插入(可不用) <h3><?=$n['type']?></h3> -->
                    <pre class="ssaa"><?= $n['news']; ?></pre>
                </div>

            </td>

            <td>
                <!-- 人氣 / 讚 / 收回讚 -->
                <?php

                echo "<span id='vie{$n['id']}'>" . $n['pop'] . "</span>";
                echo "個人說";
                echo "<img src='icon/02B03.jpg' style='width:25px' >";


                if (isset($_SESSION['login'])) {


                    // 判斷資料庫有無資料
                    $chk = $Log->count(['acc' => $_SESSION['login'], 'news' => $n['id']]);
                    if ($chk > 0) {
                        echo "<a id='good{$n['id']}' href='#' onclick=good(2,{$n['id']},&#39;{$_SESSION['login']}&#39;)>收回讚</a>";
                    } else {
                        echo "<a id='good{$n['id']}' href='#' onclick=good(1,{$n['id']},&#39;{$_SESSION['login']}&#39;)>讚</a>";
                    }
                }

                ?>
            </td>

        </tr>

    <?php
    }
    ?>

</table>


<div>
    <?php

    if ($now - 1 > 0) {
        echo "<a href='index.php?do=pop&p=" . ($now - 1) . "' style='font-size':20px>";
        echo " < ";
        echo "</a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
        $fontsize = ($now == $i) ? '26px' : '18px';
        echo "<a href='index.php?do=pop&p=$i' style='font-size:$fontsize'>";
        echo "$i";
        echo "</a>";
    }

    if ($now + 1 <= $pages) {
        echo "<a href='index.php?do=pop&p=" . ($now + 1) . "' style='font-size':20px>";
        echo " > ";
        echo "</a>";
    }



    ?>
</div>

<script>
    $('.newsHeader').hover(
        function() {
            // console.log('ING')
            $(this).next().children('.newsAll').show()


            // $(this).next().children('.newsAll').html()

            // $('.ssaa').html($(this).next().children('.newsAll').html());
            // $('.alerr').show();
        },
        function(){
            $(this).next().children('.newsAll').hide()
        }
    )

    $('.newsMid').hover(
        function() {

            $(this).children('.newsAll').show()

        },
        function(){
            $(this).children('.newsAll').hide()
        }
    )
</script>