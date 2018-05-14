<?php
/**
 * Created by PhpStorm.
 * User: mallo
 * Date: 17-2-22
 * Time: 上午8:58
 */

namespace App\handlers;

use App\Events\TaskWasFinished;
use App\Http\Model\cycleTask\event_record;
use App\Http\Model\singleTask\single_task_result;
use App\Http\Model\useradmin;
use App\Repositories\TypeConversionRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use swoole_server;

class SwooleHandler
{
    /*public function onStart( $serv ) {
        echo "Start\n";
        //$serv->sendto("192.168.45.53",6000,"hello");
    }
    public function onConnect( $serv, $fd, $from_id ) {
        echo "Client {$fd} connect\n";
    }
    public function onReceive( swoole_server $serv, $fd, $from_id, $data )
    {
        echo "Get Message From Client {$fd}:{$data}\n";
        // send a task to task worker.
        $param = array(
            'fd' => $fd
        );
        $serv->task(json_encode($param));
        echo "Continue Handle Worker\n";
    }
    public function onClose( $serv, $fd, $from_id ) {
        echo "Client {$fd} close connection\n";
    }
    public function onTask($serv,$task_id,$from_id, $data) {
        echo "This Task {$task_id} from Worker {$from_id}\n";
        echo "Data: {$data}\n";
        for($i = 0 ; $i < 10 ; $i ++ ) {
            sleep(1);
            echo "Taks {$task_id} Handle {$i} times...\n";
        }
        $fd = json_decode( $data , true )['fd'];
        $serv->send( $fd , "Data in Task {$task_id}");
        return "Task {$task_id}'s result";
    }
    public function onFinish($serv,$task_id, $data) {
        echo "Task {$task_id} finish\n";
        echo "Result: {$data}\n";
    }*/



    public function onReceive( swoole_server $serv,$data,$clientInfo ) {
        /*$serv->sendto('192.168.45.53',9503,"Server".$data);
        var_dump($clientInfo);*/
        /*$typeCon = new TypeConversionRepository();
        $user='';
        if($data[13] == '1'){
            $user = hexdec(substr($data,24,2));
            //$event = single_task_result::where('handle_event',$eventId)->first();
        }elseif($data[13] == '2'){
            $eventId = $typeCon->hexStr2str(substr($data,18,8));
            $event = event_record::where('handle_event',$eventId)->first();
            $user = $event['useradmin_id'];
        }
        $message = json_encode($data);
        event(new TaskWasFinished($message,$user));*/
    }
}