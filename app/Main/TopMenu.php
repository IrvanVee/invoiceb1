<?php

namespace App\Main;

class TopMenu
{
    /**
     * List of top menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'user',
                'title' => 'Profile',
                'sub_menu' => [
                    'profile page' => [
                        'icon' => 'user',
                        'route_name' => 'profile-page',
                        'params' => [
                            'layout' => 'top-menu',
                        ],
                        'title' => 'Edit Profile'
                    ],
                ]
            ],
        ];
    }
}
