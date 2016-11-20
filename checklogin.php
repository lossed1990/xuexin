<?php
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

	// 连主库
    $db = mysql_connect(SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS);

	if ($db) {
		mysql_select_db(SAE_MYSQL_DB, $db);
             
		$sql = "select count(*)  from `app_exiuc`.`Xuexin_user` where `name` = '".$username."' and `password` = '".$password."'";
		$result=mysql_query($sql,$db);

		if($result){
			if(mysql_num_rows($result)){
				$rs = mysql_fetch_array($result); 

				if($rs[0] == 0){  //检索条数为0
				    setcookie("login", "0", time());
					header('Content-Type: text/xml');
					echo "<?xml version=\"1.0\" ?>
							<result>
								<ok>1</ok> 
							</result>"; 
				}else{
					setcookie("login", "1", time()+3600);
					header('Content-Type: text/xml');
					echo "<?xml version=\"1.0\" ?>
							<result>
								<ok>0</ok> 
							</result>"; 
				}
			}
		}
	    mysql_close($db);
    }	
?>