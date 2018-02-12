<?php
    $compliments = array();
    // Compliments
    array_push($compliments, 'You are so skilled at your job! I\'m so jealous of your work ethic.');

    $data = array(
        'channel'     => '#general',
        'username'    => 'The Saddest Girl',
        'icon_emoji'  => ':woman-pouting::skin-tone-2:',
        'attachments' => array([
            'color'    => '#ffb0b0',
            'fields'   => array(
                [
                    'title' => 'It\'s been too long since anyone complimented you!',
                    'value' => $compliments[rand(1,sizeof($compliments)) - 1],
                    'short' => false
                ]
            )
        ])
    );

    $data_string = json_encode($data);
    $ch = curl_init('https://hooks.slack.com/services/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');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

    curl_exec($ch);
 ?>