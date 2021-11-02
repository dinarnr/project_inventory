
/**
* Theme: Ubold Admin Template
* Author: Coderthemes
* Demo: Editable (Inline editing)
* 
*/


$(function(){

    //modify buttons style
    $.fn.editableform.buttons = 
    '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="fa fa-check"></i></button>' +
    '<button type="button" class="btn btn-white editable-cancel btn-sm waves-effect"><i class="fa fa-times"></i></button>';
    
    //editables 
    $('#julahEdit').editable({
     type: 'text',
     pk: 1,
     name: 'jumlah',

   });

   $('#username2').editable({
    type: 'text',
    pk: 1,
    name: 'username',
    title: 'Enter username'
  });

  $('#username3').editable({
    type: 'text',
    pk: 1,
    name: 'username',
    title: 'Enter username'
  });

  $('#username4').editable({
    type: 'text',
    pk: 1,
    name: 'username',
    title: 'Enter username'
  });

  $('#username5').editable({
    type: 'text',
    pk: 1,
    name: 'username',
    title: 'Enter username'
  });
   
    
    $('#firstname').editable({
      validate: function(value) {
       if($.trim(value) == '') return 'This field is required';
     }
   });
    
    $('#sex').editable({
      prepend: "not selected",
      source: [
      {value: 1, text: 'Male'},
      {value: 2, text: 'Female'}
      ],
      display: function(value, sourceData) {
       var colors = {"": "#98a6ad", 1: "#5fbeaa", 2: "#5d9cec"},
       elem = $.grep(sourceData, function(o){return o.value == value;});

       if(elem.length) {
         $(this).text(elem[0].text).css("color", colors[value]);
       } else {
         $(this).empty();
       }
     }
   });
    
    $('#status').editable();
    
    $('#group').editable({
      showbuttons: false
    });

    $('#dob').editable();

    $('#comments').editable({
      showbuttons: 'bottom'
    });

    //inline


  $('#inline-username').editable({
     type: 'text',
     pk: 1,
     name: 'username',
     title: 'Enter username',
     mode: 'inline'
   });
    
    $('#inline-firstname').editable({
      validate: function(value) {
       if($.trim(value) == '') return 'This field is required';
     },
     mode: 'inline'
   });
    
    $('#inline-sex').editable({
      prepend: "not selected",
      mode: 'inline',
      source: [
      {value: 1, text: 'Male'},
      {value: 2, text: 'Female'}
      ],
      display: function(value, sourceData) {
       var colors = {"": "#98a6ad", 1: "#5fbeaa", 2: "#5d9cec"},
       elem = $.grep(sourceData, function(o){return o.value == value;});

       if(elem.length) {
         $(this).text(elem[0].text).css("color", colors[value]);
       } else {
         $(this).empty();
       }
     }
   });
    
    $('#inline-status').editable({
        mode: 'inline',
        inputclass: 'string'
    });
    
    $('#inline-group').editable({
      showbuttons: false,
      mode: 'inline'
    });

    $('#inline-dob').editable({mode: 'inline'});

    $('#inline-comments').editable({
      showbuttons: 'bottom',
      mode: 'inline'
    });



  });