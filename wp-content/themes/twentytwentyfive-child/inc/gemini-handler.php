<?php
// Gemini API Handler
function get_gemini_suggestion($user_message) {
    // 1. Model update (Flash fast hai aur medical suggestions ke liye best hai)
    $api_key = 'your api key'; 
    $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . $api_key;

    // Doctors ki list fetch karna
    $doctors = get_posts(array('post_type' => 'doctor', 'numberposts' => -1));
    $doctor_list = "";
    foreach($doctors as $doc) {
        $spec = strip_tags(get_the_term_list($doc->ID, 'specialization', '', ', '));
        $doctor_list .= "Name: {$doc->post_title}, Specialization: {$spec}, ID: {$doc->ID}; ";
    }

    $prompt = "You are a smart medical assistant for 'Amin Medical Portal'. 
               Available Doctors: $doctor_list. 
               User says: '$user_message'. 
               Analyze symptoms, suggest the best doctor from the list, and explain why. 
               If no specific symptoms match, ask for more details. Keep it professional.";

    $data = array(
        "contents" => array(
            array("parts" => array(array("text" => $prompt)))
        )
    );

    $response = wp_remote_post($url, array(
        'headers'     => array('Content-Type' => 'application/json'),
        'body'        => json_encode($data),
        'method'      => 'POST',
        'timeout'     => 45, // AI responses thora time le sakti hain
    ));

    // Error Handling
    if (is_wp_error($response)) {
        return "Connection Error: " . $response->get_error_message();
    }
    
    $body = json_decode(wp_remote_retrieve_body($response), true);

    // Sabse important step: 'Undefined' se bachne ke liye checks
    if (isset($body['candidates'][0]['content']['parts'][0]['text'])) {
        return $body['candidates'][0]['content']['parts'][0]['text'];
    } elseif (isset($body['error'])) {
        return "API Error: " . $body['error']['message'];
    } else {
        // Agar response structure different ho to poora body check karein (Debug)
        return "Unexpected AI response structure. Please check API Key/Quota.";
    }
}
