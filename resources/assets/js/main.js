function call() {
 	  var msg   = $('#formid').serialize();
        $.ajax({
          type: 'POST',
          url: 'res.php',
          data: msg,
          success: function(data) {
            $('#results').html(data);
          },
          error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
          }
        });
 
    }