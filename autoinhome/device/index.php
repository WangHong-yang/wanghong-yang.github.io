<?php
 //接收get参数
 //接收变量a的值

 $msgType = $_GET['msgType'];
 $seq = (int)$_GET['seq'];
 $chipId = $_GET['chipId']; 
 $devType = $_GET['devType']; 
 $result = $msgType." ".$seq."   ".$devId;
 file_put_contents("1.txt",$result."\n", FILE_APPEND);
 //判断post还是get方式
  if(!$seq)
  {
	  //接收post参数

      $result =  isset($GLOBALS["HTTP_RAW_POST_DATA"]) ?  $GLOBALS["HTTP_RAW_POST_DATA"]  : "" ;	  
	  $data = json_decode($result, true);
      file_put_contents("1.txt",$result."\n", FILE_APPEND);
		$msgType = $data[msgType];
		$content = $data[content];
		$seq =   (int)$data[seq];
		$lightStatus =   $data[lightStatus];
		$irStatus =    $data[irStatus];
		$devId =    $data[devId];

  }

//发送查询设备id,如果不存在则在数据库里面进行注册
if($msgType == "queryDevId")
{

	$retDevId  = "retDevId";
	//查询数据库，获取返回的设备ID
	
	   
	 $devId= (int)querysql($chipId);  
	  //  echo $devId;
	 // die;
	 
	 if(empty($devId))
	 {
		 //将值写入数据库
		 $devId= (int)insertsql($chipId,$devType); 		 
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
	$notifyBody = "无更新";//notifyBody表示消息实体
	
	
	//更新数据库，返回对应的数据消息
	 //目前处理逻辑为，更新请求全部设置为更新数据库中该设备的状态
	$return =  updatesql($devId,$lightStatus,$irStatus);
	 if($return == 1)
	 {
		 $notify = "yes";//notify表示服务器是否有主动消息通知设备
	$notifyBody = "更新成功";//notifyBody表示消息实体
	 }
	//返回json数据
    $data = json_encode(array('msgType'=>$retUpdateData, 'seq'=>$seq,  'notify'=>$notify,  'notifyBody'=>$notifyBody)); 
	echo $data;
	die;	
}


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
function insertsql($chipId,$devType)
{
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
		$sql = "insert into  `api_userdevice`(chipId,devType,activeTime) values($chipId,'$devType',NOW())";    

  
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
				 //var_dump($ret[devId]);
				// die;
		         return $ret[devId];
             }
	
}

//查询并更新数据库,相同则不更新，不同则更新数据库

function updatesql($devId,$lightStatus,$irStatus)
{
	$return =0;
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//修改数据库名
		$sql = "SELECT lightStatus,irStatus FROM  `api_status`  where devId = $devId ";//读取智能灯泡的值，得到当前状态，如果没有变化则不用更新数据库
		//echo $sql;
		//die;
         $data  =  mysql_query($sql,$con);
  
             if(!$data )
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
				$ret = mysql_fetch_assoc($data);
		         //return $ret;		 
				 if( $ret[lightStatus]== $lightStatus && (int)$ret[irStatus]== $irStatus)
				 {		

					
				 }else{
					 	$sql = "insert into `api_status`(devId,lightStatus,irStatus,curTime) values($devId,$lightStatus,$irStatus,Now()) ";//读取智能灯泡的值，得到当前状态，如果没有变化则不用更新数据库
						 $data  =  mysql_query($sql,$con);
						 if(!$data ) die('Error: ' . mysql_error());
						 $return =1;
				 }
				 
                mysql_close($con);
               return $return;
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