<?php

namespace frontend\controllers;

use frontend\repositories\TestRepository;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TestController extends Controller
{


    private $testRepository;

    public function __construct($id, $module,
                                TestRepository $testRepository,
                                $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->testRepository = $testRepository;
    }

    public function actionIndex()
    {

        $posts[] = array(
            'hello' => 'world',
            'coding' => 'is cool',
        );
        $json = json_encode($posts);
        if (file_put_contents("data.json", $json))
            echo "JSON file created successfully";
        else
            echo "Some Error creating json file";

    }

    public function actionIp()
    {
        function getUserIP()
        {
            $clientIP = '0.0.0.0';

            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $clientIP = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
                # when behind cloudflare
                $clientIP = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
                $clientIP = $_SERVER['HTTP_X_FORWARDED'];
            } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                $clientIP = $_SERVER['HTTP_FORWARDED_FOR'];
            } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
                $clientIP = $_SERVER['HTTP_FORWARDED'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $clientIP = $_SERVER['REMOTE_ADDR'];
            }
            return $clientIP;
        }
        function getUserOS() {

            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $os_platform =   "Bilinmeyen İşletim Sistemi";
            $os_array =   array(
                '/windows nt 10/i'      =>  'Windows 10',
                '/windows nt 6.3/i'     =>  'Windows 8.1',
                '/windows nt 6.2/i'     =>  'Windows 8',
                '/windows nt 6.1/i'     =>  'Windows 7',
                '/windows nt 6.0/i'     =>  'Windows Vista',
                '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                '/windows nt 5.1/i'     =>  'Windows XP',
                '/windows xp/i'         =>  'Windows XP',
                '/windows nt 5.0/i'     =>  'Windows 2000',
                '/windows me/i'         =>  'Windows ME',
                '/win98/i'              =>  'Windows 98',
                '/win95/i'              =>  'Windows 95',
                '/win16/i'              =>  'Windows 3.11',
                '/macintosh|mac os x/i' =>  'Mac OS X',
                '/mac_powerpc/i'        =>  'Mac OS 9',
                '/linux/i'              =>  'Linux',
                '/ubuntu/i'             =>  'Ubuntu',
                '/iphone/i'             =>  'iPhone',
                '/ipod/i'               =>  'iPod',
                '/ipad/i'               =>  'iPad',
                '/android/i'            =>  'Android',
                '/blackberry/i'         =>  'BlackBerry',
                '/webos/i'              =>  'Mobile'
            );

            foreach ( $os_array as $regex => $value ) {
                if ( preg_match($regex, $user_agent ) ) {
                    $os_platform = $value;
                }
            }
            return $os_platform;
        }

        function getUserBrowser() {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $browser        = "Bilinmeyen Tarayıcı";
            $browser_array  = array(
                '/msie/i'       =>  'Internet Explorer',
                '/firefox/i'    =>  'Firefox',
                '/safari/i'     =>  'Safari',
                '/chrome/i'     =>  'Chrome',
                '/edge/i'       =>  'Edge',
                '/opera/i'      =>  'Opera',
                '/netscape/i'   =>  'Netscape',
                '/maxthon/i'    =>  'Maxthon',
                '/konqueror/i'  =>  'Konqueror',
                '/mobile/i'     =>  'Handheld Browser'
            );

            foreach ( $browser_array as $regex => $value ) {
                if ( preg_match( $regex, $user_agent ) ) {
                    $browser = $value;
                }
            }
            return $browser;
        }

        return getUserOS() . " - " .getUserBrowser() . " - ". getUserIP();
    }


    public function actionMvc()
    {
        $data = $this->testRepository->getData();
        return $this->render('mvc',[
           'data'=>$data
        ]);

    }
    public function actionView()
    {
        $data = $this->testRepository->getData();
        return $this->render('@app/views/test/view',[
            'data'=>$data
        ]);

    }
    public function actionJson()
    {
        $json = file_get_contents('data.json');

        $json_data = json_decode($json,true);

        return $this->render('view',[
            'data'=>$json_data
        ]);

    }
}

?>