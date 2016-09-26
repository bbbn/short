function call() {
 	  var msg   = $('#formid').serialize();
        $.ajax({
          type: 'POST',
          url: './add',
          data: msg,
          success: function(data) {
            console.log( data);
          },
          error:  function(xhr, str){
	           alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    }