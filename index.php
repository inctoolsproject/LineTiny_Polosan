<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = 'Hmwr6BKg1UvlSp83+b+f4kcYyNXYPc8qedqzUB7gx6A8snwNm3+xhwR3ktUyiw5zmAS/BLWvZdln2gFN8aPYI1HWTZaPEur1IVoHp+Qv/CD52sdAl0iRT3uRBSqjbyfX6uFNq7OyXFIOurBQcxPvtAdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '9ef7d27023bb718f84ec84ae78393a39';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];

//pesan bergambar
if($message['type']=='text')
{
	if($pesan_datang=='Hi')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Halo'
									)
							)
						);
				
	}

}
 
$result =  json_encode($balas);
//$result = ob_get_clean();

file_put_contents('./balasan.json',$result);


$client->replyMessage($balas);

?>
