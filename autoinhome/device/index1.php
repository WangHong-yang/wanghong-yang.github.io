<?php


//调用php发送demo命令


  //此处代码写在另一个php文件中

$result = $GLOBALS['HTTP_RAW_POST_DATA'];
//接收发送过来的json字符串
//header("Content-type:text/html;charset=utf-8");
/*
if($_POST){
    //$result = $_POST[];//这里获取的直接就是数组了，不需要用到json_decode
    //echo $d['doing'];
    //print_r($d);
   // exit;
}
else
{
	//echo "<meta http-equiv='Content-Type'' content='text/html; charset=gb2312'>";
	//echo "注册没有成功";
	//die;
	
}
*/




//解析发送过来的字符串

//  $result = $_POST;
//$result = trim($result, "\xEF\xBB\xBF");//去掉bom头
$data = json_decode($result, true);
file_put_contents("1.txt",$result."\n", FILE_APPEND);
//file_put_contents("1.txt","\n", FILE_APPEND);
//echo $result;
//die;
//读取发送过来的用户id和密码

$seq = $data[seq];
$msgType = $data[msgType];

if($msgType == "queryDevId")
	echo "{\"msgType\":\"retDevId\",\"seq\":$seq,\"devId\":123456}";
else if($msgType == "updateData")
	echo "{\"msgType\":\"retUpdateData\",\"seq\":$seq,\"devId\":123456,\"notifyType\":1,\"notifyBody\":\"level=2\"}";
//echo $result;
die;


$userid = $data[userid];
$userPassword = $data[password];
$msg = $data[msg];
$content = $data[content];

//返回json数据
//$data = json_encode(array('userid'=>$userid, 'password'=>$userPassword)); 


//var_dump($userid);
//echo $msg;

//die;

//die;





//进行判断，是否为开关控制

//进行判断，是否为登录


//进行控制，是否为心跳监听（方案为先写到缓存中，然后再同步到数据库中）


//






//线上的代码
/*
//将发送过来的用户id 和密码 进行写入到数据库

 $con = mysql_connect('qdm219678692.my3w.com','qdm219678692','339079622'); 
       // $dati = date("h:i:sa");
        mysql_select_db("qdm219678692_db", $con);//修改数据库名
 
        $sql ="insert into ecs_users(user_name,password) values('$userid','$userPassword')";//插入数据库的值
       // echo $sql ;

             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "已经注册成功,用户名为：".$userid."密码为：".$userPassword;
             }


//注册成功，并且可以用注册的用户id和密码进行登录
echo $reply ;
*/

//线下的代码
//将发送过来的用户id 和密码 进行写入到数据库

if($msg == "register")//发送命令为注册，则进行注册
{
 $con = mysql_connect('localhost','root','root'); 
       // $dati = date("h:i:sa");
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
       //更新数据库注册表信息
        $sql ="insert into api_member(username,password) values('$userid','$userPassword')";//插入数据库的值
       // echo $sql ;

             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "已经注册成功,用户名为：".$userid."密码为：".$userPassword;
             }

}

//



//心跳检测，读取开关状态，根据开关状态进行灯泡开关控制

if($msg == "alive")//发送命令为心跳检测，则进行心跳检测
{
 $con = mysql_connect('localhost','root','root'); 
       // $dati = date("h:i:sa");
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
		//如果用户名和密码验证通过，那么就可以读取设备的状态
		
		
		//将设备的id和设备的名称进行对应。目前只是考虑一个用户一个设备的情况
		
		
        //更新数据库的心跳表的信息
        $sql ="insert into api_member(username,password) values('$userid','$userPassword')";//插入数据库的值
		
		$sql = "SELECT data FROM  `api_member` m,`api_device` d WHERE m.username =  '$userid' and m.password =  '$userPassword'  and m.uid = d.uid  limit 1";//读取智能灯泡的值
         //读取设备目前的状态，并输出
		 echo $sql;
		 die;
		 
		 
		  
             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "已经注册成功,用户名为：".$userid."密码为：".$userPassword;
             }

}

if($msg == "control")//发送命令为控制，则进行开关控制，主要用于和app的对接
{
 $con = mysql_connect('localhost','root','root'); 
       // $dati = date("h:i:sa");
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
        //更新数据库的控制表信息
        $sql ="insert into api_member(username,password) values('$userid','$userPassword')";//插入数据库的值
       // echo $sql ;

             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "已经注册成功,用户名为：".$userid."密码为：".$userPassword;
             }

}
//注册成功，并且可以用注册的用户id和密码进行登录
echo $reply ;

