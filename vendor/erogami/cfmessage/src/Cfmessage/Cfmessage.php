<?php

namespace Erogami\Cfmessage;

/**
 * Class for flashing messages.
 *
 */

class Cfmessage{
    
    
    
    public $sessionKey=null;
    
	public function __construct(){
		$this->sessionKey = 'Cfmessage';
	}

    
    /** 
     * Adds a flash message to the session 
     * 
     * @param type, the type of message "info", "warning", "success" or "error". 
     * @param content, message.
     * 
     * @return void 
     */ 
    public function addMessage($type, $content) {
        if (isset($_SESSION[$this->sessionKey]))
		{
			$messages = $_SESSION[$this->sessionKey];
		}
        
        $messages[] = [
            'content' => $content,
            'type' => $type,
        ];
        
        $_SESSION[$this->sessionKey] = $messages;
    }
    
   
    
    /** 
     * Adds an error message. 
     * @param $content, the message 
     * @return void 
     */ 
    public function addError($content){
        $content = '<i class="fa fa-times"></i> ' . $content;
        $this->addMessage("error", $content);
    }
    
    
    
    /** 
     * Adds a warning message. 
     * @param $content, the message 
     * @return void 
     */ 
    public function addWarning($content){
        $content = '<i class="fa fa-warning"></i> ' . $content;
        $this->addMessage("warning", $content);
    }
    
    
    
    /** 
     * Adds a success message. 
     * @param $content, the message 
     * @return void 
     */     
    public function addSuccess($content){
        $content = '<i class="fa fa-check"></i> ' . $content;
        $this->addMessage("success", $content);
    }
    
    
    
    /** 
     * Add an info message. 
     * @param $content, the message 
     * @return void 
     */     
    public function addInfo($content){
        $content = '<i class="fa fa-info"></i> ' . $content;
        $this->addMessage("info", $content);
    }
    
    
    
    /**
     * Print message.
     * @param $messages, $html
     * @return $html. 
     */
    public function printMessage() {
        $messages = $_SESSION[$this->sessionKey];
        $html = '';
        
        foreach ($messages as $message){
            $html .='<div id="message" class="' . $message['type'] . '"><p>' . $message['content'] . '</p></div>';
        }
        
        $this->clearSession();
        
        return $html;
    }
    
    
    
    /**
     * Clear the session
     * @return void 
     */
    public function clearSession() {
        $_SESSION[$this->sessionKey] = NULL;
    } 
    
    
}