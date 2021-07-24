<?php

if (!function_exists('genrate_sidenav')) {
    function genrate_sidenav()
    {
        $side_nav = [
            "dashboard" => [
                "href" => route('admin.dashboard'),
                "link_name"  => "Dashboard",
                "child" => null
            ],
            "user" => [
                "href" => route('admin.user.list'),
                "link_name"  => "User List",
                "child" =>null
            ]
        ];

        return genrate_menu(array_into_object($side_nav));
    }
}

if (!function_exists('genrate_menu')) {
    function genrate_menu($side_nav)
    {
        $chain = null;
        foreach ($side_nav as $key => $nav) {
            if ($nav->child) {
                $rand = rand(1000, 9999);
                $chain = $chain . "<li class='nav-item'>
                <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#" . $key . $rand . "' aria-expanded='true'
                    aria-controls='" . $key . $rand . "'>
                    <i class='fas fa-fw fa-cog'></i>
                    <span>" . $nav->link_name . "</span>
                </a>
                <div id='" . $key . $rand . "' class='collapse' aria-labelledby='headingTwo' data-parent='#accordionSidebar'>
                    <div class='bg-white py-2 collapse-inner rounded'>
                       ";
                foreach ($nav->child as $key => $child) {
                    $chain = $chain . "<a class='collapse-item' href='" . $child->href . "'>" . $child->link_name . "</a>";
                }
                $chain = $chain .  "</div></div></li>";
            } else {
                $chain = $chain . "<li class='nav-item'><a class='nav-link' href='" . $nav->href . "'><i class='fas fa-fw fa-long-arrow-alt-right'></i><span>" . $nav->link_name . "</span></a></li>";
            }
        }
        return $chain;
    }
}

if (!function_exists('array_into_object')) {
    function array_into_object($arr)
    {
        return (object)json_decode(json_encode($arr));
    }
}
