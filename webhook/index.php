<?php
 // Create data
 $data = http_build_query([
    'text' => 'Yes - No - Stop?',
    'chat_id' => '1978470538'
]);

// Create keyboard
$keyboard = json_encode([
    "inline_keyboard" => [
        [
            [
                "text" => "Yes",
            ],
            [
                "text" => "No",
            ],
            [
                "text" => "Stop",
            ]
        ]
    ]
]);

// Send keyboard
$url = "https://api.telegram.org/bot5459903599:AAHt_g5OEVrR8F-chcRtLQw3Wvk5KrxAlr4/sendMessage?{$data}";