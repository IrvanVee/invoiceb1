<?php

namespace App\Main;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

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
                ]
            ],
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
                        'role' => 'vendor',
                        'title' => 'Add Invoice'
                    ],
                    'invoice-list' => [
                        'icon' => '',
                        'route_name' => 'invoice-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'vendor',
                        'title' => 'invoice List'
                    ],
                    'quote-form' => [
                        'icon' => '',
                        'route_name' => 'quote-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'vendor',
                        'title' => 'Add Quotation'
                    ],
                    'quote-list' => [
                        'icon' => '',
                        'route_name' => 'quote-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'vendor',
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
                        'role' => 'vendor',
                        'title' => 'Add Product'
                    ],
                    'product_list' => [
                        'icon' => '',
                        'route_name' => 'profile-overview-2',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'vendor',
                        'title' => 'Product List'
                    ],
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
                        'role' => 'vendor',
                        'title' => 'Add Customer'
                    ],
                    'customers-list' => [
                        'icon' => '',
                        'route_name' => 'users-layout-2',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'vendor',
                        'title' => 'Customers List'
                    ],
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
                        'role' => 'admin',
                        'title' => 'Add User'
                    ],
                    'user-list' => [
                        'icon' => '',
                        'route_name' => 'users-layout-4',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'User List'
                    ],
                    
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
                        'role' => 'admin',
                        'title' => 'Add Permission'
                    ],
                    'permission-list' => [
                        'icon' => '',
                        'route_name' => 'permission-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'Permission List'
                    ],
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
                        'role' => 'admin',
                        'title' => 'Add Role'
                    ],
                    'role-list' => [
                        'icon' => '',
                        'route_name' => 'role-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
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
                        'role' => 'admin',
                        'title' => 'Input Tax'
                    ],
                    'tax-list' => [
                        'icon' => '',
                        'route_name' => 'tax-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'Tax List'
                    ],
                    'discount-form' => [
                        'icon' => '',
                        'route_name' => 'discount-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'Input Discount'
                    ],
                    'discount-list' => [
                        'icon' => '',
                        'route_name' => 'discount-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
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
                        'role' => 'admin',
                        'title' => 'Insert New Marketing'
                    ],
                    'marketing-list' => [
                        'icon' => '',
                        'route_name' => 'marketing-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'Marketing List'
                    ],
                    'vendor-form' => [
                        'icon' => '',
                        'route_name' => 'vendor-form',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'Insert New Vendor'
                    ],
                    'vendor-list' => [
                        'icon' => '',
                        'route_name' => 'vendor-list',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'role' => 'admin',
                        'title' => 'Vendor List'
                    ],
                ]
            ],
        ];
    }
}
