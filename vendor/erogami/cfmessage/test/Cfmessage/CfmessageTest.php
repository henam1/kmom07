<?php

namespace Erogami\Cfmessage;
require_once(__DIR__ . '/../../src/Cfmessage/Cfmessage.php');

class CfmessageTest extends \PHPUnit_Framework_TestCase{
    
    public function testAddMessage(){
    
        $test = new Cfmessage();
        
        $messages[]=[
            'content' => 'test',
            'type' => 'info',
        ];
        
        $_SESSION['Cfmessage'] = $messages;
        
        $test->addMessage('info', 'test');
        
        $exp = '<div id="message" class="info"><p>test</p></div><div id="message" class="info"><p>test</p></div>';
	
        $res = $test->printMessage();
        
        $this->assertEquals($res, $exp, "Message not matching");

    }
    
    public function testAddError(){
    
        $test = new Cfmessage();
        $test->addError('test');
        $exp = '<div id="message" class="error"><p><i class="fa fa-times"></i> test</p></div>';
	    $res = $test->printMessage();
        $this->assertEquals($res, $exp, "Message not matching");
    }
    
     public function testAddWarning(){
    
        $test = new Cfmessage();
        $test->addWarning('test');
        $exp = '<div id="message" class="warning"><p><i class="fa fa-warning"></i> test</p></div>';
	    $res = $test->printMessage();
        $this->assertEquals($res, $exp, "Message not matching");
    }
    
    public function testAddSuccess(){
    
        $test = new Cfmessage();
        $test->addSuccess('test');
        $exp = '<div id="message" class="success"><p><i class="fa fa-check"></i> test</p></div>';
	    $res = $test->printMessage();
        $this->assertEquals($res, $exp, "Message not matching");
    }
    
    public function testAddInfo(){
    
        $test = new Cfmessage();
        $test->addInfo('test');
        $exp = '<div id="message" class="info"><p><i class="fa fa-info"></i> test</p></div>';
	    $res = $test->printMessage();
        $this->assertEquals($res, $exp, "Message not matching");
    }
    
    public function testClearSession()
    {
		$test = new Cfmessage();
		$_SESSION['Cfmessage'] = 'test';
		$test->clearSession();
		$this->assertNull($_SESSION['Cfmessage'], 'SESSION was not cleared');
    }
    

}