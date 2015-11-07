<?php
/**
*   Development Config
*/

return [
    "app" => [
        "url" => function(){
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || 
            $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $domainName = $_SERVER['HTTP_HOST'];
            return $protocol.$domainName;
        }
    ],
    "view" => [
        "debug" => true
    ],
    "cookie" =>[
        "time" => "",
        "name" => ""
    ],
    "mail" => [
        "smtp_auth" => true,
        "smtp_secure" => "tls",
        "host" => "hostserver.com",
        "username" => "username@site.com",
        "password" => "password",
        "port" => 25,
        "html" => true,
        "wordwrap" => 100,
        
        "emails" => [
            "info" => [
                "email" => "info@website.com",
                "name" => "Website"  
            ],
            "sales" => [
                "email" => "sales@website.com",
                "name" => "Website Sales"
            ],
            "support" => [
                "email" => "support@website.com",
                "name" => "Website Support"
            ],
            "teams" => [
                "tech" => [],
                "sales" => []
            ]
        ]
    ],
    "format" => [
        "date" => "Y-m-d H:i:s"
    ],
    
    //Passed with every template
    "template_data" =>[
        "versions" => [
            "js" => 1,
            "css" => 1,
            "html" => 1
        ],
        "url" => "http://localhost/"
    ]
    
];
