
$(document).ready(function() {
        var campos_max          = 20;   //max de 10 campos
        var x = 1; // campos iniciais
        $('#add_field').click (function(e) {
                e.preventDefault();     //prevenir novos clicks
                if (x < campos_max) {
                        
                        $('#listas').append('<br><div>\
                                <input type="text" placeholder="Descricão" class="inputclass" name="experiencias['+x+'][descricao]">\
                                <input placeholder="Empresa" class="inputclass" type="text" name="experiencias['+x+'][empresa]">\
                                <input placeholder="Cargo" class="inputclass" type="text" name="experiencias['+x+'][cargo]">\
                                <input placeholder="Função" class="inputclass" type="text" name="experiencias['+x+'][funcao]">\
                                <input placeholder="Data de Inicio" class="inputclass" type="date" name="experiencias['+x+'][data_inicio]">\
                                <input placeholder="Data Fim" class="inputclass" type="date" name="experiencias['+x+'][data_fim]">\
                                <input placeholder="Descricão" class="inputclass" type="text" name="experiencias['+x+'][descricao]">\
                                <a href="#" class="remover_campo">Remover</a>\
                                </div>');
                        x++;
                }
        });
        // Remover o div anterior
        $('#listas').on("click",".remover_campo",function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
        });
});
