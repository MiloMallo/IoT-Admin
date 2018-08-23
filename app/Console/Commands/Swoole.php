<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use swoole_server;

class Swoole extends Command
{
    public $serv;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'swoole {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arg=$this->argument('action');
        switch($arg)
        {
            case 'start':
                $this->info('swoole observer started');
                $this->start();
                break;
        }
    }
    private function start()
    {
        //$this->serv = new \swoole_server("0.0.0.0",9503,SWOOLE_BASE,SWOOLE_SOCK_TCP);
        /*$this->serv->on('Packet',function($serv,$data,$clientInfo){
            $serv->sendto('192.168.45.53',9503,"Server".$data);
            var_dump($clientInfo);
        });*/
/*        $handler = app('swoole');
        $this->serv->on('Packet', array($handler, 'onReceive'));
        $this->serv->on('connect', function ($this->serv, $fd){
            echo "connection open: {$fd}\n";
        });
        $this->serv->on('receive', function ($handler, $fd, $reactor_id, $data) {
            $handler->send($fd, "Swoole: {$data}");
            $handler->close($fd);
        });
        $this->serv->on('close', function ($handler, $fd) {
            echo "connection close: {$fd}\n";
        });
        $this->serv->start();*/


        $this->serv = new \swoole_server("0.0.0.0", 9503);
        $handler = app('swoole');
        $this->serv->on('Packet', array($handler, 'onReceive'));
        $this->serv->on('connect', function ($server, $fd){
            echo "connection open: {$fd}\n";
        });
        $this->serv->on('receive', function ($server, $fd, $reactor_id, $data) {
            $server->send($fd, "Swoole: {$data}");

            $server->close($fd);
        });
        $this->serv->on('close', function ($server, $fd) {
            echo "connection close: {$fd}\n";
        });
        $this->serv->start();
    }

    public function sendto($ip,$port,$data)
    {
        $this->serv->sendto($ip,$port,$data);
    }
}

