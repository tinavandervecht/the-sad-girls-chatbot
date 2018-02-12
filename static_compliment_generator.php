<?php
    date_default_timezone_set('est');
    $hour = date('G');

    if (rand(0,1) == 1 && ($hour > '09' && $hour < '17')) {
        $credentials = json_decode(file_get_contents('./credentials.json'));
        $compliments = array();
        // Compliments
        array_push($compliments, 'You are so skilled at your job! I\'m so jealous of your work ethic.');
        array_push($compliments, '@alicia, I have to say your eyebrows are _fantastic_! Really, life goals.');
        array_push($compliments, 'Don\'t listen to what dumb boys say. Y\'all are so far above them.');
        array_push($compliments, 'I just wanted to let you gals know: You are the most perfect you there is.');
        array_push($compliments, 'It\'s been awhile! Just wanted to remind you that your perspectives are _super_ refreshing!');
        array_push($compliments, 'Hey @alicia! Is that your picture next to "charming" in the dictionary?');
        array_push($compliments, 'Hey: You\'re even more beautiful on the inside than you are on the outside.');
        array_push($compliments, 'How is it that you guys always look great, even in sweatpants?');
        array_push($compliments, 'Psst: When you say, "I meant to do that," I totally believe you.');
        array_push($compliments, 'Your hair looks stunning. Just thought you should know!');
        array_push($compliments, 'Y\'all are more fun than a ball pit filled with candy. (And seriously, what could be more fun than that?)');
        array_push($compliments, 'You should be thanked more often. So thank you!!');
        array_push($compliments, 'Just in case no one\'s told you recently: You\re a great example to others.');
        array_push($compliments, 'Just wanted to give you all the love and all the attention you need.');
        array_push($compliments, 'You\'re like really pretty and skinny.');
        array_push($compliments, '@tina, woah your ideas are so valued.');
        array_push($compliments, '@tina, stop working so hard girl.');
        array_push($compliments, 'Can I get your opinion on something? You always have such a great perspective.');
        array_push($compliments, 'You shouldn\'t wear makeup, it\'s messing with perfection!');
        array_push($compliments, 'Ladies: you are all such special snowflakes');


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
        $ch = curl_init($credentials[0]->slackHook);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );

        curl_exec($ch);
    }
 ?>