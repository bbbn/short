function call() {
 	  var msg   = $('#formid').serialize();
        $.ajax({
          type: 'POST',
          url: './add',
          data: msg,
          success: function(data) {
            //console.log( data);
            if(data['error']==0)
            {
              $("#answer").html("Short url: <a target='_blank' href='"+data['answer']+"'>"+data['answer']+"</a>");
              $("#answer").removeClass("hide");
              $("#answer").removeClass("alert-danger");
              $("#answer").addClass("alert-success");
            }
            else  {
              $("#answer").html(data['answer']);
              $("#answer").removeClass("hide");
              $("#answer").removeClass("alert-success");
              $("#answer").addClass("alert-danger");
            }

          },
          error:  function(xhr, str){
	           $("#answer").html("Short url: <a href='"+data+"'>"+data+"</a>");
            $("#answer").removeClass("hide");
            $("#answer").removeClass("alert-success");
            $("#answer").addClass("alert-danger");
          }
        });
 
    }