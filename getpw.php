<?php
    $pw = '查询失败';
    // 连主库
    $db = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

	if ($db) {
		mysql_select_db(SAE_MYSQL_DB, $db);
             
		$sql = "select *  from `app_exiuc`.`Xuexin_user` where `name` = 'xuexin'";
		$result = mysql_query($sql,$db);

		if($result){
			if(mysql_num_rows($result)){
				$rs = mysql_fetch_array($result); 

				if($rs[0] == 0){  //检索条数为0
				    
				}else{
					$pw = $rs['password'];
				}
			}
		}
	    mysql_close($db);
    }	
?>


<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>试题登陆密码自助服务</title>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <link rel="stylesheet" href="css/weui.css"/>
</head>
<body ontouchstart>
    <div class="weui_msg">
        <div class="weui_icon_area"><i class="weui_icon_success weui_icon_msg"></i></div>
        <div class="weui_text_area">
            <h2 class="weui_msg_title">当前密码</h2>
            <br/>
            <br/>
            <p class="weui_msg_result">
            <?php
                echo $pw;
            ?>    
            </p>
        </div>       
        <div class="weui_extra_area">
            <p class="weui_msg_desc">请注意，密码仅当天有效！</a>
        </div>
    </div>

</body>
</html>