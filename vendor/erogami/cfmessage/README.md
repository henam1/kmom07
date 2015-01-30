Cfmessage
=========

Flash messages, a class to show sucess, info, warning and error messages for the user.

By Alex Chau, alex_chau6@hotmail.com


Instructions
------------------

###1. Download

First of all install by using composer. Add this code to your composer.json:

```javascript
"require": {
    "erogami/cfmessage": "dev-master"
},
```

###2. Include Cfmessage in your framework

Add this code to your front-controller.

```php
$di->set('Cfmessage', function() use ($di) { 
    $message = new \erogami\Cfmessage\Cfmessage($di);  
    return $message; 
}); 
```

Now add these lines to get your message.

For info messages:

```php
    $app->Cfmessage->addInfo('This is an information message'); 
```
For error messages:

```php
    $app->Cfmessage->addError('This is an error message'); 
```

For warning messages:

```php
    $app->Cfmessage->addWarning('This is a warning message'); 
```

For success messages:

```php
    $app->Cfmessage->addSuccess('This is a success message'); 
```
   
The messages will be saved in the session, call these lines to print out the messages:
    
```php
    $messages = $app->Cfmessage->printMessage();
    $app->views->addString($messages);
```

The class uses Font Awesome, but works without it too. So it's optional wheter you want to include the icons or not.

