var Main = {

	load_form_usuario: function(id){

		var action = 'load_form_usuario';
		var data = {
			id: id,
			nome: '',
            email: '',
            telefone: '',
            sexo: '',
            ativo: '',
            created_at: '',
            updated_at: '',
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
	},
	deleta_usuario: function(id){

		var action = 'deleta_usuario';
		var data = {
			id: id
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
	},
    lista_usuario_desativado: function(){

        var action = 'lista_usuario_desativado';
        var data = {
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
    },
    reativar_usuario: function(id){

        var action = 'reativar_usuario';
        var data = {
            id: id
        };

        $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/cadastrousuario/view/usuario/usuario.ajax.php',
                async: true,
                data: {action, data},
                success: function(data) {
                    $(location).attr('href','/cadastrousuario/view/usuario/lista_usuario_desativado.php');
                }
        });
    }
};