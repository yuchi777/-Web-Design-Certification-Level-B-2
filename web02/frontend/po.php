<div>
    目前位置: 首頁>分類網誌><span id="navType"></span>
</div>

<!-- inline-block預設底線對齊 -->
<!-- vertical-align:top 靠上對齊 -->
<fieldset style="width: 20%;display:inline-block; vertical-align:top">
    <legend>分類網誌</legend>

    <p> <a class="type" id="t1" href="#"> 健康新知</a></p>
    <p> <a class="type" id="t2" href="#"> 菸害防制</a></p>
    <p> <a class="type" id="t3" href="#"> 癌症防治</a></p>
    <p> <a class="type" id="t4" href="#"> 慢性病防治</a></p>

</fieldset>


<fieldset style="width: 70%;display:inline-block">
    <legend id="ch">文章列表</legend>
    <div id="titles"> </div>
    <div id="Post"> </div>



</fieldset>

<script>
// $('.type').on("click", function(){
//     // 抓文字內容
//     let type=$(this).text();

//     //放到導覽區
//     $('#navType').html(type);

//     //AJAX撈後端資料
//     let typeThis = $(this).attr('id').replace('t',''); //取id=1,2,3,4..

//     $.get('api/get_list.php', {'type': typeThis}, function(re){
//         $("#titles").html(re);
//     })
// })




// 先載入頁面
getList(1);

$(".type").on("click", function(){

    type = $(this).attr('id').replace("t","");
    getList(type);

})

function getList(type){
    $('#navType').html($('#t'+type).text());
    $.get('api/get_list.php', {'type': type}, function(re){
        $("#Post").html("");
        $("#titles").html(re);

        $("#ch").html("文章列表");
    })

}


function getNews(id){
    $.get("api/get_post.php", {id}, (re)=>{
        $("#Post").html(re);
        $("#titles").html("");

        $("#ch").html("文章內容");
    })
}



</script>