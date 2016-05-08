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


//	echo $result;
//	die;


//解析发送过来的字符串

//  $result = $_POST;
//$result = trim($result, "\xEF\xBB\xBF");//去掉bom头
$data = json_decode($result, true);
file_put_contents("1.txt",$result."\n", FILE_APPEND);
//file_put_contents("1.txt","\n", FILE_APPEND);
//echo $result;
//die;
//读取发送过来的用户id和密码

//echo "123";
//echo $result;
//die;


$userid = $data[userid];
$userPassword = $data[password];
$msgType = $data[msgType];
$content = $data[content];
$seq =   $data[seq];
$lightStatus =   $data[lightStatus];
$irStatus =    $data[irStatus];


//echo $msgType;
echo $result;
//echo $data
die;


//发送查询设备id,如果不存在则在数据库里面进行注册
if($msgType == "queryDevId")
{
	$chipId = $data[chipId];
	$retDevId  = "retDevId";
	//查询数据库，获取返回的设备ID
	
	   
	 $devId= querysql($chipId);  
	  //  echo $devId;
	 // die;
	 
	 if(empty($devId))
	 {
		 //将值写入数据库
		 $devId= insertsql($chipId); 		 
	 }
	 
	
	//返回json数据
    $data = json_encode(array('msgType'=>$retDevId, 'seq'=>$seq,  'devId'=>$devId)); 

	echo $data;
	die;
	
}
//发送设备状态更新信息
if($msgType == "updateData")
{
	$retUpdateData = "retUpdateData";
	$notify = "no";//notify表示服务器是否有主动消息通知设备
	$notifyBody = "it's a test";//notifyBody表示消息实体
	
	
	//更新数据库，返回对应的数据消息
	 //目前处理逻辑为，更新请求全部设置为更新数据库中该设备的状态
	 
	 
	 
	//返回json数据
    $data = json_encode(array('msgType'=>$retUpdateData, 'seq'=>$seq,  'notify'=>$notify,  'notifyBody'=>$notifyBody)); 
	echo $data;
	die;	
}




//msg发送过来的信息有queryDevId ，updateData







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

//查询数据库

function querysql($chipId)
{
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
		$sql = "SELECT devId FROM  `api_userdevice`  where chipId = $chipId";//读取智能灯泡的值
         $data  =  mysql_query($sql,$con);
  
             if(!$data )
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
				 $ret = mysql_fetch_assoc($data);
		         return $ret[devId];
             }
	
}
function insertsql($chipId)
{
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
		$sql = "insert into  `api_userdevice`(chipId) values($chipId)";       
  
             if(!mysql_query($sql,$con) )
             {
            	die('Error: ' . mysql_error());
       		 }
         $sql = "SELECT devId FROM  `api_userdevice`  where chipId = $chipId";//读取智能灯泡的值  	 
		 $data  =  mysql_query($sql,$con);
             if(!$data )
             {
            	die('Error: ' . mysql_error());
       		 }else{		 
                mysql_close($con);
				 $ret = mysql_fetch_assoc($data);
		         return $ret[devId];
             }
	
}




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

