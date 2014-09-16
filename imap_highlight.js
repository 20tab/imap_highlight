$(document).ready(function() {
  if(window.rcmail) {
    
    rcmail.addEventListener('insertrow', function(evt) {
      if(!rcmail.env.messages) return; 
      
      var message = rcmail.env.messages[evt.row.uid];

      // check if our color info is present
      if(message.flags && message.flags.imap_color) {
        $(evt.row.obj).addClass('imap_color_row');
        evt.row.obj.style.backgroundColor = message.flags.imap_color;
      }
    });  

  }
});
