<?php

namespace App\Http\Controllers;

use App\Console\Commands\Swoole;
use Illuminate\Http\Request;

class testController extends Controller
{
    private $server;
    public function __construct(Swoole $swoole)
    {
        $this->server = $swoole;
    }
    public function sendCycleCmd($sta_del,$userId,$groupId,$cycleHandler)
    {
        $frame = array('68', '00', '69', '02');
        //$this->server->sendto("")
        /*$socket1 = stream_socket_server("udp://192.168.45.91:9502", $errno, $errstr, STREAM_SERVER_BIND );
        if (!$socket1) {
            $data = ['status' => 1, 'msg' => 'error1'];
            socket_close($socket1);
            return $data;
        }
        else {
            $socket2 = stream_socket_client("udp://192.168.45.71:6000", $errno, $errstr, STREAM_SERVER_BIND );
            if (!$socket2) {
                $data = ['status' => 1, 'msg' => 'error2'];
                socket_close($socket2);
                return $data;
            }
            stream_socket_sendto($socket2, $frame, 0);
        }

        $startTime = $this->msectime();
        $timeDelay = 0;
        socket_set_blocking($socket1,0);
        do{
            usleep(10000);//1ms
            if(($pkt = stream_socket_recvfrom($socket1, 2048, STREAM_PEEK))!=''){
                break;
            }
            $timeDelay = abs($this->msectime() - $startTime);
        }while($timeDelay < 1000);
        if($timeDelay >= 1000){
            $data = ['status' => 1, 'msg' => '中间件没有回应！'];
        }else{
            $data = ['status' => 0, 'msg' => $pkt];
        }
        return $data;*/
    }
    public function msectime() {
        list($msec, $sec) = explode(' ', microtime());
        $msectime =  (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }
}
