/**
* @author rivail santos 
*/

function resetForm(formulario) {
	$("#"+formulario)[0].reset();
}


/**
* send a request to sabe object
* params - 
			objeto = {
			formularioId: 'id_do_seu_formulario', 
			msgsuccess: 'sua msg de sucesso', msgerror: 'mensagem de erro'
			}
*/
function saveAndReload(objeto) {
	var loader = $("#loader"); 
	$("#"+objeto.formularioId).ajaxForm({
	        uploadProgress: function(event, position, total, percentComplete) {
				$("#"+objeto.formularioId+" button").prop("disabled", true);
	     		var html = "<div class='progress'>"+
    							"<div class='indeterminate'></div>"+
							"</div>";
				loader.html(html)	 
	        },
			complete:function (res){
				console.log("success");
			},
			success:function (res, status, xhr) {
				if(res == true){
	                toastr.options = {
	                    "closeButton": true,
	                    "progressBar": true,
	                    "preventDuplicates": false,
	                    "onclick": null,
	                    "showDuration": "0",
	                    "hideDuration": "0",
	                    "onHidden": function (){
	                    	window.location.reload()
	                    	//$("#"+objeto.formularioId+" button").prop("disabled", false);
	                    	//$("#loader").hide();
	                    },
	                    "timeOut": "4000",
	                    "extendedTimeOut": "0",
	                    "showEasing": "swing",
	                    "hideEasing": "linear",
	                    "showMethod": "fadeIn",
	                    "hideMethod": "fadeOut"
	                };
					toastr.success(objeto.msgsuccess);
					//resetForm(objeto.formularioId);
				} else {
					toastr.info(objeto.msgerror);
					$("#"+objeto.formularioId+" button").prop("disabled", false);
				}
			}
	});
};//fim function