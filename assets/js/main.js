$(window).load(function() { 

    var LogoutButton = $('#lg_button');

    LogoutButton.on('click', function(e){
       if(!confirm('Do you really want to log out?')){
           e.preventDefault();
       }
    });
    
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable",
      stop: function( event, ui )
      { 
         Interests();
      }
    }).disableSelection();
    
    function Interests()
    {
        var AvailableInterests = $('#sortable2 li');
        
        i = 0; var InterestsArr = [];
        AvailableInterests.each(function(){
           InterestsArr[i] = $(this).attr('data-id'); 
           i++;
        });
        
                    var AddInterest = $.ajax({
                        url: "/ajax/add",
                        method: "POST",
                        async: false,
                        data:'interests='+InterestsArr.toString(),
                         success: function(data) 
                         {
                             $('#sortable1 li').removeClass('ui-state-highlight')
                                               .addClass('ui-state-default');
                             AvailableInterests.addClass('ui-state-highlight');
                         }
                    });  
        
    }
    
        
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });    
    
    $("input#datepicker").mask("99/99/9999");


});