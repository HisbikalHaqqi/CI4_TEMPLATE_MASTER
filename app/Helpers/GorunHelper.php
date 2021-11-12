<?php
class GoRunHelper{
    
    public function connect_ws($function, $token = '', $user = ''){
        $param = array(
            'REQUEST' => json_encode($param)
        );

        $url = getEnv('app.api').'/'.$function;
        $ch  = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer '.$token,
            'User: ' .$user,
        ));
        curl_setopt($ch, CURLOPT_POST, $param);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $param);

        $res = curl_exec($ch);
        curl_close($ch);

        if ($res == null) {
            $resNull = array(
                'Response' => array(
                    'ErrorCode'     => "ER-088",
                    'ResponseCode'  => "088",
                    'ResponseDesc'  => "Connection Refused"
                )
            );
            $res = json_encode($resNull);
        }
        else{
            $resAPI     = json_decode($res);
            $resAPIDesc = $resAPI->Response->ResponseDesc;
            if($resAPIDesc == "Token Invalid"){
                echo "<script type='text/javascript'>";
                echo "$('html').html('');";
                echo "alert('Session login Anda telah habis !');";
                echo "window.location.href='".site_url('User/logout')."';";
                echo "</script>";
            }
        }
        return $res;
    }
}
?>