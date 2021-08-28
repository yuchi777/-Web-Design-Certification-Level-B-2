<fieldset>

    <legend>最新文章管理</legend>
    <form action="api/admin_acc.php" method="post">
        <table class="ct tab" style="margin: auto;">
            <tr>
                <td width="10%">編號</td>
                <td >標題</td>
                <td width="10%">顯示</td>
                <td width="10%">刪除</td>
            </tr>
            <?php
            $news=$News->all();
            foreach ($news as $key => $value) {
            

                
            ?>
            <tr>
                <td class="clo"><?=$key +1;?>.</td>
                <td><?= $value['title']; ?></td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?=$value['id'];?>"
                        <?= ($value['sh']==1)?"checked":""; ?>
                    >
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                </td>
            </tr>
            <?php
                }
            
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>




</fieldset>
