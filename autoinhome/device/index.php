<?php
 //����get����
 //���ձ���a��ֵ

 $msgType = $_GET['msgType'];
 $seq = (int)$_GET['seq'];
 $chipId = $_GET['chipId']; 
 $devType = $_GET['devType']; 
 $result = $msgType." ".$seq."   ".$devId;
 file_put_contents("1.txt",$result."\n", FILE_APPEND);
 //�ж�post����get��ʽ
  if(!$seq)
  {
	  //����post����

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

//���Ͳ�ѯ�豸id,����������������ݿ��������ע��
if($msgType == "queryDevId")
{

	$retDevId  = "retDevId";
	//��ѯ���ݿ⣬��ȡ���ص��豸ID
	
	   
	 $devId= (int)querysql($chipId);  
	  //  echo $devId;
	 // die;
	 
	 if(empty($devId))
	 {
		 //��ֵд�����ݿ�
		 $devId= (int)insertsql($chipId,$devType); 		 
	 }
	 
	
	//����json����
    $data = json_encode(array('msgType'=>$retDevId, 'seq'=>$seq,  'devId'=>$devId)); 

	echo $data;
	die;
	
}
//�����豸״̬������Ϣ
if($msgType == "updateData")
{
	$retUpdateData = "retUpdateData";
	$notify = "no";//notify��ʾ�������Ƿ���������Ϣ֪ͨ�豸
	$notifyBody = "�޸���";//notifyBody��ʾ��Ϣʵ��
	
	
	//�������ݿ⣬���ض�Ӧ��������Ϣ
	 //Ŀǰ�����߼�Ϊ����������ȫ������Ϊ�������ݿ��и��豸��״̬
	$return =  updatesql($devId,$lightStatus,$irStatus);
	 if($return == 1)
	 {
		 $notify = "yes";//notify��ʾ�������Ƿ���������Ϣ֪ͨ�豸
	$notifyBody = "���³ɹ�";//notifyBody��ʾ��Ϣʵ��
	 }
	//����json����
    $data = json_encode(array('msgType'=>$retUpdateData, 'seq'=>$seq,  'notify'=>$notify,  'notifyBody'=>$notifyBody)); 
	echo $data;
	die;	
}


//���µĴ���
//�����͹������û�id ������ ����д�뵽���ݿ�

if($msg == "register")//��������Ϊע�ᣬ�����ע��
{
 $con = mysql_connect('localhost','root','root'); 
       // $dati = date("h:i:sa");
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
       //�������ݿ�ע�����Ϣ
        $sql ="insert into api_member(username,password) values('$userid','$userPassword')";//�������ݿ��ֵ
       // echo $sql ;

             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "�Ѿ�ע��ɹ�,�û���Ϊ��".$userid."����Ϊ��".$userPassword;
             }

}

//

//��ѯ���ݿ�

function querysql($chipId)
{
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
		$sql = "SELECT devId FROM  `api_userdevice`  where chipId = $chipId";//��ȡ���ܵ��ݵ�ֵ

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
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
		$sql = "insert into  `api_userdevice`(chipId,devType,activeTime) values($chipId,'$devType',NOW())";    

  
             if(!mysql_query($sql,$con) )
             {
            	die('Error: ' . mysql_error());
       		 }
         $sql = "SELECT devId FROM  `api_userdevice`  where chipId = $chipId";//��ȡ���ܵ��ݵ�ֵ  	 
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

//��ѯ���������ݿ�,��ͬ�򲻸��£���ͬ��������ݿ�

function updatesql($devId,$lightStatus,$irStatus)
{
	$return =0;
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
		$sql = "SELECT lightStatus,irStatus FROM  `api_status`  where devId = $devId ";//��ȡ���ܵ��ݵ�ֵ���õ���ǰ״̬�����û�б仯���ø������ݿ�
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
					 	$sql = "insert into `api_status`(devId,lightStatus,irStatus,curTime) values($devId,$lightStatus,$irStatus,Now()) ";//��ȡ���ܵ��ݵ�ֵ���õ���ǰ״̬�����û�б仯���ø������ݿ�
						 $data  =  mysql_query($sql,$con);
						 if(!$data ) die('Error: ' . mysql_error());
						 $return =1;
				 }
				 
                mysql_close($con);
               return $return;
             }
	
}




//������⣬��ȡ����״̬�����ݿ���״̬���е��ݿ��ؿ���

if($msg == "alive")//��������Ϊ������⣬������������
{
 $con = mysql_connect('localhost','root','root'); 
       // $dati = date("h:i:sa");
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
		//����û�����������֤ͨ������ô�Ϳ��Զ�ȡ�豸��״̬
		
		
		//���豸��id���豸�����ƽ��ж�Ӧ��Ŀǰֻ�ǿ���һ���û�һ���豸�����
		
		
        //�������ݿ�����������Ϣ
        $sql ="insert into api_member(username,password) values('$userid','$userPassword')";//�������ݿ��ֵ
		
		$sql = "SELECT data FROM  `api_member` m,`api_device` d WHERE m.username =  '$userid' and m.password =  '$userPassword'  and m.uid = d.uid  limit 1";//��ȡ���ܵ��ݵ�ֵ
         //��ȡ�豸Ŀǰ��״̬�������
		 echo $sql;
		 die;
		 
		 
		  
             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "�Ѿ�ע��ɹ�,�û���Ϊ��".$userid."����Ϊ��".$userPassword;
             }

}

if($msg == "control")//��������Ϊ���ƣ�����п��ؿ��ƣ���Ҫ���ں�app�ĶԽ�
{
 $con = mysql_connect('localhost','root','root'); 
       // $dati = date("h:i:sa");
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
        //�������ݿ�Ŀ��Ʊ���Ϣ
        $sql ="insert into api_member(username,password) values('$userid','$userPassword')";//�������ݿ��ֵ
       // echo $sql ;

             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "�Ѿ�ע��ɹ�,�û���Ϊ��".$userid."����Ϊ��".$userPassword;
             }
}
//ע��ɹ������ҿ�����ע����û�id��������е�¼
echo $reply ;