<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    'class' => 'navbar',
 
    // Here comes the menu strcture
    'items' => [

        // This is a menu item
        'home'  => [
            'text'  => '<i class="fa fa-home"></i> Hem',
            'url'   => '',
            'title' => 'Hem'
        ],
        
        'theme' => [
            'text' => 'Tema',
            'url' => 'theme',
            'title' => 'Tema',
            
             // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [
            
                'items' => [

                        // This is a menu item of the submenu
                        'item 1'  => [
                            'text'  => 'Tema',   
                            'url'   => 'theme',  
                            'title' => 'Tema',
                        ],

                        // This is a menu item of the submenu
                        'item 2'  => [
                            'text'  => 'Regioner',   
                            'url'   => 'regioner',  
                            'title' => 'Regioner',
                        ],
                        
                        // This is a menu item of the submenu
                        'item 3'  => [
                            'text'  => 'Font Awesome',   
                            'url'   => 'font_awesome',  
                            'title' => 'Font Awesome',
                        ],
                    ],
                ],
            ], 
        
 
        // This is a menu item
        'redovisning'  => [
            'text'  => 'Redovisning',
            'url'   => 'redovisning',
            'title' => 'Redovisning av kursmoment'
        ],
        
         //This is a menu item 
        'database'  => [ 
            'text'  => 'Användare',    
            'url'   => 'users/list',    
            'title' => 'Databas av användare',

            // Here we add the submenu, with some menu items, as part of a existing menu item
            'submenu' => [

                'items' => [

                    // This is a menu item of the submenu
                    'item 1'  => [
                        'text'  => 'Lista',
                        'url'   => 'users/list',
                        'title' => 'Lista alla användare'
                    ],
                    'item 2'  => [
                        'text'  => 'Aktiva användare',
                        'url'   => 'users/active',
                        'title' => 'Aktiva användare'
                    ],
                    'item 3'  => [
                        'text'  => 'Inaktiva användare',
                        'url'   => 'users/inactive',
                        'title' => 'Inaktiva användare'
                    ],
                    'item 4'  => [
                        'text'  => 'Ny användare',
                        'url'   => 'users/add',
                        'title' => 'Lägga till en användare'
                    ],
                    'item 5'  => [
                        'text'  => 'Papperskorg',
                        'url'   => 'users/trash',
                        'title' => 'Förkastade användare'
                    ],
                    'item 6'  => [
                        'text'  => 'Återställ',
                        'url'   => 'users/setup',
                        'title' => 'Återställa databasen'
                    ],
                ],
            ],
        ],
        
        
        // This is a menu item
        'cfmessage'  => [
            'text'  => 'Meddelande',
            'url'   => 'cfmessage',
            'title' => 'Flashiga meddelanden'
        ],
        
 
        // This is a menu item
        'source' => [
            'text'  =>'Källkod',
            'url'   => 'source',
            'title' => 'Sidans källkod'
        ],
    ],
 
    // Callback tracing the current selected menu item base on scriptname
    'callback' => function ($url) {
        if ($url == $this->di->get('request')->getRoute()) {
                return true;
        }
    },

    // Callback to create the urls
    'create_url' => function ($url) {
        return $this->di->get('url')->create($url);
    },
];
