<?php


namespace App\Http\Controllers;




       

use App\Models\document_data as document_data;

use App\Models\document_type as  document_type;
use App\Models\sequents as users;
use App\Models\pregnants as pregnants;
use App\Models\RecordOfPregnancy as RecordOfPregnancy;
use App\Models\sequents as sequents;
use App\Models\sequentsteps as sequentsteps;
use App\Models\users_register as users_register;
use App\Models\logmessage as logmessage;
use App\Models\tracker as tracker;
use App\Models\question as question;
use App\Models\quizstep as quizstep;
use App\Models\reward as reward;
use App\Models\presenting_gift as presenting_gift;
use App\Models\reward_gift as reward_gift;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//////////////////////

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Storage;

//////////////////////
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\Event;
use LINE\LINEBot\Event\BaseEvent;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\AccountLinkEvent;
use LINE\LINEBot\Event\MemberJoinEvent; 
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\QuickReplyBuilder;
use LINE\LINEBot\QuickReplyBuilder\QuickReplyMessageBuilder;
use LINE\LINEBot\QuickReplyBuilder\ButtonBuilder\QuickReplyButtonBuilder;
use LINE\LINEBot\TemplateActionBuilder\CameraRollTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\CameraTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\LocationTemplateActionBuilder;
define('LINE_MESSAGE_CHANNEL_SECRET','25264a71c707dbeedca46ff60d1e866a');
define('LINE_MESSAGE_ACCESS_TOKEN','9tw2+DpBM3qfhPIGCs+eXDbZs1BPXQMUpWguIvIz7/cTz7dC8brS7HePUqb6lHq9oaDzmp1AY5CfsgFTIinxzxIYViz+chHSXWsxZdQb5AzwkeuPVfaozL+6kcgGEem5C6tkChIjDC0Pp3idEwIBEAdB04t89/1O/w1cDnyilFU=');


class GetMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response



     */

   
    public function index(){
        // echo '5555';
        // $conn_string = "host=ec2-54-227-247-225.compute-1.amazonaws.com port=5432 dbname=d6sqa1kjuhkplb user=kdhscmqukijgmf password=69ed8377f66479ac6222f469c6fa6cd2b2318b0ce23fd6a3f0cd7b94f18606ca";
        // $dbconn = pg_pconnect($conn_string);
            
        //   $user = 'U2dc636d2cd052e82c29f5284e00f69b9';
        //     echo $user;
        // $users_register = users_register::insert(['user_id'=>'$user','user_name' =>' $user_name' ,'status' => '4','user_age'=>'0','user_height'=>'0','user_Pre_weight'=>'0','user_weight'=>'0','preg_week'=>'0', 'phone_number'=>'NULL','email' =>'NULL','hospital_name'=>'NULL','hospital_number'=>'NULL','history_medicine'=>'NULL', 'history_food'=>'NULL','active_lifestyle'=>'0','created_at'=>Carbon::now(),'updated_at' =>Carbon::now(),'date_preg'=>'NULL','dateofbirth'=>'NULL','ulife_connect'=>'0']);
        // dd($users_register); 
        
        // $hostname ='us-cdbr-iron-east-05.cleardb.net';
        // $username ='b74ad905a9cc1e';
        // $password ='bf1cdf81';
        // $database ='heroku_0f89376d5e06de8';

        // $conn = mysqli_connect($hostname, $username, $password, $database);
        // if (!$conn) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }
    
        // // $conn = mysqli_connect($conn);
        // $sql = "INSERT INTO users (lineid, fullname, email, tel, dActive, dCreated)
        //          VALUES ('u2333','John','john@example.com','0896543322',1,now())";
        // $conn->query($sql);
        // $sql1 = "UPDATE users SET fullname='Doe' WHERE lineid = 'u2333'";
        // $conn->query($sql1);

        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);


        // $user = 'U2dc636d2cd052e82c29f5284e00f69b9';
        // $fullname = 'ploy';
        // $result = pg_query($dbconn,"SELECT seqcode FROM sequentsteps WHERE sender_id = '5555'");
        //$register_insert = pg_exec($dbconn, "INSERT INTO users(lineid,fullname,email,tel,dActive)VALUES('{$user}','{$fullname}','NULL','NULL','1')") or die(pg_errormessage());
        // $insert_sequentsteps = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status)VALUES('1','1','1','1','1')") or die(pg_errormessage());
        // return $insert_sequentsteps;
        // $num = pg_num_rows($result);
        //     if($num==0)         
        //  {  
        //      $seqcode = '0000';
        //      $nextseqcode = '0000';             
        //      $this->insert_sequentsteps($user,$seqcode,$nextseqcode);
        //  }

        // $val = 23;
        // $register_update = pg_exec($dbconn, "UPDATE users SET  age = '{$val}' WHERE lineid = '{$user}' ") or die(pg_errormessage());  
        // $result = pg_query($dbconn,"SELECT countryName FROM country ");
        // $re = pg_fetch_all($result);
        // dd($re[0]['countryname']);
        // print(pg_fetch_all($result));
        // $user = '111'; 
        // $countryID = 'China';
        // // return $register_update;
        // $result = pg_query($dbconn,"SELECT countryid FROM country WHERE countryname = '{$countryID}' ");
        // // print($result);
        // while ($row = pg_fetch_object($result)) {
        //     print  $row->countryid;
        // }  
        $user = 'U2dc636d2cd052e82c29f5284e00f69b9';
       // $val = '12';
        //$register_update = pg_exec($dbconn, "UPDATE orders SET  dStart = '{$val}' WHERE userID = '{$user}' ") or die(pg_errormessage());  
        // $startdate = $this->order_select($user);
    
        // $startd = $startdate->dstart;  
        // $startd1 = strtotime($startd);
        // $val = strtotime("2019-11-20");
        // $datediff = $val - $startd1;
        // $val1 = round(($datediff / (60 * 60 * 24))+1);
        // $a = $this->order_select_10($user);
        $rows = $this->order_select_10_count($user);
      
         $order10s = $this->order_select_10($user);
                   
                        $columnTemplateBuilders = [];

                        foreach ($order10s as $record) {
        
                      
                            $columnTemplateBuilder =  
                                [
                                  // $record->created_at
                                      'type' => 'box',
                                      'layout' => 'horizontal',
                                      'margin' => 'xxl',
                                      'spacing' => 'sm',
                                      'contents' => 
                                      array (
                                        0 => 
                                        array (
                                          'type' => 'text',
                                          'text' => $record['id'],
                                          'size' => 'sm',
                                          'color' => '#555555',
                                          'wrap' => true,
                                        ),
                                        1 => 
                                        array (
                                          'type' => 'text',
                                          'text' => $record['id'],
                                          'size' => 'md',
                                          'color' => '#2E7D32',
                                          'align' => 'center',
                                          'wrap' => true,
                                          'flex' => 2,
                                        ),
                                        2 => 
                                        array (
                                          'type' => 'button',
                                          'style' => 'primary',
                                          'color' => '#B2EBF2',
                                          'height' => 'sm',
                                          'flex' => 0,
                                          'action' => 
                                          array (
                                           'type' => 'message',
                                           'label' => '✏',
                                           'text' => $record['id'],
                                          ),
                                        ),
                                      ),
                                    ]
                                    ;
                            array_push($columnTemplateBuilders, $columnTemplateBuilder);
                        } 
        
                      $c = count($columnTemplateBuilders);

                      dd($c);
        // foreach($a as $array)
        //     {
        //         $array['id'];
        //         $array['nvisit'];

        //     }

        // print($a[0]['id']);
        // $b = json_encode($a);
        // print($b->id);
        // print($a[0]);
        //dd($a);
        // $re = pg_fetch_all($result);
        //  $result ;
        // $seqcode ='001';
        // $result = pg_query($dbconn,"SELECT question FROM sequents WHERE seqcode = '$seqcode'");
        // while ($row = pg_fetch_object($result)) {
        //    return  $row->question;
        // }  

        // dd($result);
                  
    }
     public function getmessage()
    {         
            // เชื่อมต่อกับ LINE Messaging API
                $httpClient = new CurlHTTPClient('+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=');
                $bot = new LINEBot($httpClient, array('channelSecret' => '572a7adea7a0959295e21cb626dae011'));
                
                // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
              //  $content = file_get_contents('php://input');
                
                // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array

                
            //     $events = json_decode($content, true);
                
            //         if(!is_null($events)){

            //             $replyInfo =$events['events'][0]['type'];
            //             // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
            //             $replyToken  = $events['events'][0]['replyToken'];
            //             $user        = $events['events'][0]['source']['userId'];
            //         // $userMessage = $events['events'][0]['message']['text'];
            //             $typeMessage = $events['events'][0]['message']['type'];
            //             $idMessage   = $events['events'][0]['message']['id']; 
            //         }
            //     // ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
            //     // $textMessageBuilder = new TextMessageBuilder(json_encode($events));
               
            //     // //l ส่วนของคำสั่งตอบกลับข้อความ
            //     // $response = $bot->replyMessage($replyToken,$textMessageBuilder);
            // //     if ($response->isSucceeded()) {
            // //         echo 'Succeeded!';
            // //         return;
            // //     }
            // //    // $users = users::insert(['sender_id'=>$user,'seqcode' => $seqcode,'answer' => 'NULL','nextseqcode' =>$nextseqcode,'status'=>'0','created_at'=>NOW() , 'updated_at'=>NOW()]);
            // //     // Failed
            // //     echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
           
///////////////////////////////////////////////////
       // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');
 
// แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $user = $events['events'][0]['source']['userId'];
    $sourceType = $events['events'][0]['source']['type'];        
    $is_postback = NULL;
    $is_message = NULL;
    $eventFollow = NULL;
    if(isset($events['events'][0]) && array_key_exists('message',$events['events'][0])){
        $is_message = true;
        $typeMessage = $events['events'][0]['message']['type'];
        $userMessage = $events['events'][0]['message']['text'];     
        $idMessage = $events['events'][0]['message']['id'];             
    }
    if(isset($events['events'][0]) && array_key_exists('postback',$events['events'][0])){
        $is_postback = true;
        $dataPostback = NULL;
        parse_str($events['events'][0]['postback']['data'],$dataPostback);;
        $paramPostback = NULL;
        if(array_key_exists('params',$events['events'][0]['postback'])){
            if(array_key_exists('date',$events['events'][0]['postback']['params'])){
                $paramPostback = $events['events'][0]['postback']['params']['date'];
            }
            if(array_key_exists('time',$events['events'][0]['postback']['params'])){
                $paramPostback = $events['events'][0]['postback']['params']['time'];
            }
            if(array_key_exists('datetime',$events['events'][0]['postback']['params'])){
                $paramPostback = $events['events'][0]['postback']['params']['datetime'];
            }                       
        }
    }   
    // if(isset($events['events'][0]) && array_key_exists('follow',$events['events'][0])){
    //        $textReplyMessage = 'ไงง';
    //        $replyData = new TextMessageBuilder($textReplyMessage);   
    //        $response = $bot->replyMessage($replyToken,$replyData);   
    // }
    /////////////////////////
    $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
    $dbconn = pg_pconnect($conn_string);

        $result = pg_query($dbconn,"SELECT seqcode FROM sequentsteps WHERE sender_id = '$user'");
        $num = pg_num_rows($result);
            if($num==0)         
         {  
             $seqcode = '000';
             $nextseqcode = '000';             
             $this->insert_sequentsteps($user,$seqcode,$nextseqcode);
         }

        $seqcode = $this->seqcode_select($user);
    /////////////////////////////////////////////////
    if(!is_null($is_postback)){
        // $textReplyMessage = "ข้อความจาก Postback Event Data = ";
        if(is_array($dataPostback)){
            $textReplyMessage = json_encode($dataPostback);
        }
        if($textReplyMessage =='{"datestring":""}'){
            $userMessage= "Params=".$paramPostback;
            $this->checkmessage($replyToken,$userMessage,$seqcode,$user);


        }elseif($textReplyMessage =='{"datestring1":""}'){
           
            $userMessage= "Params1=".$paramPostback;
            $this->checkmessage($replyToken,$userMessage,$seqcode,$user);


        }

        //  //return $this->replymessage($replyToken,$userMessage,$case);
        //     $replyData = new TextMessageBuilder($textReplyMessage);   
        //     $response = $bot->replyMessage($replyToken,$replyData);        
    }
    if(!is_null($is_message)){

        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
    
            $result = pg_query($dbconn,"SELECT seqcode FROM sequentsteps WHERE sender_id = '$user'");
            $num = pg_num_rows($result);
                if($num==0)         
             {  
                 $seqcode = '000';
                 $nextseqcode = '000';             
                 $this->insert_sequentsteps($user,$seqcode,$nextseqcode);
             }
    
            $seqcode = $this->seqcode_select($user);
  
          if($typeMessage=='text'){
                if(!is_null($events)){
                    $userMessage = $events['events'][0]['message']['text'];
                }
                $this->checkmessage($replyToken,$userMessage,$seqcode,$user);
            }
            //////////////////////////////////////////////////////          

          

           }       // return $this->replymessage($replyToken,$userMessage,$case);
        }
    }
    public function checkmessage($replyToken,$userMessage,$seqcode,$user){
                            //ลงทะเบียน
                            if(strpos($userMessage, 'ลงทะเบียน') !== false  &&  $seqcode == '000'){
                                $case = 1;
                                // $userMessage = 'ขอทราบชื่อและนามสกุลค่ะ';
                                $seqcode = '001';
                                $nextseqcode = '002';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                                $question = $this->sequents_question($seqcode);
                                $userMessage =  $question;
                        }elseif($userMessage == 'del'){
                                $case = 1;
                                $fullname = $userMessage;
                                // $userMessage = 'ขอทราบEmailค่ะ';
                                $this->delete_state($user);
                                $userMessage =  'ลบแล้วจ้า';
                    //ชื่อ-นามสกุล
                        }elseif(is_string($userMessage) !== false &&  $seqcode == '001'){
                                $case = 1;
                                $fullname = $userMessage;
                                // $userMessage = 'ขอทราบEmailค่ะ';
                                $this->register_insert($user,$fullname);
                                $seqcode = '002';
                                $nextseqcode = '003';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                                $question = $this->sequents_question($seqcode);
                                $userMessage =  $question;
                    //อายุ
                        }elseif(is_string($userMessage)!== false  &&  $seqcode == '002'){
                            if(is_numeric($userMessage) !== false){
                                $val = $userMessage;
                                $this->register_update($user,$val,$seqcode);
                                $case = 1;   
                            
                                $seqcode = '003';
                                $nextseqcode = '004';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                                $question = $this->sequents_question($seqcode);
                                $userMessage =  $question;
                            }else{
                                $case = 1;
                                $userMessage = 'ฉันคิดว่าคุณพิมพ์อายุผิดนะ กรุณาพิมพ์ใหม่';
                            }
                    //Email
                        }elseif(is_string($userMessage)!== false  &&  $seqcode == '003'){
                            if(strpos($userMessage, '@') !== false || strpos($userMessage, '-') !== false){
                                //$userMessage = 'การลงทะเบียนเรียบร้อยแล้วนะคะ';
                                $val = $userMessage;
                                $this->register_update($user,$val,$seqcode);
                                $case = 1;

                                $seqcode = '004';
                                $nextseqcode = '005';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                                $question = $this->sequents_question($seqcode);
                                $userMessage =  $question;
                            }else{
                                $case = 1;
                                $userMessage = 'ฉันคิดว่าคุณพิมพ์Emailผิดนะ กรุณาพิมพ์ใหม่';
                            }
                    //หมายเลขโทรศัพท์
                        }elseif(is_string($userMessage) !== false &&  $seqcode == '004'){
                            if(is_numeric($userMessage) !== false && strlen($userMessage) == 10){
                                //$userMessage = 'การลงทะเบียนเรียบร้อยแล้วนะคะ';
                                $val = $userMessage;
                                $this->register_update($user,$val,$seqcode);
                                $case = 1;

                                $seqcode = '005';
                                $nextseqcode = '000';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                                $question = $this->sequents_question($seqcode);
                                $userMessage =  $question;
                            }else{
                                $case = 1;
                                $userMessage = 'ฉันคิดว่าคุณพิมพ์เบอร์โทรศัพท์ผิดนะคะ กรุณาพิมพ์ใหม่';
                            }

                    //เลือกแผนการเดินทาง
                        }elseif(strpos($userMessage, 'เลือกแผนการเดินทาง') !== false ){
                            $case = 2;
                            $fullname = $userMessage;
                            // $userMessage = 'ขอทราบEmailค่ะ';
                            // $this->register_insert($user,$fullname);
                            $seqcode = '006';
                            $nextseqcode = '007';
                            $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                            $question = $this->sequents_question($seqcode);
                            $userMessage =  $question;
                    //ประเภทการเดินทางแบบรายเที่ยว คุณต้องการเดินทางไปประเทศอะไรคะ?
                        }elseif(is_string($userMessage) !== false &&  $seqcode == '006'){
                          
                            $case = 3;
                            $country_name = $userMessage;
                            // $userMessage = 'ขอทราบEmailค่ะ';
                            $countryID = $this->country_select_id($country_name);
                            $this->register_orders($user,$countryID);


                            $seqcode = '007';
                            $nextseqcode = '008';
                            $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                            $question = $this->sequents_question($seqcode);
                            $userMessage =  $question;
                    //ขอทราบวันออกเดินทางจากประเทศไทยค่ะ?
                        }elseif(strpos($userMessage, 'Params=') !== false ){
                            //is_string($userMessage) !== false &&  $seqcode == '007' ||
                            // $seqcode = '007';
                            $pieces = explode("=", $userMessage);
                            $val  = str_replace("","",$pieces[1]);
                            $case = 4;
                            $this->register_update($user,$val,$seqcode);
                            // $fullname = $userMessage;
                            // $userMessage = 'ขอทราบEmailค่ะ';
                            // $this->register_insert($user,$fullname);
                            $seqcode = '008';
                            $nextseqcode = '009';
                            $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                            $question = $this->sequents_question($seqcode);
                            $userMessage =  $question;
                    //ขอทราบวันกลับค่ะ?
                        }elseif(strpos($userMessage, 'Params1=') !== false ){
                            //is_string($userMessage) !== false &&  $seqcode == '008' ||
                            $pieces = explode("=", $userMessage);
                            $val  = str_replace("","",$pieces[1]);
                            $case = 4;
                            $this->register_update($user,$val,$seqcode);
                            
                            $startdate = $this->order_select($user);
                            $startd = $startdate->dstart;  
                            $startd1 = strtotime($startd);
                            $endd = strtotime($val);
                            $datediff = $endd - $startd1;
                            $val = round(($datediff / (60 * 60 * 24))+1);
                            $case = 4;
                            $seqcode = '011';
                            $this->register_update($user,$val,$seqcode);
                            
                            $case = 1;
                            // $fullname = $userMessage;
                            // $userMessage = 'ขอทราบEmailค่ะ';
                            // $this->register_insert($user,$fullname);
                            $seqcode = '009';
                            $nextseqcode = '010';
                            $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                            $question = $this->sequents_question($seqcode);
                            $userMessage =  $question;
                    //ขอทราบจำนวนผู้โดยสารค่ะ'
                        }elseif(is_string($userMessage) !== false &&  $seqcode == '009'){
                            if(is_numeric($userMessage) !== false){
                                $case = 5;
                                $val = $userMessage;
                                $this->register_update($user,$val,$seqcode);
                                // $fullname = $userMessage;
                                // $userMessage = 'เลือกแผนการเดินทางเรียบร้อยแล้วค่ะ';
                                // $this->register_insert($user,$fullname);
                                $seqcode = '010';
                                $nextseqcode = '000';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                                $question = $this->sequents_question($seqcode);
                                $userMessage =  $question;
                            }else{
                                $case = 1;
                                $userMessage = 'ฉันคิดว่าคุณพิมพ์ผิดนะ กรุณาพิมพ์ใหม่';
                            }

                        }elseif(is_string($userMessage) !== false &&  $seqcode == '010'){
                              if(is_numeric($userMessage) !== false){
                                $case = 6;
                                $val = $userMessage;
                                $this->register_update($user,$val,$seqcode);
                            

                                $se = $this->order_select($user);
                                $nVisit = $se->nvisit;  
                                $nVisit = (int)$nVisit;
                                $planid = $userMessage;
                                $price = $this->plan_select($planid);
                                $price = (int)$price;
                                $val = $price*$nVisit;
                                $seqcode = '012';
                                $this->register_update($user,$val,$seqcode);
                                // $fullname = $userMessage;
                          
                                // $this->register_insert($user,$fullname);
                                $seqcode = '000';
                                $nextseqcode = '000';
                                $update_sequentsteps = $this->update_sequentsteps($user,$seqcode,$nextseqcode);
                              }else{
                                $case = 1;
                                $userMessage = 'กรุณาเลือกแผนการเดินทาค่ะ';
                               
                              }
                                // $question = $this->sequents_question($seqcode);
                                // $userMessage =  $question;
                            }elseif($userMessage =='confirm'){
                                // if(is_numeric($userMessage) !== false){
                                    $case = 1;
                                    $userMessage = 'เลือกแผนการเดินทางเรียบร้อยแล้วค่ะ';
                                    $seqcode = '013';
                                    $val = 1;
                                    $this->register_update($user,$val,$seqcode);
                                    // $question = $this->sequents_question($seqcode);
                                    // $userMessage =  $question;
                            }elseif($userMessage =='Cancel'){
                            $case = 1;
                            $userMessage = 'ยกเลิกการเลือกแผนการเดินทางเรียบร้อยแล้วค่ะ';

                            
                            }elseif($userMessage =='ประวัติการเดินทาง'){
                            $case = 7;
                            $userMessage = 'ค่ะ';
                                
                            
                        }else{
                            $case = 1;
                            $userMessage = '**เมนู';
                        }


                        return $this->replymessage($replyToken,$userMessage,$case,$user);

                        
    }
    public function replymessage($replyToken,$userMessage,$case,$user)
    {
        $httpClient = new CurlHTTPClient('+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=');
        $bot = new LINEBot($httpClient, array('channelSecret' => '572a7adea7a0959295e21cb626dae011'));
            
            switch($case) {
    
                case 1 : 
                        $textMessageBuilder = new TextMessageBuilder($userMessage);
                    break;
                case 2 : 
                $textMessage1 = new TextMessageBuilder($userMessage);
                $var = $this->country_select();
                        // $textMessageBuilder = new TextMessageBuilder($userMessage);
                                                    // กำหนด action 4 ปุ่ม 4 ประเภท
                                $actionBuilder0 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[0]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder1 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[1]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder2 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[2]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder3 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[3]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder4 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[4]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder5 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[5]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder6 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[6]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder7 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[7]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder8 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[8]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                                $actionBuilder9 = array(
                                    new MessageTemplateActionBuilder(
                                        'เลือก',// ข้อความแสดงในปุ่ม
                                        $var[9]['countryname'] // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                    ),     
                                );
                               
                                $textMessage2 = new TemplateMessageBuilder('Carousel',
                                    new CarouselTemplateBuilder(
                                        array(
                                            new CarouselColumnTemplateBuilder(
                                                $var[0]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/0.jpg',
                                                $actionBuilder0
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[1]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/1.jpg',
                                                $actionBuilder1
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[2]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/2.jpg',
                                                $actionBuilder2
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[3]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/3.jpg',
                                                $actionBuilder3
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[4]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/4.jpg',
                                                $actionBuilder4
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[5]['countryname'],
                                                'เลือกการเดินทาง',
                                                 'https://data-manage.herokuapp.com/country_tic/5.jpg',
                                                $actionBuilder5
                                            ),               
                                            new CarouselColumnTemplateBuilder(
                                                $var[6]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/6.jpg',
                                                $actionBuilder6
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[7]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/7.jpg',
                                                $actionBuilder7
                                            ),
                                            new CarouselColumnTemplateBuilder(
                                                $var[8]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/8.jpg',
                                                $actionBuilder8
                                            ),      
                                            new CarouselColumnTemplateBuilder(
                                                $var[9]['countryname'],
                                                'เลือกการเดินทาง',
                                                'https://data-manage.herokuapp.com/country_tic/9.jpg',
                                                $actionBuilder9
                                            )                                                                  
                                        )
                                    )
                                );

                                $multiMessage = new MultiMessageBuilder;
                                $multiMessage->add($textMessage1);
                                $multiMessage->add($textMessage2);
                                $textMessageBuilder = $multiMessage; 
                    break;
                case 3 : 

                $url = 'https://api.line.me/v2/bot/message/reply';
                $data = [
                    "replyToken" => $replyToken,
                    "messages" => [
                      array(
                        "type" => "template",
                        "altText" => $userMessage,
                        "template" => array(
                            "type" => "buttons",
                            "text" => $userMessage,
                            "actions" => [
                                array(
                                  "type" => "datetimepicker",
                                  "data" => "datestring", // will be included in postback action
                                  "label" => "เลือกวัน",
                                  "mode" => "date", // date | time | datetime
                                  //"initial": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                  //"max": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                  //"min": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                ),
                            ]
                        )
                      )
                    ]
                ];
                $post = json_encode($data);
                $access_token = '+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=';
                $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);
                                   
                    break;
                    case 4 : 

                    $url = 'https://api.line.me/v2/bot/message/reply';
                    $data = [
                        "replyToken" => $replyToken,
                        "messages" => [
                          array(
                            "type" => "template",
                            "altText" => $userMessage,
                            "template" => array(
                                "type" => "buttons",
                                "text" => $userMessage,
                                "actions" => [
                                    array(
                                      "type" => "datetimepicker",
                                      "data" => "datestring1", // will be included in postback action
                                      "label" => "เลือกวัน",
                                      "mode" => "date", // date | time | datetime
                                      //"initial": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                      //"max": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                      //"min": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                    ),
                                ]
                            )
                          )
                        ]
                    ];
                    $post = json_encode($data);
                    $access_token = '+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=';
                    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
    
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    $result = curl_exec($ch);
                    curl_close($ch);
                                       
                        break;

                        case 5:
                        $textMessageBuilder = new TemplateMessageBuilder('Image Carousel',
                        new ImageCarouselTemplateBuilder(
                            array(
                                new ImageCarouselColumnTemplateBuilder(
                                    'https://data-manage.herokuapp.com/plan/plan1.JPG',
                                    new MessageTemplateActionBuilder(
                                        'แผน 1', // ข้อความแสดงในปุ่ม
                                        '1'
                                    )
                                ),
                                new ImageCarouselColumnTemplateBuilder(
                                    'https://data-manage.herokuapp.com/plan/plan2.JPG',
                                    new MessageTemplateActionBuilder(
                                        'แผน 2', // ข้อความแสดงในปุ่ม
                                        '2'
                                    )
                                ),
                                new ImageCarouselColumnTemplateBuilder(
                                    'https://data-manage.herokuapp.com/plan/plan3.JPG',
                                    new MessageTemplateActionBuilder(
                                        'แผน 3', // ข้อความแสดงในปุ่ม
                                        '3'
                                    )
                                )                                          
                            )
                        )
                    );

                    break;
                    case 6:

                    $order = $this->order_select($user);
                    $country_id = $order->countryid; 
                    $country = $this->country_select_name($country_id);

                    //
                    $date = $order->dstart.' TO '. $order->dend;
                    // $date = json_encode($date);
                    /////
                    $nvisit = $order->nvisit;
                    $nday = $order->nday;
                    $totalprice  = $order->totalprice ;
                    $textMessageBuilder = array (
                        'type' => 'flex',
                        'altText' => 'Flex Message',
                        'contents' => 
                        array (
                          'type' => 'bubble',
                          'body' => 
                          array (
                            'type' => 'box',
                            'layout' => 'vertical',
                            'contents' => 
                            array (
                              0 => 
                              array (
                                'type' => 'text',
                                'text' => 'แผนการเดินทางของท่าน',
                                'size' => 'md',
                                'weight' => 'bold',
                                'color' => '#221919',
                              ),
                              1 => 
                              array (
                                'type' => 'box',
                                'layout' => 'vertical',
                                'spacing' => 'sm',
                                'margin' => 'lg',
                                'contents' => 
                                array (
                                  
                                  0 => 
                                  array (
                                    'type' => 'box',
                                    'layout' => 'baseline',
                                    'spacing' => 'sm',
                                    'contents' => 
                                    array (
                                      0 => 
                                      array (
                                        'type' => 'text',
                                        'text' => 'Place',
                                        'flex' => 1,
                                        'size' => 'sm',
                                        'color' => '#AAAAAA',
                                      ),
                                      1 => 
                                      array (
                                        'type' => 'text',
                                        'text' => $country,
                                        'flex' => 5,
                                        'size' => 'sm',
                                        'color' => '#666666',
                                        'wrap' => true,
                                      ),
                                    ),
                                  ),
                                  1 => 
                                  array (
                                    'type' => 'box',
                                    'layout' => 'baseline',
                                    'spacing' => 'sm',
                                    'contents' => 
                                    array (
                                      0 => 
                                      array (
                                        'type' => 'text',
                                        'text' => 'Date',
                                        'flex' => 1,
                                        'size' => 'sm',
                                        'color' => '#AAAAAA',
                                      ),
                                      1 => 
                                      array (
                                        'type' => 'text',
                                        'text' => $date,
                                        'flex' => 5,
                                        'size' => 'sm',
                                        'align' => 'start',
                                        'color' => '#666666',
                                        'wrap' => true,
                                      ),
                                    ),
                                  ),
                                  2 => 
                                  array (
                                    'type' => 'box',
                                    'layout' => 'horizontal',
                                    'contents' => 
                                    array (
                                      0 => 
                                      array (
                                        'type' => 'text',
                                        'text' => 'จำนวนวันเดินทาง',
                                        'size' => 'sm',
                                        'color' => '#AAAAAA',
                                      ),
                                      1 => 
                                      array (
                                        'type' => 'text',
                                        'text' => $nday.' วัน',
                                        'size' => 'sm',
                                        'color' => '#666666',
                                        'wrap' => true,
                                      ),
                                    ),
                                  ),
                                  3 => 
                                  array (
                                    'type' => 'box',
                                    'layout' => 'horizontal',
                                    'contents' => 
                                    array (
                                      0 => 
                                      array (
                                        'type' => 'text',
                                        'text' => 'จำนวนผู้เดินทาง',
                                        'color' => '#AAAAAA',
                                      ),
                                      1 => 
                                      array (
                                        'type' => 'text',
                                        'text' =>  $nvisit.' คน',
                                        'color' => '#666666',
                                      ),
                                    ),
                                  ),
                                  4 => 
                                  array (
                                    'type' => 'box',
                                    'layout' => 'horizontal',
                                    'contents' => 
                                    array (
                                      0 => 
                                      array (
                                        'type' => 'text',
                                        'text' => 'price',
                                        'flex' => 1,
                                        'size' => 'sm',
                                        'color' => '#AAAAAA',
                                      ),
                                      1 => 
                                      array (
                                        'type' => 'text',
                                        'text' =>  $totalprice.' บาท',
                                        'flex' => 5,
                                        'size' => 'sm',
                                        'color' => '#666666',
                                        'wrap' => true,
                                      ),
                                    ),
                                  ),
                                ),
                              ),
                              2 => 
                              array (
                                'type' => 'image',
                                'url' => 'https://th.qr-code-generator.com/wp-content/themes/qr/new_structure/markets/basic_market/generator/dist/generator/assets/images/websiteQRCode_noFrame.png',
                              ),
                              3 => 
                              array (
                                'type' => 'separator',
                              ),
                            ),
                          ),
                          'footer' => 
                          array (
                            'type' => 'box',
                            'layout' => 'horizontal',
                            'flex' => 0,
                            'spacing' => 'sm',
                            'contents' => 
                            array (
                              0 => 
                              array (
                                'type' => 'button',
                                'action' => 
                                array (
                                  'type' => 'message',
                                  'label' => 'confirm',
                                  'text' => 'confirm',
                                ),
                                'height' => 'sm',
                                'style' => 'link',
                              ),
                              1 => 
                              array (
                                'type' => 'button',
                                'action' => 
                                array (
                                  'type' => 'message',
                                  'label' => 'Cancel',
                                  'text' => 'Cancel',
                                ),
                                'height' => 'sm',
                                'style' => 'link',
                              ),
                            ),
                          ),
                        ),
                    );
                    $url = 'https://api.line.me/v2/bot/message/reply';
                    $data = [
                     'replyToken' => $replyToken,
                     'messages' => [$textMessageBuilder],
                    ];
                    $access_token = '+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=';
        
                    $post = json_encode($data);
                    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    $result = curl_exec($ch);
                    curl_close($ch);
                    echo $result . "\r\n";

                    break;
                    case 7 :
                        
                        $order10s = $this->order_select_10;
                   
                        $columnTemplateBuilders = [];

                        foreach ($order10s as $record) {
        
                      
                            $columnTemplateBuilder =  
                                [
                                  // $record->created_at
                                      'type' => 'box',
                                      'layout' => 'horizontal',
                                      'margin' => 'xxl',
                                      'spacing' => 'sm',
                                      'contents' => 
                                      array (
                                        0 => 
                                        array (
                                          'type' => 'text',
                                          'text' => $record['id'],
                                          'size' => 'sm',
                                          'color' => '#555555',
                                          'wrap' => true,
                                        ),
                                        1 => 
                                        array (
                                          'type' => 'text',
                                          'text' => $record['id'],
                                          'size' => 'md',
                                          'color' => '#2E7D32',
                                          'align' => 'center',
                                          'wrap' => true,
                                          'flex' => 2,
                                        ),
                                        2 => 
                                        array (
                                          'type' => 'button',
                                          'style' => 'primary',
                                          'color' => '#B2EBF2',
                                          'height' => 'sm',
                                          'flex' => 0,
                                          'action' => 
                                          array (
                                           'type' => 'message',
                                           'label' => '✏',
                                           'text' => $record['id'],
                                          ),
                                        ),
                                      ),
                                    ]
                                    ;
                            array_push($columnTemplateBuilders, $columnTemplateBuilder);
                        } 
        
                      $c = count($columnTemplateBuilders);

                      dd($c);

             



        
            }
            $response = $bot->replyMessage($replyToken,$textMessageBuilder); 
    }
    public function insert_sequentsteps($user,$seqcode,$nextseqcode)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $insert_sequentsteps = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status)VALUES('{$user}','{$seqcode}','','{$nextseqcode}','1')") or die(pg_errormessage());
        return $insert_sequentsteps;
    }
    public function seqcode_select($user)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT seqcode FROM sequentsteps WHERE sender_id = '{$user}'");
                while ($row = pg_fetch_object($result)) {
                   return $row->seqcode;
                } 
    }
    public function order_select($user)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT * FROM orders WHERE userid = '{$user}' ORDER BY id DESC limit 1");
                while ($row = pg_fetch_object($result)) {
                   return $row;
                } 
    }
    public function order_select_10($user)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT * FROM orders WHERE userid = '{$user}' and dactive = 1 ORDER BY id DESC limit 10");
        $arr = pg_fetch_all($result);
        return $arr;
    }
    public function order_select_10_count($user)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT *  FROM orders WHERE userid = '{$user}' and dactive = 1");
        // $result = mysqli_fetch_row($result);
        return $result;
    }
    public function country_select()
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT countryName FROM country ");
        $re = pg_fetch_all($result);
        return $re;
                // while ($row = pg_fetch_object($result)) {
                //    return $row->seqcode;
                // } 
    }
    public function country_select_id($country_name)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT countryid FROM country WHERE countryname ='{$country_name}'");

        while ($row = pg_fetch_object($result)) {
            return  $row->countryid;
        }  
    }
    public function country_select_name($country_id)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT countryname FROM country WHERE countryid ='{$country_id}'");

        while ($row = pg_fetch_object($result)) {
            return  $row->countryname;
        }  
    }
    public function update_sequentsteps($user,$seqcode,$nextseqcode)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string); 
        $update_sequentsteps = pg_exec($dbconn, "UPDATE sequentsteps SET  seqcode = '{$seqcode}', nextseqcode = '{$nextseqcode}' WHERE sender_id = '{$user}' ") or die(pg_errormessage());  
        return $update_sequentsteps;
    }
    public function register_insert($user,$fullname)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $register_insert = pg_exec($dbconn, "INSERT INTO users(lineid,fullname,age,email,tel,dActive)VALUES('{$user}','{$fullname}',0,'NULL','NULL','0')") or die(pg_errormessage());
        // $update_sequentsteps = pg_exec($dbconn, "UPDATE sequentsteps SET  seqcode = '{$seqcode}', nextseqcode = '{$nextseqcode}' WHERE sender_id = '{$user}' ") or die(pg_errormessage());  
        return $register_insert;
    }
    public function sequents_question($seqcode)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
                $result = pg_query($dbconn,"SELECT question FROM sequents WHERE seqcode = '$seqcode'");
                while ($row = pg_fetch_object($result)) {
                   return  $row->question;
                }  
    }
    public function delete_state($user)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
                $result = pg_query($dbconn,"DELETE FROM sequentsteps where sender_id = '{$user}' ");
                $result = pg_query($dbconn,"DELETE FROM users where lineid = '{$user}' ");
                return $result;
    }
    public function register_orders($user,$countryID)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $register_orders = pg_exec($dbconn, "INSERT INTO orders(userID,typeID,countryID  ,nVisit ,nDay ,totalPrice ,dStart ,dEnd ,dActive)VALUES('{$user}',0,'{$countryID}','NULL','NULL',0,'NULL','NULL',0)") or die(pg_errormessage());
        // $update_sequentsteps = pg_exec($dbconn, "UPDATE sequentsteps SET  seqcode = '{$seqcode}', nextseqcode = '{$nextseqcode}' WHERE sender_id = '{$user}' ") or die(pg_errormessage());  
        return $register_orders;
    }
    // public function register_update($user,$seqcode,$nextseqcode)
    // {          
    //     $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
    //     $dbconn = pg_pconnect($conn_string); 
    //     $update_sequentsteps = pg_exec($dbconn, "UPDATE users SET  seqcode = '{$seqcode}', nextseqcode = '{$nextseqcode}' WHERE sender_id = '{$user}' ") or die(pg_errormessage());  
    //     return $update_sequentsteps;
    // }
    public function plan_select($planid)
    {
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
        $result = pg_query($dbconn,"SELECT price FROM typeTravel WHERE id = '{$planid}' ");
        while ($row = pg_fetch_object($result)) {
            return  $row->price;
         }  
                // while ($row = pg_fetch_object($result)) {
                //    return $row->seqcode;
                // } 
    }
    public function register_update($user,$val,$seqcode)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
     
        $orderid1 = $this->order_select($user);
        $orderid = $orderid1->id;
        switch ($seqcode) {

            case '001':
                    $register_update = pg_exec($dbconn, "UPDATE users SET  fullname = '{$val}' WHERE lineid = '{$user}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '002':

                    $int = (int)$val;
                    $register_update = pg_exec($dbconn, "UPDATE users SET  age = '{$val}' WHERE lineid = '{$user}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '003':
                    $register_update = pg_exec($dbconn, "UPDATE users SET  email = '{$val}' WHERE lineid = '{$user}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '004':
                    $register_update = pg_exec($dbconn, "UPDATE users SET  tel = '{$val}' WHERE lineid = '{$user}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '005':
                    $register_update = pg_exec($dbconn, "UPDATE users SET  dactive = '{$val}' WHERE lineid = '{$user}' ") or die(pg_errormessage());  
                    return $register_update;
                break;

            case '006':
                    $int = (int)$val;
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  countryID = '{$val}' WHERE userID = '{$user}' and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '007':
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  dStart = '{$val}' WHERE userID = '{$user}' and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '008':
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  dEnd = '{$val}' WHERE userID = '{$user}' and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '009':
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  nVisit = '{$val}' WHERE userID = '{$user}'  and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
                break;
            case '010':
                    $int = (int)$val;
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  typeID = '{$val}' WHERE userID = '{$user}'  and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
            break;
            case '011':
                    $int = (int)$val;
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  nDay  = '{$val}' WHERE userID = '{$user}'  and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
            case '012':
                    $int = (float)$val;
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  totalPrice = '{$val}' WHERE userID = '{$user}' and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
            break;
            case '013':
                    $register_update = pg_exec($dbconn, "UPDATE orders SET  dActive  = '{$val}' WHERE userID = '{$user}' and  id =  '{$orderid}' ") or die(pg_errormessage());  
                    return $register_update;
            break;


        }
    }
    public function hislog($user)
    {

           $user = 'U2dc636d2cd052e82c29f5284e00f69b9';
           $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
           $dbconn = pg_pconnect($conn_string);
           $result = pg_query($dbconn,"SELECT * FROM orders WHERE userid = '{$user}' and dactive = 1 ORDER BY id DESC limit 10");
           $re = pg_fetch_all($result);


        return View::make('travellog')->with('record',$re);
    }



    

}  
