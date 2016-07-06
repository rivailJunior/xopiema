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
			url:objeto.url,
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

/**
* realiza cadastro de formulario que nao possui input['file']
* params - objeto['url','formulario', 'msgsuccess','msgerror', 'idformulario']
*  	IMPORTANTE - o formulario precisa estar serializado ex: $("#idformulario").serialize();
*/
function save(objeto) {
	$.ajax({
		url:objeto.url,
		type:"post",
		data:{
			'formulario' : JSON.stringify(objeto.formulario) 
		},
		success:function (response) {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "0",
                "hideDuration": "0",
                "timeOut": "4000",
                "extendedTimeOut": "0",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
			if(response == true){
				$("#"+objeto.idformulario)[0].reset();
	            toastr.success(objeto.msgsuccess);
        	}else{
        		toastr.info(objeto.msgerror);
        	}
		},
		error:function (error) {
			console.log("info", error);
		}
	})
}