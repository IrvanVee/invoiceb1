<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'sub_menu' => [
                    'dashboard-overview-1' => [
                        'icon' => '',
                        'route_name' => 'dashboard-overview-1',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => ' Main '
                    ],
                    // 'dashboard-overview-2' => [
                    //     'icon' => '',
                    //     'route_name' => 'dashboard-overview-2',
                    //     'params' => [
                    //         'layout' => 'side-menu',
                    //     ],
                    //     'title' => 'Overview 2'
                    // ],
                    // 'dashboard-overview-3' => [
                    //     'icon' => '',
                    //     'route_name' => 'dashboard-overview-3',
                    //     'params' => [
                    //         'layout' => 'side-menu',
                    //     ],
                    //     'title' => 'Overview 3'
                    // ]
                ]
            ],
            // 'menu-layout' => [
            //     'icon' => 'box',
            //     'title' => 'Menu Layout',
            //     'sub_menu' => [
            //         'side-menu' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Side Menu'
            //         ],
            //         'simple-menu' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'simple-menu'
            //             ],
            //             'title' => 'Simple Menu'
            //         ],
            //         'top-menu' => [
            //             'icon' => '',
            //             'route_name' => 'dashboard-overview-1',
            //             'params' => [
            //                 'layout' => 'top-menu'
            //             ],
            //             'title' => 'Top Menu'
            //         ]
            //     ]
            // ],
            // 'inbox' => [
            //     'icon' => 'inbox',
            //     'route_name' => 'inbox',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Inbox'
            // ],
            // 'file-manager' => [
            //     'icon' => 'hard-drive',
            //     'route_name' => 'file-manager',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'File Manager'
            // ],
            // 'point-of-sale' => [
            //     'icon' => 'credit-card',
            //     'route_name' => 'point-of-sale',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Point of Sale'
            // ],
            // 'chat' => [
            //     'icon' => 'message-square',
            //     'route_name' => 'chat',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Chat'
            // ],
            // 'post' => [
            //     'icon' => 'file-text',
            //     'route_name' => 'post',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Post'
            // ],
            
            'devider',
            'sale' => [
                'icon' => 'edit',
                'title' => 'Penjualan',
                'sub_menu' => [
                    'invoice-form' => [
                        'icon' => '',
                        'route_name' => 'invoice-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add Invoice'
                    ],
                    'invoice-list' => [
                        'icon' => '',
                        'route_name' => 'invoice-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'invoice List'
                    ],
                    'quote-form' => [
                        'icon' => '',
                        'route_name' => 'quote-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add Quotation'
                    ],
                    'quote-list' => [
                        'icon' => '',
                        'route_name' => 'quote-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Quote List'
                    ]
                ]
            ],
            
            'produk' => [
                'icon' => 'trello',
                'title' => 'Product',
                'sub_menu' => [
                    'product-list' => [
                        'icon' => '',
                        'route_name' => 'profile-overview-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add Product'
                    ],
                    'product_list' => [
                        'icon' => '',
                        'route_name' => 'profile-overview-2',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Product List'
                    ],
                    // 'profile-overview-3' => [
                    //     'icon' => '',
                    //     'route_name' => 'profile-overview-3',
                    //     'params' => [
                    //         'layout' => 'side-menu'
                    //     ],
                    //     'title' => 'Overview 3'
                    // ]
                ]
            ],        
                    
            'customers' => [
                'icon' => 'users',
                'title' => 'Customers',
                'sub_menu' => [
                    'customers-form' => [
                        'icon' => '',
                        'route_name' => 'users-layout-1',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add Customer'
                    ],
                    'customers-list' => [
                        'icon' => '',
                        'route_name' => 'users-layout-2',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Customers List'
                    ],
                    // 'users-layout-3' => [
                    //     'icon' => '',
                    //     'route_name' => 'users-layout-3',
                    //     'params' => [
                    //         'layout' => 'side-menu'
                    //     ],
                    //     'title' => 'Layout 3'
                    // ]
                ]
            ],

            'devider',

            'users' => [
                'icon' => 'user',
                'title' => 'Users',
                'sub_menu' => [
                    'add-user' => [
                        'icon' => '',
                        'route_name' => 'users-layout-3',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add User'
                    ],
                    'user-list' => [
                        'icon' => '',
                        'route_name' => 'users-layout-4',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'User List'
                    ],
                    'profile-page' => [
                        'icon' => '',
                        'route_name' => 'profile-page',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Edit Profile'
                    ],
                    // 'users-layout-3' => [
                    //     'icon' => '',
                    //     'route_name' => 'users-layout-3',
                    //     'params' => [
                    //         'layout' => 'side-menu'
                    //     ],
                    //     'title' => 'Layout 3'
                    // ]
                ]
            ],
            
            'permission' => [
                'icon' => 'edit',
                'title' => 'Permission',
                'sub_menu' => [
                    'add-permission' => [
                        'icon' => '',
                        'route_name' => 'permission-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add Permission'
                    ],
                    'permission-list' => [
                        'icon' => '',
                        'route_name' => 'permission-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Permission List'
                    ],
                    // 'users-layout-3' => [
                    //     'icon' => '',
                    //     'route_name' => 'users-layout-3',
                    //     'params' => [
                    //         'layout' => 'side-menu'
                    //     ],
                    //     'title' => 'Layout 3'
                    // ]
                ]
            ],

            'role' => [
                'icon' => 'list',
                'title' => 'Role',
                'sub_menu' => [
                    'role-form' => [
                        'icon' => '',
                        'route_name' => 'role-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Add Role'
                    ],
                    'role-list' => [
                        'icon' => '',
                        'route_name' => 'role-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Role List'
                    ]
                ]
            ],

            'setting' => [
                'icon' => 'settings',
                'title' => 'Settings',
                'sub_menu' => [
                    'tax-form' => [
                        'icon' => '',
                        'route_name' => 'tax-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Input Tax'
                    ],
                    'tax-list' => [
                        'icon' => '',
                        'route_name' => 'tax-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Tax List'
                    ],
                    'discount-form' => [
                        'icon' => '',
                        'route_name' => 'discount-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Input Discount'
                    ],
                    'discount-list' => [
                        'icon' => '',
                        'route_name' => 'discount-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Discount List'
                    ],
                ]
            ],

            'coop' => [
                'icon' => 'archive',
                'title' => 'Marketing & Vendor',
                'sub_menu' => [
                    'marketing-form' => [
                        'icon' => '',
                        'route_name' => 'marketing-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Insert New Marketing'
                    ],
                    'marketing-list' => [
                        'icon' => '',
                        'route_name' => 'marketing-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Marketing List'
                    ],
                    'vendor-form' => [
                        'icon' => '',
                        'route_name' => 'vendor-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Insert New Vendor'
                    ],
                    'vendor-list' => [
                        'icon' => '',
                        'route_name' => 'vendor-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Vendor List'
                    ],
                ]
            ],
            
            // 'pages' => [
            //     'icon' => 'layout',
            //     'title' => 'Pages',
            //     'sub_menu' => [
            //         'wizards' => [
            //             'icon' => '',
            //             'title' => 'Wizards',
            //             'sub_menu' => [
            //                 'wizard-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'wizard-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'wizard-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'wizard-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ],
            //                 'wizard-layout-3' => [
            //                     'icon' => '',
            //                     'route_name' => 'wizard-layout-3',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 3'
            //                 ]
            //             ]
            //         ],
            //         'blog' => [
            //             'icon' => '',
            //             'title' => 'Blog',
            //             'sub_menu' => [
            //                 'blog-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'blog-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'blog-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'blog-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ],
            //                 'blog-layout-3' => [
            //                     'icon' => '',
            //                     'route_name' => 'blog-layout-3',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 3'
            //                 ]
            //             ]
            //         ],
            //         'pricing' => [
            //             'icon' => '',
            //             'title' => 'Pricing',
            //             'sub_menu' => [
            //                 'pricing-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'pricing-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'pricing-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'pricing-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ]
            //             ]
            //         ],
            //         'invoice' => [
            //             'icon' => '',
            //             'title' => 'Invoice',
            //             'sub_menu' => [
            //                 'invoice-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'invoice-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'invoice-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'invoice-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ]
            //             ]
            //         ],
            //         'faq' => [
            //             'icon' => '',
            //             'title' => 'FAQ',
            //             'sub_menu' => [
            //                 'faq-layout-1' => [
            //                     'icon' => '',
            //                     'route_name' => 'faq-layout-1',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 1'
            //                 ],
            //                 'faq-layout-2' => [
            //                     'icon' => '',
            //                     'route_name' => 'faq-layout-2',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 2'
            //                 ],
            //                 'faq-layout-3' => [
            //                     'icon' => '',
            //                     'route_name' => 'faq-layout-3',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Layout 3'
            //                 ]
            //             ]
            //         ],
            //         'login' => [
            //             'icon' => '',
            //             'route_name' => 'login',
            //             'params' => [
            //                 'layout' => 'login'
            //             ],
            //             'title' => 'Login'
            //         ],
            //         'register' => [
            //             'icon' => '',
            //             'route_name' => 'register',
            //             'params' => [
            //                 'layout' => 'login'
            //             ],
            //             'title' => 'Register'
            //         ],
            //         'error-page' => [
            //             'icon' => '',
            //             'route_name' => 'error-page',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Error Page'
            //         ],
            //         'update-profile' => [
            //             'icon' => '',
            //             'route_name' => 'update-profile',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Update profile'
            //         ],
            //         'change-password' => [
            //             'icon' => '',
            //             'route_name' => 'change-password',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Change Password'
            //         ]
            //     ]
            // ],
            'devider',
            // 'calendar' => [
            //     'icon' => 'calendar',
            //     'route_name' => 'calendar',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Reports'
            // ],
            // 'components' => [
            //     'icon' => 'inbox',
            //     'title' => 'Components',
            //     'sub_menu' => [
            //         'grid' => [
            //             'icon' => '',
            //             'title' => 'Grid',
            //             'sub_menu' => [
            //                 'regular-table' => [
            //                     'icon' => '',
            //                     'route_name' => 'regular-table',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Regular Table'
            //                 ],
            //                 'tabulator' => [
            //                     'icon' => '',
            //                     'route_name' => 'tabulator',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Tabulator'
            //                 ]
            //             ]
            //         ],
            //         'overlay' => [
            //             'icon' => '',
            //             'title' => 'Overlay',
            //             'sub_menu' => [
            //                 'modal' => [
            //                     'icon' => '',
            //                     'route_name' => 'modal',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Modal'
            //                 ],
            //                 'slide-over' => [
            //                     'icon' => '',
            //                     'route_name' => 'slide-over',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Slide Over'
            //                 ],
            //                 'notification' => [
            //                     'icon' => '',
            //                     'route_name' => 'notification',
            //                     'params' => [
            //                         'layout' => 'side-menu'
            //                     ],
            //                     'title' => 'Notification'
            //                 ],
            //             ]
            //         ],
            //         'accordion' => [
            //             'icon' => '',
            //             'route_name' => 'accordion',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Accordion'
            //         ],
            //         'button' => [
            //             'icon' => '',
            //             'route_name' => 'button',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Button'
            //         ],
            //         'alert' => [
            //             'icon' => '',
            //             'route_name' => 'alert',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Alert'
            //         ],
            //         'progress-bar' => [
            //             'icon' => '',
            //             'route_name' => 'progress-bar',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Progress Bar'
            //         ],
            //         'tooltip' => [
            //             'icon' => '',
            //             'route_name' => 'tooltip',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Tooltip'
            //         ],
            //         'dropdown' => [
            //             'icon' => '',
            //             'route_name' => 'dropdown',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Dropdown'
            //         ],
            //         'typography' => [
            //             'icon' => '',
            //             'route_name' => 'typography',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Typography'
            //         ],
            //         'icon' => [
            //             'icon' => '',
            //             'route_name' => 'icon',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Icon'
            //         ],
            //         'loading-icon' => [
            //             'icon' => '',
            //             'route_name' => 'loading-icon',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Loading Icon'
            //         ]
            //     ]
            // ],
            // 'forms' => [
            //     'icon' => 'sidebar',
            //     'title' => 'Forms',
            //     'sub_menu' => [
            //         'regular-form' => [
            //             'icon' => '',
            //             'route_name' => 'regular-form',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Regular Form'
            //         ],
            //         'datepicker' => [
            //             'icon' => '',
            //             'route_name' => 'datepicker',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Datepicker'
            //         ],
            //         'tail-select' => [
            //             'icon' => '',
            //             'route_name' => 'tail-select',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Tail Select'
            //         ],
            //         'file-upload' => [
            //             'icon' => '',
            //             'route_name' => 'file-upload',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'File Upload'
            //         ],
            //         'wysiwyg-editor' => [
            //             'icon' => '',
            //             'route_name' => 'wysiwyg-editor',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Wysiwyg Editor'
            //         ],
            //         'validation' => [
            //             'icon' => '',
            //             'route_name' => 'validation',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Validation'
            //         ]
            //     ]
            // ],
            // 'widgets' => [
            //     'icon' => 'hard-drive',
            //     'title' => 'Widgets',
            //     'sub_menu' => [
            //         'chart' => [
            //             'icon' => '',
            //             'route_name' => 'chart',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Chart'
            //         ],
            //         'slider' => [
            //             'icon' => '',
            //             'route_name' => 'slider',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Slider'
            //         ],
            //         'image-zoom' => [
            //             'icon' => '',
            //             'route_name' => 'image-zoom',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Image Zoom'
            //         ]
            //     ]
            // ]
        ];
    }
}
