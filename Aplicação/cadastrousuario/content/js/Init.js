$(document).ready(	
	
	function(){

		$('#dtBasicExample').DataTable({
			"paging": true,
			"scrollY": '60vh',
        	"scrollCollapse": true,
			"language":{
			    "paginate":{
			    	"previous": "<",
			    	"next": ">"
			    },
			    "search": "Pesquisar",
			    "lengthMenu": "Mostrar _MENU_ registros por página",
	            "zeroRecords": "Não há registro no sistema",
	            "info": "Página _PAGE_ de _PAGES_",
	            "infoEmpty": "Nenhum registro encontrado",
	            "infoFiltered": "(filtrado de _MAX_ registros)"
			  }
		});
		
  		$('.dataTables_length').addClass('bs-select');

		$('#create_usuario').click(function(){
			event.preventDefault();

			Main.load_form_usuario(0);
		});

		$('#corpo').validator().on('submit','#form_usuario',function(){
			event.preventDefault();

			var action = 'create_edit_usuario';
			var data = {
				id: $('#id').val(),
				nome: $('#nome').val(),
				email: $('#email').val(),
				telefone: $('#telefone').val(),
				sexo: $('#sexo').val(),
				ativo: $('#ativo').val(),
				created_at: $('#created_at').val(),
				updated_at: $('#updated_at').val()
			};

			$.ajax({
	                type: 'POST',
	                dataType: 'html',
	                url: '/cadastrousuario/view/usuario/usuario.ajax.php',
	                async: true,
	                data: {action, data},
	                success: function(data) {
	                	$(location).attr('href','/cadastrousuario/view/usuario/index.php');
	                }
	        });
		});

		$('#corpo').on('submit','#form_busca',function(){
			event.preventDefault();

			var action = 'reload_lista_usuario';
	        var data = {
	            busca: $('#busca').val()
	        };

			$.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/cadastrousuario/view/usuario/usuario.ajax.php',
                async: true,
                data: {action, data},
                success: function(data) {
                    $('#div_conteudo').html(data);
                }
        	});
		});

		$('#lista_usuario_desativado').click(function(){
			event.preventDefault();

			Main.lista_usuario_desativado();
		});
	}
);