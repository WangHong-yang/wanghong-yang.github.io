<?php


//����php����demo����


//�˴�����д����һ��php�ļ���

$result = $GLOBALS['HTTP_RAW_POST_DATA'];
//���շ��͹�����json�ַ���
//header("Content-type:text/html;charset=utf-8");
/*
if($_POST){
    //$result = $_POST[];//�����ȡ��ֱ�Ӿ��������ˣ�����Ҫ�õ�json_decode
    //echo $d['doing'];
    //print_r($d);
   // exit;
}
else
{
	//echo "<meta http-equiv='Content-Type'' content='text/html; charset=gb2312'>";
	//echo "ע��û�гɹ�";
	//die;
	
}
*/


//	echo $result;
//	die;


//�������͹������ַ���

//  $result = $_POST;
//$result = trim($result, "\xEF\xBB\xBF");//ȥ��bomͷ
$data = json_decode($result, true);
file_put_contents("1.txt",$result."\n", FILE_APPEND);
//file_put_contents("1.txt","\n", FILE_APPEND);
//echo $result;
//die;
//��ȡ���͹������û�id������

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


//���Ͳ�ѯ�豸id,����������������ݿ��������ע��
if($msgType == "queryDevId")
{
	$chipId = $data[chipId];
	$retDevId  = "retDevId";
	//��ѯ���ݿ⣬��ȡ���ص��豸ID
	
	   
	 $devId= querysql($chipId);  
	  //  echo $devId;
	 // die;
	 
	 if(empty($devId))
	 {
		 //��ֵд�����ݿ�
		 $devId= insertsql($chipId); 		 
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
	$notifyBody = "it's a test";//notifyBody��ʾ��Ϣʵ��
	
	
	//�������ݿ⣬���ض�Ӧ��������Ϣ
	 //Ŀǰ�����߼�Ϊ����������ȫ������Ϊ�������ݿ��и��豸��״̬
	 
	 
	 
	//����json����
    $data = json_encode(array('msgType'=>$retUpdateData, 'seq'=>$seq,  'notify'=>$notify,  'notifyBody'=>$notifyBody)); 
	echo $data;
	die;	
}




//msg���͹�������Ϣ��queryDevId ��updateData







//����json����
//$data = json_encode(array('userid'=>$userid, 'password'=>$userPassword)); 


//var_dump($userid);
//echo $msg;

//die;

//die;





//�����жϣ��Ƿ�Ϊ���ؿ���

//�����жϣ��Ƿ�Ϊ��¼


//���п��ƣ��Ƿ�Ϊ��������������Ϊ��д�������У�Ȼ����ͬ�������ݿ��У�


//






//���ϵĴ���
/*
//�����͹������û�id ������ ����д�뵽���ݿ�

 $con = mysql_connect('qdm219678692.my3w.com','qdm219678692','339079622'); 
       // $dati = date("h:i:sa");
        mysql_select_db("qdm219678692_db", $con);//�޸����ݿ���
 
        $sql ="insert into ecs_users(user_name,password) values('$userid','$userPassword')";//�������ݿ��ֵ
       // echo $sql ;

             if(!mysql_query($sql,$con))
             {
            	die('Error: ' . mysql_error());
       		 }else
             {
                mysql_close($con);
                $reply = "�Ѿ�ע��ɹ�,�û���Ϊ��".$userid."����Ϊ��".$userPassword;
             }


//ע��ɹ������ҿ�����ע����û�id��������е�¼
echo $reply ;
*/

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
function insertsql($chipId)
{
	$con = mysql_connect('localhost','root','root'); 
        mysql_select_db("mysqlznckapi", $con);//�޸����ݿ���
		$sql = "insert into  `api_userdevice`(chipId) values($chipId)";       
  
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
		         return $ret[devId];
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

