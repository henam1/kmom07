<?php

// Get environment & autoloader.
require __DIR__.'/config_with_app.php';

$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');
$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$di->set('CommentController', function() use ($di) {
    $controller = new Anax\Comment\CommentController();
    $controller->setDI($di);
    return $controller;
});

$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});

$di->set('Cfmessage', function() use ($di) { 
    $message = new \Erogami\Cfmessage\Cfmessage($di); 
    //$message->setDI($di);  
    return $message; 
}); 

$di->set('form', '\Mos\HTMLForm\CForm');

//controller för databas funktioner
$di->set('UsersController', function() use ($di) {
    $controller = new \Anax\Users\UsersController();
    $controller->setDI($di);
    return $controller;
});

$app->session;


$app->router->add('', function() use ($app) {
    
     $app->theme->setTitle("Hem");
 
    $content = $app->fileContent->get('me.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
 
    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
    
    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params' =>  [''], 
    ]);
    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'add',
        'params' =>  [''],  
    ]);
    
});

$app->router->add('theme', function() use ($app) { 

    $app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php'); 
    $app->theme->setTitle("Mitt Tema"); 

    $content = $app->fileContent->get('typography.html');  
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown'); 

    $sidebar = $app->fileContent->get('typography.html');  
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown'); 
    
             $app->views->add('me/page', [ 
        'content' => $content, 
    ]); 
             // Sidebar 
     $app->views->add('me/page', [ 
        'content' => $content, 
    ], 'sidebar');  

}); 

$app->router->add('regioner', function() use ($app) { 

    $app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php'); 
    $app->theme->addStylesheet('css/anax-grid/regions_demo.css'); 
    $app->theme->setTitle("Regioner"); 
  
    $app->views->addString('flash', 'flash') 
               ->addString('featured-1', 'featured-1') 
               ->addString('featured-2', 'featured-2') 
               ->addString('featured-3', 'featured-3') 
               ->addString('main', 'main') 
               ->addString('sidebar', 'sidebar') 
               ->addString('triptych-1', 'triptych-1') 
               ->addString('triptych-2', 'triptych-2') 
               ->addString('triptych-3', 'triptych-3') 
               ->addString('footer-col-1', 'footer-col-1') 
               ->addString('footer-col-2', 'footer-col-2') 
               ->addString('footer-col-3', 'footer-col-3') 
               ->addString('footer-col-4', 'footer-col-4'); 
  
}); 

$app->router->add('font_awesome', function() use ($app) { 

    $app->theme->configure(ANAX_APP_PATH . 'config/theme-grid.php');
    $app->theme->setTitle("Font Awesome");
    
    $featured1 = $app->fileContent->get('fa-featured1.md');
    $featured1 = $app->textFilter->doFilter($featured1, 'shortcode, markdown'); 
    $featured2 = $app->fileContent->get('fa-featured2.md');
    $featured2 = $app->textFilter->doFilter($featured2, 'shortcode, markdown'); 
    $featured3 = $app->fileContent->get('fa-featured3.md');
    $featured3 = $app->textFilter->doFilter($featured3, 'shortcode, markdown'); 
    $content = $app->fileContent->get('fa-main.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown'); 
    $sidebar = $app->fileContent->get('fa-sidebar.md');
    $sidebar = $app->textFilter->doFilter($sidebar, 'shortcode, markdown'); 
    $footer1 = $app->fileContent->get('fa-footer1.md');
    $footer1 = $app->textFilter->doFilter($footer1, 'shortcode, markdown'); 
    $footer2 = $app->fileContent->get('fa-footer2.md');
    $footer2 = $app->textFilter->doFilter($footer2, 'shortcode, markdown');
    $footer3 = $app->fileContent->get('fa-footer3.md');
    $footer3 = $app->textFilter->doFilter($footer3, 'shortcode, markdown'); 
    $footer4 = $app->fileContent->get('fa-footer4.md');
    $footer4 = $app->textFilter->doFilter($footer4, 'shortcode, markdown'); 

    $app->views->addString($featured1, 'featured-1')
               ->addString($featured2, 'featured-2')
               ->addString($featured3, 'featured-3')
               ->addString($content, 'main')
               ->addString($sidebar, 'sidebar')
               ->addString($footer1, 'footer-col-1')
               ->addString($footer2, 'footer-col-2')
               ->addString($footer3, 'footer-col-3')
               ->addString($footer4, 'footer-col-4');
  
}); 

                  
$app->router->add('redovisning', function() use ($app) {
 
    $app->theme->setTitle("Redovisning");
 
    $content = $app->fileContent->get('redovisning.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
 
    $byline = $app->fileContent->get('byline.md');
    $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
 
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
    
    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'view',
        'params' =>  ['redovisning'], 
    ]);
    
    $app->dispatcher->forward([
        'controller' => 'comment',
        'action'     => 'add',
        'params' =>  ['redovisning'],  
    ]);
 
});


$app->router->add('cfmessage', function() use ($app) {

    $app->theme->addStylesheet('css/cfmessage.css');
    $app->theme->setTitle("Test av flash");
    $content = $app->fileContent->get('flash.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');
    
    $app->Cfmessage->addInfo('This is an information message'); 
    $app->Cfmessage->addError('This is an error message'); 
    $app->Cfmessage->addWarning('This is a warning message'); 
    $app->Cfmessage->addSuccess('This is a success message'); 
      
    
    // Add content
    $app->views->add('me/page', [
        'content' => $content,
    ]);
    
    $messages = $app->Cfmessage->printMessage();
    $app->views->addString($messages);

});

$app->router->add('source', function() use ($app) {
 
    $app->theme->addStylesheet('css/source.css');
    $app->theme->setTitle("Källkod");
 
    $source = new \Mos\Source\CSource([
        'secure_dir' => '..', 
        'base_dir' => '..', 
        'add_ignore' => ['.htaccess'],
    ]);
 
    $app->views->add('me/source', [
        'content' => $source->View(),
    ]);
 
});

$app->router->handle();
$app->theme->render();


