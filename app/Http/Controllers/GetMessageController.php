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
        $user = 'U2dc636d2cd052e82c29f5284e00f69b9';
        $fullname = 'ploy';
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
        $result = pg_query($dbconn,"SELECT countryName FROM country ");
        $re = pg_fetch_all($result);
        dd($re[0]['countryname']);
        // print(pg_fetch_all($result));
        // return $register_update;

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
                $content = file_get_contents('php://input');
                   
                // กำหนดค่า signature สำหรับตรวจสอบข้อมูลที่ส่งมาว่าเป็นข้อมูลจาก LINE
                $hash = hash_hmac('sha256', $content, LINE_MESSAGE_CHANNEL_SECRET, true);
                $signature = base64_encode($hash);
                   
                // แปลงค่าข้อมูลที่ได้รับจาก LINE เป็น array ของ Event Object
                $events = $bot->parseEventRequest($content, $signature);
                $eventObj = $events[0]; // Event Object ของ array แรก
                   
                // ดึงค่าประเภทของ Event มาไว้ในตัวแปร มีทั้งหมด 7 event
                $eventType = $eventObj->getType();
                   
                // สร้างตัวแปร ไว้เก็บ sourceId ของแต่ละประเภท
                $userId = NULL;
                $groupId = NULL;
                $roomId = NULL;
                // สร้างตัวแปรเก็บ source id และ source type
                $sourceId = NULL;
                $sourceType = NULL;
                // สร้างตัวแปร replyToken และ replyData สำหรับกรณีใช้ตอบกลับข้อความ
                $replyToken = NULL;
                $replyData = NULL;
                // สร้างตัวแปร ไว้เก็บค่าว่าเป้น Event ประเภทไหน
                $eventMessage = NULL;
                $eventPostback = NULL;
                $eventJoin = NULL;
                $eventLeave = NULL;
                $eventFollow = NULL;
                $eventUnfollow = NULL;
                $eventBeacon = NULL;
                $eventAccountLink = NULL;
                $eventMemberJoined = NULL;
                $eventMemberLeft = NULL;
                // เงื่อนไขการกำหนดประเภท Event 
                switch($eventType){
                    case 'message': $eventMessage = true; break;    
                    case 'postback': $eventPostback = true; break;  
                    case 'join': $eventJoin = true; break;  
                    case 'leave': $eventLeave = true; break;    
                    case 'follow': $eventFollow = true; break;  
                    case 'unfollow': $eventUnfollow = true; break;  
                    case 'beacon': $eventBeacon = true; break;     
                    case 'accountLink': $eventAccountLink = true; break;       
                    case 'memberJoined': $eventMemberJoined = true; break;       
                    case 'memberLeft': $eventMemberLeft = true; break;                                           
                }
                // สร้างตัวแปรเก็บค่า userId กรณีเป็น Event ที่เกิดขึ้นใน USER
                if($eventObj->isUserEvent()){
                    $userId = $eventObj->getUserId();  
                    $sourceType = "USER";
                }
                // สร้างตัวแปรเก็บค่า groupId กรณีเป็น Event ที่เกิดขึ้นใน GROUP
                if($eventObj->isGroupEvent()){
                    $groupId = $eventObj->getGroupId();  
                    $userId = $eventObj->getUserId();  
                    $sourceType = "GROUP";
                }
                // สร้างตัวแปรเก็บค่า roomId กรณีเป็น Event ที่เกิดขึ้นใน ROOM
                if($eventObj->isRoomEvent()){
                    $roomId = $eventObj->getRoomId();        
                    $userId = $eventObj->getUserId();      
                    $sourceType = "ROOM";
                }
                // เก็บค่า sourceId ปกติจะเป็นค่าเดียวกันกับ userId หรือ roomId หรือ groupId ขึ้นกับว่าเป็น event แบบใด
                $sourceId = $eventObj->getEventSourceId();
                // ดึงค่า replyToken มาไว้ใช้งาน ทุกๆ Event ที่ไม่ใช่ Leave และ Unfollow Event และ  MemberLeft
                // replyToken ไว้สำหรับส่งข้อความจอบกลับ 
                if(is_null($eventLeave) && is_null($eventUnfollow) && is_null($eventMemberLeft)){
                    $replyToken = $eventObj->getReplyToken();    
                }
                  
                // ส่วนของการทำงาน
                if(!is_null($events)){
                  
                    // ถ้า bot ถูก invite เพื่อเข้า Join Event ให้ bot ส่งข้อความใน GROUP ว่าเข้าร่วม GROUP แล้ว
                    if(!is_null($eventJoin)){
                        $textReplyMessage = "ขอเข้าร่วมด้วยน่ะ $sourceType ID:: ".$sourceId;
                        $replyData = new TextMessageBuilder($textReplyMessage);                 
                    }
                      
                    // ถ้า bot ออกจาก สนทนา จะไม่สามารถส่งข้อความกลับได้ เนื่องจากไม่มี replyToken
                    if(!is_null($eventLeave)){
                  
                    }   
                      
                    // ถ้า bot ถูกเพื่มเป้นเพื่อน หรือถูกติดตาม หรือ ยกเลิกการ บล็อก
                    if(!is_null($eventFollow)){
                        $textReplyMessage = "ขอบคุณที่เป็นเพื่อน และติดตามเรา";        
                        $replyData = new TextMessageBuilder($textReplyMessage);                 
                    }
                      
                    // ถ้า bot ถูกบล็อก หรือเลิกติดตาม จะไม่สามารถส่งข้อความกลับได้ เนื่องจากไม่มี replyToken
                    if(!is_null($eventUnfollow)){
                  
                    }       
                      
                    // ถ้ามีสมาชิกคนอื่น เข้ามาร่วมใน room หรือ group 
                    // room คือ สมมติเราคุยกับ คนหนึ่งอยู่ แล้วเชิญคนอื่นๆ เข้ามาสนทนาด้วย จะกลายเป็นห้องใหม่
                    // group คือ กลุ่มที่เราสร้างไว้ มีชื่อกลุ่ม แล้วเราเชิญคนอื่นเข้ามาในกลุ่ม เพิ่มร่วมสนทนาด้วย
                    if(!is_null($eventMemberJoined)){
                            $arr_joinedMember = $eventObj->getEventBody();
                            $joinedMember = $arr_joinedMember['joined']['members'][0];
                            if(!is_null($groupId) || !is_null($roomId)){
                                if($eventObj->isGroupEvent()){
                                    foreach($joinedMember as $k_user=>$v_user){
                                        if($k_user=="userId"){
                                            $joined_userId = $v_user;
                                        }
                                    }                       
                                    $response = $bot->getGroupMemberProfile($groupId, $joined_userId);
                                }
                                if($eventObj->isRoomEvent()){
                                    foreach($joinedMember as $k_user=>$v_user){
                                        if($k_user=="userId"){
                                            $joined_userId = $v_user;
                                        }
                                    }                   
                                    $response = $bot->getRoomMemberProfile($roomId, $joined_userId);    
                                }
                            }else{
                                $response = $bot->getProfile($userId);
                            }
                            if ($response->isSucceeded()) {
                                $userData = $response->getJSONDecodedBody(); // return array     
                                // $userData['userId']
                                // $userData['displayName']
                                // $userData['pictureUrl']
                                // $userData['statusMessage']
                                $textReplyMessage = 'สวัสดีครับ คุณ '.$userData['displayName'];     
                            }else{
                                $textReplyMessage = 'สวัสดีครับ ยินดีต้อนรับ';
                            }
                //        $textReplyMessage = "ยินดีต้อนรับกลับมาอีกครั้ง ".json_encode($joinedMember);
                        $replyData = new TextMessageBuilder($textReplyMessage);                     
                    }
                      
                    // ถ้ามีสมาชิกคนอื่น ออกจากก room หรือ group จะไม่สามารถส่งข้อความกลับได้ เนื่องจากไม่มี replyToken
                    if(!is_null($eventMemberLeft)){
                      
                    }   
                  
                    // ถ้ามีกาาเชื่อมกับบัญชี LINE กับระบบสมาชิกของเว็บไซต์เรา
                    if(!is_null($eventAccountLink)){
                        // หลักๆ ส่วนนี้ใช้สำรหบัเพิ่มความภัยในการเชื่อมบัญตี LINE กับระบบสมาชิกของเว็บไซต์เรา 
                        $textReplyMessage = "AccountLink ทำงาน ".$replyToken." Nonce: ".$eventObj->getNonce();
                        $replyData = new TextMessageBuilder($textReplyMessage);                         
                    }
                              
                    // ถ้าเป็น Postback Event
                    if(!is_null($eventPostback)){
                        $dataPostback = NULL;
                        $paramPostback = NULL;
                        // แปลงข้อมูลจาก Postback Data เป็น array
                        parse_str($eventObj->getPostbackData(),$dataPostback);
                        // ดึงค่า params กรณีมีค่า params
                        $paramPostback = $eventObj->getPostbackParams();
                        // ทดสอบแสดงข้อความที่เกิดจาก Postaback Event
                        $textReplyMessage = "ข้อความจาก Postback Event Data = ";        
                        $textReplyMessage.= json_encode($dataPostback);
                        $textReplyMessage.= json_encode($paramPostback);
                        $replyData = new TextMessageBuilder($textReplyMessage);     
                    }
                    // ถ้าเป้น Message Event 
                    if(!is_null($eventMessage)){
                          
                        // สร้างตัวแปรเก็ยค่าประเภทของ Message จากทั้งหมด 7 ประเภท
                        $typeMessage = $eventObj->getMessageType();  
                        //  text | image | sticker | location | audio | video | file  
                        // เก็บค่า id ของข้อความ
                        $idMessage = $eventObj->getMessageId();          
                        // ถ้าเป็นข้อความ
                        if($typeMessage=='text'){
                            $userMessage = $eventObj->getText(); // เก็บค่าข้อความที่ผู้ใช้พิมพ์
                        }
                        // ถ้าเป็น image
                        if($typeMessage=='image'){
                  
                        }               
                        // ถ้าเป็น audio
                        if($typeMessage=='audio'){
                  
                        }       
                        // ถ้าเป็น video
                        if($typeMessage=='video'){
                  
                        }   
                        // ถ้าเป็น file
                        if($typeMessage=='file'){
                            $FileName = $eventObj->getFileName();
                            $FileSize = $eventObj->getFileSize();
                        }               
                        // ถ้าเป็น image หรือ audio หรือ video หรือ file และต้องการบันทึกไฟล์
                        if(preg_match('/image|audio|video|file/',$typeMessage)){            
                            $responseMedia = $bot->getMessageContent($idMessage);
                            if ($responseMedia->isSucceeded()) {
                                // คำสั่ง getRawBody() ในกรณีนี้ จะได้ข้อมูลส่งกลับมาเป็น binary 
                                // เราสามารถเอาข้อมูลไปบันทึกเป็นไฟล์ได้
                                $dataBinary = $responseMedia->getRawBody(); // return binary
                                // ดึงข้อมูลประเภทของไฟล์ จาก header
                                $fileType = $responseMedia->getHeader('Content-Type');    
                                switch ($fileType){
                                    case (preg_match('/^application/',$fileType) ? true : false):
                //                      $fileNameSave = $FileName; // ถ้าต้องการบันทึกเป็นชื่อไฟล์เดิม
                                        $arr_ext = explode(".",$FileName);
                                        $ext = array_pop($arr_ext);
                                        $fileNameSave = time().".".$ext;                            
                                        break;                  
                                    case (preg_match('/^image/',$fileType) ? true : false):
                                        list($typeFile,$ext) = explode("/",$fileType);
                                        $ext = ($ext=='jpeg' || $ext=='jpg')?"jpg":$ext;
                                        $fileNameSave = time().".".$ext;
                                        break;
                                    case (preg_match('/^audio/',$fileType) ? true : false):
                                        list($typeFile,$ext) = explode("/",$fileType);
                                        $fileNameSave = time().".".$ext;                        
                                        break;
                                    case (preg_match('/^video/',$fileType) ? true : false):
                                        list($typeFile,$ext) = explode("/",$fileType);
                                        $fileNameSave = time().".".$ext;                                
                                        break;                                                      
                                }
                                $botDataFolder = 'botdata/'; // โฟลเดอร์หลักที่จะบันทึกไฟล์
                                $botDataUserFolder = $botDataFolder.$userId; // มีโฟลเดอร์ด้านในเป็น userId อีกขั้น
                                if(!file_exists($botDataUserFolder)) { // ตรวจสอบถ้ายังไม่มีให้สร้างโฟลเดอร์ userId
                                    mkdir($botDataUserFolder, 0777, true);
                                }   
                                // กำหนด path ของไฟล์ที่จะบันทึก
                                $fileFullSavePath = $botDataUserFolder.'/'.$fileNameSave;
                //              file_put_contents($fileFullSavePath,$dataBinary); // เอา comment ออก ถ้าต้องการทำการบันทึกไฟล์
                                $textReplyMessage = "บันทึกไฟล์เรียบร้อยแล้ว $fileNameSave";
                                $replyData = new TextMessageBuilder($textReplyMessage);
                //              $failMessage = json_encode($fileType);              
                //              $failMessage = json_encode($responseMedia->getHeaders());
                                $replyData = new TextMessageBuilder($failMessage);                      
                            }else{
                                $failMessage = json_encode($idMessage.' '.$responseMedia->getHTTPStatus() . ' ' . $responseMedia->getRawBody());
                                $replyData = new TextMessageBuilder($failMessage);          
                            }
                        }
                        // ถ้าเป็น sticker
                        if($typeMessage=='sticker'){
                            $packageId = $eventObj->getPackageId();
                            $stickerId = $eventObj->getStickerId();
                        }
                        // ถ้าเป็น location
                        if($typeMessage=='location'){
                            $locationTitle = $eventObj->getTitle();
                            $locationAddress = $eventObj->getAddress();
                            $locationLatitude = $eventObj->getLatitude();
                            $locationLongitude = $eventObj->getLongitude();
                        }       
                          
                          
                        switch ($typeMessage){ // กำหนดเงื่อนไขการทำงานจาก ประเภทของ message
                            case 'text':  // ถ้าเป็นข้อความ
                                $userMessage = strtolower($userMessage); // แปลงเป็นตัวเล็ก สำหรับทดสอบ
                                switch ($userMessage) {
                                    case "t_b":
                                        // กำหนด action 4 ปุ่ม 4 ประเภท
                                        $actionBuilder = array(
                                            new MessageTemplateActionBuilder(
                                                'Message Template',// ข้อความแสดงในปุ่ม
                                                'This is Text' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                            ),
                                            new UriTemplateActionBuilder(
                                                'Uri Template', // ข้อความแสดงในปุ่ม
                                                'https://www.ninenik.com'
                                            ),
                                            new DatetimePickerTemplateActionBuilder(
                                                'Datetime Picker', // ข้อความแสดงในปุ่ม
                                                http_build_query(array(
                                                    'action'=>'reservation',
                                                    'person'=>5
                                                )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
                                                'datetime', // date | time | datetime รูปแบบข้อมูลที่จะส่ง ในที่นี้ใช้ datatime
                                                substr_replace(date("Y-m-d H:i"),'T',10,1), // วันที่ เวลา ค่าเริ่มต้นที่ถูกเลือก
                                                substr_replace(date("Y-m-d H:i",strtotime("+5 day")),'T',10,1), //วันที่ เวลา มากสุดที่เลือกได้
                                                substr_replace(date("Y-m-d H:i"),'T',10,1) //วันที่ เวลา น้อยสุดที่เลือกได้
                                            ),      
                                            new PostbackTemplateActionBuilder(
                                                'Postback', // ข้อความแสดงในปุ่ม
                                                http_build_query(array(
                                                    'action'=>'buy',
                                                    'item'=>100
                                                )) // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
                    //                          'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                            ),      
                                        );
                                        $imageUrl = 'https://www.mywebsite.com/imgsrc/photos/w/simpleflower';
                                        $replyData = new TemplateMessageBuilder('Button Template',
                                            new ButtonTemplateBuilder(
                                                    'button template builder', // กำหนดหัวเรื่อง
                                                    'Please select', // กำหนดรายละเอียด
                                                    $imageUrl, // กำหนด url รุปภาพ
                                                    $actionBuilder  // กำหนด action object
                                            )
                                        );              
                                        break;                                          
                                    case "p":
                                        // ถ้าขณะนั้นเป็นการสนทนาใน ROOM หรือ GROUP
                                        if(!is_null($groupId) || !is_null($roomId)){
                                            if($eventObj->isGroupEvent()){// ถ้าอยู่ใน GROUP
                                                $response = $bot->getGroupMemberProfile($groupId, $userId); // ดึงข้อมูลผู้ใช้ที่คุยกับ bot
                                            }
                                            if($eventObj->isRoomEvent()){ // ถ้าอยู่ใน ROOM
                                                $response = $bot->getRoomMemberProfile($roomId, $userId);// ดึงข้อมูลผู้ใช้ที่คุยกับ bot    
                                            }
                                        }else{ // ถ้าเป็นการสนทนา ระหว่าง BOT
                                            $response = $bot->getProfile($userId);
                                        }
                                        if ($response->isSucceeded()) {
                                            $userData = $response->getJSONDecodedBody(); // return array     
                                            // $userData['userId']
                                            // $userData['displayName']
                                            // $userData['pictureUrl']
                                            // $userData['statusMessage']
                                            $textReplyMessage = 'สวัสดีครับ คุณ '.$userData['displayName'];     
                                        }else{
                                            $textReplyMessage = 'สวัสดีครับ คุณคือใคร';
                                        }
                                        $replyData = new TextMessageBuilder($textReplyMessage);                                                 
                                        break;                          
                                    case "l": // เงื่อนไขทดสอบถ้ามีใครพิมพ์ L ใน GROUP / ROOM แล้วให้ bot ออกจาก GROUP / ROOM
                                            $sourceId = $eventObj->getEventSourceId();
                                            if($eventObj->isGroupEvent()){
                                                $bot->leaveGroup($sourceId);
                                            }
                                            if($eventObj->isRoomEvent()){
                                                $bot->leaveRoom($sourceId);  
                                            }                                                                                         
                                        break;
                                    case "a":  // เงื่อนไขกรณีต้องการ เชื่อม Line  account กับ ระบบสมาชิกของเว็บไซต์เรา
                                        $response = $httpClient->post("https://api.line.me/v2/bot/user/".urlencode($userId)."/linkToken",array());
                                        $result = json_decode($response->getRawBody(),TRUE);
                                        // กำหนด action 4 ปุ่ม 4 ประเภท
                                        $actionBuilder = array(
                                            new UriTemplateActionBuilder(
                                                'Account Link', // ข้อความแสดงในปุ่ม
                                                'https://www.example.com/link.php?linkToken='.$result['linkToken']
                                            ) 
                                        );
                                        $imageUrl = ''; //กำหนด url รุปภาพ ถ้ามี
                                        $replyData = new TemplateMessageBuilder('Button Template',
                                            new ButtonTemplateBuilder(
                                                    'Account Link', // กำหนดหัวเรื่อง
                                                    'Please select', // กำหนดรายละเอียด
                                                    $imageUrl, // กำหนด url รุปภาพ
                                                    $actionBuilder  // กำหนด action object
                                            )
                                        );       
                                        break;                                                                     
                                    default:
                                        $textReplyMessage = " คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                                        $replyData = new TextMessageBuilder($textReplyMessage);         
                                        break;                                      
                                }
                                break;                                                  
                            default:
                                if(!is_null($replyData)){
                                      
                                }else{
                                    // กรณีทดสอบเงื่อนไขอื่นๆ ผู้ใช้ไม่ได้ส่งเป็นข้อความ
                                    $textReplyMessage = 'สวัสดีครับ คุณ '.$typeMessage;         
                                    $replyData = new TextMessageBuilder($textReplyMessage);         
                                }
                                break;  
                        }
                    }
                }
                  
                $response = $bot->replyMessage($replyToken,$replyData);
                if ($response->isSucceeded()) {
                    echo 'Succeeded!';
                    return;
                }
                // Failed
                echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

            }

    public function replymessage($replyToken,$userMessage,$case)
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
                            "altText" => "this is a confirm template",
                            "template" => array(
                                "type" => "confirm",
                                "text" => "Are you sure?",
                                "actions" => [
                                    array(
                                      "type" => "datetimepicker",
                                      "data" => "datestring", // will be included in postback action
                                      "label" => "Please Choose",
                                      "mode" => "date", // date | time | datetime
                                      //"initial": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                      //"max": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                      //"min": "", // 2017-06-18 | 00:00 | 2017-06-18T00:00
                                    ),
                                    array(
                                      "type" => "message",
                                      "label" => "No",
                                      "text" => "no"
                                    )
                                ]
                            )
                          )
                        ]
                    ];
                    $post = json_encode($data);
                    $access_token'+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=';
                    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    $result = curl_exec($ch);
                    curl_close($ch);
                  
                        // $datetimePicker = new DatetimePickerTemplateActionBuilder(
                        //     'Select date',
                        //     'storeId=12345',
                        //     'datetime',
                        //     '2017-12-25t00:00',
                        //     '2018-01-24t23:59',
                        //     '2017-12-25t00:00'
                        // );

                        // $quickReply = new QuickReplyMessageBuilder([
                        //     new QuickReplyButtonBuilder(new LocationTemplateActionBuilder('Location')),
                        //     new QuickReplyButtonBuilder($datetimePicker),
                        // ]);
                        // $textMessageBuilder = new TextMessageBuilder('Text with quickReply buttons', $quickReply);               
                    break;
        
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
        $register_insert = pg_exec($dbconn, "INSERT INTO users(lineid,fullname,age,email,tel,dActive)VALUES('{$user}','{$fullname}',0,'NULL','NULL','1')") or die(pg_errormessage());
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
    // public function register_update($user,$seqcode,$nextseqcode)
    // {          
    //     $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
    //     $dbconn = pg_pconnect($conn_string); 
    //     $update_sequentsteps = pg_exec($dbconn, "UPDATE users SET  seqcode = '{$seqcode}', nextseqcode = '{$nextseqcode}' WHERE sender_id = '{$user}' ") or die(pg_errormessage());  
    //     return $update_sequentsteps;
    // }
    public function register_update($user,$val,$seqcode)
    {          
        $conn_string = "host=ec2-50-19-127-115.compute-1.amazonaws.com port=5432 dbname=d7g7emtks53g61 user=unzugplrlxhlus password=6c4119aeed2e68f47cb7f66d964e9d984471a6fc2bdabadba149f298eb40aa6b";
        $dbconn = pg_pconnect($conn_string);
     

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

        }
    }


    

}  
