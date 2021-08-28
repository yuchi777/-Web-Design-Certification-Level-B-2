<fieldset>
    <legend>會員登入</legend>


    <table class="tab">
        <tr>
            <td class='clo'>帳號:</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td class='clo'>密碼:</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="登入" onclick="login()">
                <input type="reset" value="清除">
            </td>
            <td>
                <a href="?do=forgot">忘記密碼 | </a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function login(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();

        // 檢查帳號
        $.get('api/chk_acc.php',{acc},(chkAcc)=>{
            console.log('chkAcc');
            console.log(chkAcc);
            if(chkAcc!= 1 ){
                alert('查無帳號');
            }else{
                // 檢查密碼
                $.get('api/chk_pw.php',{acc,pw},(chkPw)=>{
                    console.log('chkPw');
                    console.log(chkPw);
                    if(chkPw!= 1 ){
                        alert('密碼錯誤')
                    }else{
                        if(acc=='admin'){
                            location.href="backend.php";
                        }else{
                            location.href="index.php";
                        }
                    }
                })
            }
        })
    }
</script>