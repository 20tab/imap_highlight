<?php

class imap_highlight extends rcube_plugin
{
  public $task = 'mail';
  private $rcmail;
  private $prefs;

  public function init()
  {

    $this->add_hook('messages_list', array($this, 'imap_highlight_row'));
    $this->include_script('imap_highlight.js');
    $this->include_stylesheet('imap_highlight.css');
      
  }

  public function imap_highlight_row($p) {
    $rcmail = rcmail::get_instance();

    // dont loop over all messages if we dont have any highlights or no msgs
    if(!isset($p['messages']) or !is_array($p['messages'])) return $p;

    // loop over all messages and add highlight color to each message
    foreach($p['messages'] as $message) {
      if(($color = $this->imap_find_match($message)) !== false ) {
        $message->list_flags['extra_flags']['imap_color'] = $color;
      }
    }
    return($p);

  }

  // find a match for this message
  public function imap_find_match($message) {

    $color = false;
    $flags_keys = array_keys($message->flags);

    foreach ($flags_keys as $key) {      
      if(strpos(" ".$key." ", "#")) {
        $color = $key;
      }
    }

    return $color;
  }


/*  

  public function imap_preferences_section($args) {
    $args["list"]["imap_section"] = array(
      "id" => "imap_section",
      "section" => "Imap highlight preferences"
    );
   return($args);
  }


  public function imap_preferences($args) {
    if($args["section"] == "imap_section" ) {
      $args['blocks']['imap_section']['options'][] = array(
        'content' =>  "<p>scoppiamo</p>"
        );
    }
    return($args);
  }

*/


}


?>