/**
* @author rivail santos 
*/

/**
* send a request to sabe object
* params - 
			objeto = {
			formularioId: 'id_do_seu_formulario', 
			msgsuccess: 'sua msg de sucesso', msgerror: 'mensagem de erro'
			}
*/
function saveAndReload(objeto) {  
	$("#"+objeto.formularioId).ajaxForm({
			complete:function (res){
				console.log("complete:", res);
			},
			success:function (res) {
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
	                    },
	                    "timeOut": "4000",
	                    "extendedTimeOut": "0",
	                    "showEasing": "swing",
	                    "hideEasing": "linear",
	                    "showMethod": "fadeIn",
	                    "hideMethod": "fadeOut"
	                };
					toastr.success(objeto.msgsuccess);
				} else {
					toastr.info(objeto.msgerror);
				}
			}
	});
};//fim function