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
                
                // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array

                
                $events = json_decode($content, true);
                
                    if(!is_null($events)){

                        $replyInfo =$events['events'][0]['type'];
                        // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
                        $replyToken  = $events['events'][0]['replyToken'];
                        $user        = $events['events'][0]['source']['userId'];
                    // $userMessage = $events['events'][0]['message']['text'];
                        $typeMessage = $events['events'][0]['message']['type'];
                        $idMessage   = $events['events'][0]['message']['id']; 
                    }
                // ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
                // $textMessageBuilder = new TextMessageBuilder(json_encode($events));
               
                // //l ส่วนของคำสั่งตอบกลับข้อความ
                // $response = $bot->replyMessage($replyToken,$textMessageBuilder);
            //     if ($response->isSucceeded()) {
            //         echo 'Succeeded!';
            //         return;
            //     }
            //    // $users = users::insert(['sender_id'=>$user,'seqcode' => $seqcode,'answer' => 'NULL','nextseqcode' =>$nextseqcode,'status'=>'0','created_at'=>NOW() , 'updated_at'=>NOW()]);
            //     // Failed
            //     echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
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

///////////////////////////////////////////////////
       // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');
 
// แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $userID = $events['events'][0]['source']['userId'];
    $sourceType = $events['events'][0]['source']['type'];        
    $is_postback = NULL;
    $is_message = NULL;
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
    if(!is_null($is_postback)){
        $textReplyMessage = "ข้อความจาก Postback Event Data = ";
        if(is_array($dataPostback)){
            $textReplyMessage.= json_encode($dataPostback);
        }
        if(!is_null($paramPostback)){
            $textReplyMessage.= " \r\nParams = ".$paramPostback;
        }
        $replyData = new TextMessageBuilder($textReplyMessage);     
    }
    if(!is_null($is_message)){
        switch ($typeMessage){
            case 'text':
                $userMessage = strtolower($userMessage); // แปลงเป็นตัวเล็ก สำหรับทดสอบ
                switch ($userMessage) {
                    case "t":
                        $textReplyMessage = "Bot ตอบกลับคุณเป็นข้อความ";
                        $replyData = new TextMessageBuilder($textReplyMessage);
                        break;
                    case "i":
                        $picFullSize = 'https://www.mywebsite.com/imgsrc/photos/f/simpleflower';
                        $picThumbnail = 'https://www.mywebsite.com/imgsrc/photos/f/simpleflower/240';
                        $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
                        break;
                    case "v":
                        $picThumbnail = 'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/240';
                        $videoUrl = "https://www.ninenik.com/line/simplevideo.mp4";             
                        $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
                        break;
                    case "a":
                        $audioUrl = "https://www.ninenik.com/line/S_6988827932080.wav";
                        $replyData = new AudioMessageBuilder($audioUrl,20000);
                        break;
                    case "l":
                        $placeName = "ที่ตั้งร้าน";
                        $placeAddress = "แขวง พลับพลา เขต วังทองหลาง กรุงเทพมหานคร ประเทศไทย";
                        $latitude = 13.780401863217657;
                        $longitude = 100.61141967773438;
                        $replyData = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);              
                        break;
                    case "m":
                        $textReplyMessage = "Bot ตอบกลับคุณเป็นข้อความ";
                        $textMessage = new TextMessageBuilder($textReplyMessage);
                                         
                        $picFullSize = 'https://www.mywebsite.com/imgsrc/photos/f/simpleflower';
                        $picThumbnail = 'https://www.mywebsite.com/imgsrc/photos/f/simpleflower/240';
                        $imageMessage = new ImageMessageBuilder($picFullSize,$picThumbnail);
                                         
                        $placeName = "ที่ตั้งร้าน";
                        $placeAddress = "แขวง พลับพลา เขต วังทองหลาง กรุงเทพมหานคร ประเทศไทย";
                        $latitude = 13.780401863217657;
                        $longitude = 100.61141967773438;
                        $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
     
                        $multiMessage =     new MultiMessageBuilder;
                        $multiMessage->add($textMessage);
                        $multiMessage->add($imageMessage);
                        $multiMessage->add($locationMessage);
                        $replyData = $multiMessage;                                     
                        break;                  
                    case "s":
                        $stickerID = 22;
                        $packageID = 2;
                        $replyData = new StickerMessageBuilder($packageID,$stickerID);
                        break;      
                    case "im":
                        $imageMapUrl = 'https://www.mywebsite.com/imgsrc/photos/w/sampleimagemap';
                        $replyData = new ImagemapMessageBuilder(
                            $imageMapUrl,
                            'This is Title',
                            new BaseSizeBuilder(699,1040),
                            array(
                                new ImagemapMessageActionBuilder(
                                    'test image map',
                                    new AreaBuilder(0,0,520,699)
                                    ),
                                new ImagemapUriActionBuilder(
                                    'http://www.ninenik.com',
                                    new AreaBuilder(520,0,520,699)
                                    )
                            )); 
                        break;          
                    case "tm":
                        $replyData = new TemplateMessageBuilder('Confirm Template',
                            new ConfirmTemplateBuilder(
                                    'Confirm template builder',
                                    array(
                                        new MessageTemplateActionBuilder(
                                            'Yes',
                                            'Text Yes'
                                        ),
                                        new MessageTemplateActionBuilder(
                                            'No',
                                            'Text NO'
                                        )
                                    )
                            )
                        );
                        break;          
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
    //                          'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                            ),      
                        );
                        $imageUrl = 'https://www.mywebsite.com/imgsrc/photos/w/simpleflower';
                        $replyData = new TemplateMessageBuilder('Button Template',
                            new ButtonTemplateBuilder(
                                    'button template builder', // กำหนดหัวเรื่อง
                                    'Please select', // กำหนดรายละเอียด
                                    $imageUrl, // กำหนด url รุปภาพ
                                    $actionBuilder  // กำหนด action object
                            )
                        );              
                        break;      
                    case "t_f":
                        $replyData = new TemplateMessageBuilder('Confirm Template',
                            new ConfirmTemplateBuilder(
                                    'Confirm template builder', // ข้อความแนะนหรือบอกวิธีการ หรือคำอธิบาย
                                    array(
                                        new MessageTemplateActionBuilder(
                                            'Yes', // ข้อความสำหรับปุ่มแรก
                                            'YES'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                        ),
                                        new MessageTemplateActionBuilder(
                                            'No', // ข้อความสำหรับปุ่มแรก
                                            'NO' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                        )
                                    )
                            )
                        );
                        break;      
                    case "t_c":
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
                            new PostbackTemplateActionBuilder(
                                'Postback', // ข้อความแสดงในปุ่ม
                                http_build_query(array(
                                    'action'=>'buy',
                                    'item'=>100
                                )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
                                'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                            ),      
                        );
                        $replyData = new TemplateMessageBuilder('Carousel',
                            new CarouselTemplateBuilder(
                                array(
                                    new CarouselColumnTemplateBuilder(
                                        'Title Carousel',
                                        'Description Carousel',
                                        'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                                        $actionBuilder
                                    ),
                                    new CarouselColumnTemplateBuilder(
                                        'Title Carousel',
                                        'Description Carousel',
                                        'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                                        $actionBuilder
                                    ),
                                    new CarouselColumnTemplateBuilder(
                                        'Title Carousel',
                                        'Description Carousel',
                                        'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                                        $actionBuilder
                                    ),                                          
                                )
                            )
                        );
                        break;      
                    case "t_ic":
                        $replyData = new TemplateMessageBuilder('Image Carousel',
                            new ImageCarouselTemplateBuilder(
                                array(
                                    new ImageCarouselColumnTemplateBuilder(
                                        'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                                        new UriTemplateActionBuilder(
                                            'Uri Template', // ข้อความแสดงในปุ่ม
                                            'https://www.ninenik.com'
                                        )
                                    ),
                                    new ImageCarouselColumnTemplateBuilder(
                                        'https://www.mywebsite.com/imgsrc/photos/f/sampleimage/700',
                                        new UriTemplateActionBuilder(
                                            'Uri Template', // ข้อความแสดงในปุ่ม
                                            'https://www.ninenik.com'
                                        )
                                    )                                       
                                )
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
                $textReplyMessage = json_encode($events);
                $replyData = new TextMessageBuilder($textReplyMessage);         
                break;  
        }
    }
}
$response = $bot->replyMessage($replyToken,$replyData);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}
         

            // return $this->replymessage($replyToken,$userMessage,$case);

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
