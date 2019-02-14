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
	
	if($pesan_datang=='/admin')
	{
		
		
         $balas = array(
	'replyToken' => $replyToken,														
         'messages' => array(
								array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://example.com/bot/images/item1.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'this is menu',
        'text' => 'description',
        'defaultAction' => 
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => 'Buy',
            'data' => 'action=buy&itemid=111',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => 'Add to cart',
            'data' => 'action=add&itemid=111',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'View detail',
            'uri' => 'http://example.com/page/111',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://example.com/bot/images/item2.jpg',
        'imageBackgroundColor' => '#000000',
        'title' => 'this is menu',
        'text' => 'description',
        'defaultAction' => 
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/222',
        ),
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => 'Buy',
            'data' => 'action=buy&itemid=222',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => 'Add to cart',
            'data' => 'action=add&itemid=222',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'View detail',
            'uri' => 'http://example.com/page/222',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'cover',
  ),
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
