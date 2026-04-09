<?php
return [
    "/" => ["controller" => "App\\Controller\\PageController", "action" => "home"],
    "/about/" => ["controller" => "App\\Controller\\PageController", "action" => "about"],
    "/poll/create/" => ["controller" => "App\\Controller\\PollController", "action" => "create"],
    "/poll/create/post/" => ["controller" => "App\\Controller\\PollController", "action" => "createPost"],
    "/poll/" => ["controller" => "App\\Controller\\PollController", "action" => "show"],
    "/poll/list/" => ["controller" => "App\\Controller\\PollController", "action" => "list"],
    "/poll/vote/" => ["controller" => "App\\Controller\\PollController", "action" => "vote"],
    "/login/" => ["controller" => "App\\Controller\\AuthController", "action" => "login"],
    "/login/post/" => ["controller" => "App\\Controller\\AuthController", "action" => "loginPost"],
    "/logout/" => ["controller" => "App\\Controller\\AuthController", "action" => "logout"],
    "/register/" => ["controller" => "App\\Controller\\UserController", "action" => "register"],
    "/register/post/" => ["controller" => "App\\Controller\\UserController", "action" => "registerPost"],
    "/legal/" => ["controller" => "App\\Controller\\PageController", "action" => "legal"],
    "/category/list/" => ["controller" => "App\\Controller\\CategoryController", "action" => "list"],
    "/category/" => ["controller" => "App\\Controller\\CategoryController", "action" => "show"],
];