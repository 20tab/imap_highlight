imap_highlight
==============

A Roundcube plugin to highlight messages based on imap flags.


## Installation

Clone the entire plugin into the <b><i>your-roundcube-installation-folder/plugins</i></b>

Then edit your roundcube config file and activate the plugin:

```php

$config['plugins'] = array(
  'imap_highlight', 
  ...  
);

```

## Configuration

Here it comes the magic ! It's all fully automatic!

## How it works

When a message arrives the plugin checks for imap flags that are in a hexadecimal format ( ex: #fff000, #000000 ) and it automatically highlights the message with the colour specified in the imap flag.

The only thing that is left up to you is to assign imap flags to messages in the correct format ( Hex ).

## Suggestions

If you are searching for an easy way to add imap flags to messages, and other cool stuff, take a look to this other plugin
https://github.com/20tab/raw_managesieve
