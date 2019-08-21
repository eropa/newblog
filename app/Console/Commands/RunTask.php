<?php

namespace App\Console\Commands;

use App\Model\Logmodel;
use App\Model\Optionsait;
use App\Service\OptionService;
use App\User;
use Illuminate\Console\Command;

class RunTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runtask';

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
        $serOpt=new OptionService();
        $option=new Optionsait();
        $api_key=$serOpt->GetValue('api');
        //
        $modelLog=new Logmodel();
        $modelLog->logtext="start task";
        $modelLog->save();

        $message ='Your message';
        $url = 'http://serverapi.test/api/person?api_key='.$api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $datas=json_decode($response);
        foreach($datas as $data){

            $userdata=User::where('email', $data->email)->first();

            if(is_null($userdata)){
                $newuser=new User();
                $newuser->name=$data->name;
                $newuser->email=$data->email;
                $newuser->password= $data->password;
                $newuser->save();
            }else{
                $userdata->name=$data->name;
                $userdata->email=$data->email;
                $userdata->password=$data->password;
                $userdata->save();
            }

        }
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        $modelLog=new Logmodel();
        $modelLog->logtext="stop task";
        $modelLog->save();
    }
}
