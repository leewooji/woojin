<?php
$access_token = 'Ss8Yzw7R8t3wbyXWsBuP0Wjo1/j6Cm+vOmf2NiDl6q/Xesmhj9lCMoJEKhoXLfvR6bHo4L95eiTYC3HFkeRnTa9/c+1/JlS8QIDwC8XsYSJ/0Re+Q7ZTsQpTSJzxXVsIC+umGVHguuPlY60FN/SB5wdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'hello'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'สวัสดีครัชช'
				];
			}
			else if($text == 'test'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ทดสอบๆ'
				];
			}
			else if($text == 'ทำไรอยู่'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'MissYou'
				];
			}
			
			else if($text == 'TheEasrLight'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'TI Got You'
				];
			}
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
