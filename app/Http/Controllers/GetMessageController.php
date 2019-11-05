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
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
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
use Carbon\Carbon;

define('LINE_MESSAGE_CHANNEL_SECRET','572a7adea7a0959295e21cb626dae011');
define('LINE_MESSAGE_ACCESS_TOKEN','+IjrIOkZicoc0yD2SDmkSjB0pJliCCtwvMlKzjgYmMSzsTE5hiofD9FPmdZCLgFQtLA952UKN+WigumQWopa81HhPgeoreDOyw+MOjdcQi5UrRAq9YypzFKH5yeVEkkkyC1mLeB0G4W2z5INBjyHgQdB04t89/1O/w1cDnyilFU=');


class GetMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response



     */

   
    public function index(){
        echo '5555';
        // $conn_string = "host=ec2-54-227-247-225.compute-1.amazonaws.com port=5432 dbname=d6sqa1kjuhkplb user=kdhscmqukijgmf password=69ed8377f66479ac6222f469c6fa6cd2b2318b0ce23fd6a3f0cd7b94f18606ca";
        // $dbconn = pg_pconnect($conn_string);
            
        //   $user = 'U2dc636d2cd052e82c29f5284e00f69b9';
        //     echo $user;
        // $users_register = users_register::insert(['user_id'=>'$user','user_name' =>' $user_name' ,'status' => '4','user_age'=>'0','user_height'=>'0','user_Pre_weight'=>'0','user_weight'=>'0','preg_week'=>'0', 'phone_number'=>'NULL','email' =>'NULL','hospital_name'=>'NULL','hospital_number'=>'NULL','history_medicine'=>'NULL', 'history_food'=>'NULL','active_lifestyle'=>'0','created_at'=>Carbon::now(),'updated_at' =>Carbon::now(),'date_preg'=>'NULL','dateofbirth'=>'NULL','ulife_connect'=>'0']);
        // dd($users_register); 
        
        $hostname ='us-cdbr-iron-east-05.cleardb.net';
        $username ='b74ad905a9cc1e';
        $password ='bf1cdf81';
        $database ='heroku_0f89376d5e06de8';

        $conn = mysqli_connect($hostname, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // $conn = mysqli_connect($conn);
        $sql = "INSERT INTO users (lineid, fullname, email, tel, dActive, dCreated)
                 VALUES ('u2333','John','john@example.com','0896543322',1,now())";
        $conn->query($sql);
        $sql1 = "UPDATE users SET fullname='Doe' WHERE lineid = 'u2333'";
        $conn->query($sql1);
                  
    }
     public function getmessage()
    {         
            // เชื่อมต่อกับ LINE Messaging API
                $httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
                $bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
                
                // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
                $content = file_get_contents('php://input');
                
                // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
                $events = json_decode($content, true);
                    if(!is_null($events)){
                        // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
                        $replyToken  = $events['events'][0]['replyToken'];
                        $user        = $events['events'][0]['source']['userId'];
                    // $userMessage = $events['events'][0]['message']['text'];
                        $typeMessage = $events['events'][0]['message']['type'];
                        $idMessage   = $events['events'][0]['message']['id']; 
                    }
                // ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
            //     $textMessageBuilder = new TextMessageBuilder(json_encode($events));
               
            //     //l ส่วนของคำสั่งตอบกลับข้อความ
            //     $response = $bot->replyMessage($replyToken,$textMessageBuilder);
            //     if ($response->isSucceeded()) {
            //         echo 'Succeeded!';
            //         return;
            //     }
            //    // $users = users::insert(['sender_id'=>$user,'seqcode' => $seqcode,'answer' => 'NULL','nextseqcode' =>$nextseqcode,'status'=>'0','created_at'=>NOW() , 'updated_at'=>NOW()]);
            //     // Failed
            //     echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

///////////////////////////////////////////////////
   if($typeMessage=='text'){
            if(!is_null($events)){
                $userMessage = $events['events'][0]['message']['text'];
            }
                if(strpos($userMessage, 'hi') !== false){
                        $case = 1;
                        $userMessage = 'สวัสดีค่ะ ต้องการนัดกลืนแร่ไหมคะ';
                }else{
                        $case = 1;
                        $userMessage = 'ออกจากการนัดกลืนแร่เรียบร้อย';
                }
    }
  //////////////////////////////////////////////////////        

  return $this->replymessage($replyToken,$userMessage,$case);

}

    public function replymessage($replyToken,$userMessage,$case)
    {
        $httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
        $bot = new LINEBot($httpClient, array('channelSecret' =>LINE_MESSAGE_CHANNEL_SECRET));
            
            switch($case) {
    
                case 1 : 
                        $textMessageBuilder = new TextMessageBuilder($userMessage);
                    break;
                case 2 : 
                        $textMessageBuilder = new TextMessageBuilder($userMessage);
                    break;
        
            }
            $response = $bot->replyMessage($replyToken,$textMessageBuilder); 
    }
}