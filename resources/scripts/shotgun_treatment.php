<?php
    require_once '../config.php';
    require_once('../functions.php');
    $db = sql_connect();
    $query  = "SELECT * FROM ".$config['shotgunTable']." ;";
    $params = array();
    $etus   = sql_query($query,$params);
    $nb_etu = 0;

foreach($etus as $etu){
    $nb_etu++;
    try {
        $ginger = file_get_contents("https://assos.utc.fr/ginger/v1/".$etu['login']."?key=".$config['gingerApiKey']);
        $ginger = json_decode($ginger);
        if(!is_null($ginger)){
            if($ginger->is_cotisant){

                if($nb_etu<$config['limitNumber']){
                    ###########################################################################
                    ###########################################################################
                    // 
                    // Here type your own treatment
                    // 
                    ###########################################################################
                    ###########################################################################

                    $destinataire = ($ginger -> mail);
                    $sujet = $config['mailSuccessObject'] ;
                    
                    //Headers for html in utf-8 encoding + from header
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $headers .= 'From: '.$config['mailFromHeader']."\r\n";
            
                    $message = $config['mailSuccessContent'];
            
            
                    mail($destinataire, $sujet, $message, $headers) ; // Envoi du mail 
                    $ginger = json_encode($ginger);
                    file_put_contents("../logs/success.txt", "SHOTGUN: SUCCESS".$ginger."\n", FILE_APPEND);
                }elseif ($config['sendFailMail']) {
                    
                    $destinataire = ($ginger -> mail);
                    $sujet = $config['mailFailObject'] ;
                    
                    //Headers for html in utf-8 encoding + from header
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $headers .= 'From: '.$config['mailFromHeader']."\r\n";
            
                    $message = $config['mailFailContent'];
            
            
                    mail($destinataire, $sujet, $message, $headers) ; // Envoi du mail 
                    $ginger = json_encode($ginger);
                    file_put_contents("../logs/success.txt", "SHOTGUN: FAIL".$ginger."\n", FILE_APPEND);
                }
            }
        }else{
            $content_to_append = $etu['login']."\n"."Reason: NON COTISANT \n";
            file_put_contents("../tools/logs/fail.txt", $content_to_append, FILE_APPEND);
        }
    }catch (Exception $ex){
        $content_to_append = $etu['login']."\n"."Reason: FAIL GET \n";
        file_put_contents("../tools/logs/fail.txt", $content_to_append, FILE_APPEND);
    }
}
?>