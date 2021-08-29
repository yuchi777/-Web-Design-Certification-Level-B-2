<fieldset>

    <legend>最新文章管理</legend>
    <form action="api/admin_news.php" method="post">
        <table class="ct tab" style="margin: auto;">
            <tr>
                <td width="10%">編號</td>
                <td >標題</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            // 分頁////////////////////////////////////////////////////////////
            $total=$News->count();
            $div=3;

            // 總頁數
            $pages=ceil($total/$div);

            // 現在的頁面
            $now=(isset($_GET['p'])) ? $_GET['p'] : 1;
            // $now= $_GET['p'] ?? 1; //語法糖

            // 從哪個值開始
            $start = ($now-1) * $div;


            // 抓取全部資料
            $news=$News->all(" limit $start, $div"); //開始筆數撈3筆
            foreach ($news as $key => $value) {
            

                
            ?>
            <tr>
                <td class="clo"><?=$key +1+$start;?>.</td>
                <td><?= $value['title']; ?></td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$value['id'];?>"
                        <?= ($value['sh']==1)?"checked":""; ?>
                    >
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                    <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                </td>
            </tr>
            <?php
                }
            
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定修改">
            <!-- <input type="reset" value="清空選取"> -->
        </div>
    </form>
    
    <div class="ct"> 

        <?php
            if(($now-1)>0){
                echo "<a href='backend.php?do=news&p=".($now-1)."'> < </a>";
            }


            for($i=1; $i<=$pages ; $i++){
                $font = ($i==$now)?'24px':'16px';
                echo "<a href='backend.php?do=news&p=$i' style='font-size:$font'> $i </a>";
            }

            if(($now+1)<=$pages){
                echo "<a href='backend.php?do=news&p=".($now+1)."'> > </a>";
            }

        ?>


    </div>



</fieldset>
