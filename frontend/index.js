(function(){
    let     local_data  = {}, id_editando = null,key = null;
    const   tabla       = $('#tabla'),
            m1          = $('#modal'),
            campos      = ['sAlias','sMarca','nModelo','sPlacas'];

    function print_table(){

        let trs = local_data.map(function(e,i){
            return `
            <tr k="${i}">
                <td>${e.sAlias}</td>
                <td>${e.sMarca}</td>
                <td>${e.nModelo}</td>
                <td>${e.sPlacas}</td>
                <td>
                    <a class="btn btn-primary btn-block btn-sm btn-editar " style="cursor:pointer; color:#fff">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            `
        });

        $('tbody',tabla).html(trs.join('\n'));

    }

    $(window).on('load',function(){
        $.get('backend/transportes/get.php',{},function(r,s){
            r = JSON.parse(r);

            if(!r.error){

                local_data = r.data;
                print_table();

            }else{
                alert(r.mensaje);
            }
        })

        tabla.on('click','.btn-editar',function(){

            key = $(this).parents('tr').attr('k');
            id_editando = local_data[key].id;

            $('.modal-title',m1).text(local_data[key].sAlias)

            campos.forEach(function(e){
                $('#'+e).val(local_data[key][e]);
            })
            m1.modal();

        });
        $('body').on('click','.btn-nuevo',function(){

            $('.modal-title',m1).text('Registrar')
            campos.forEach(function(e){
                $('#'+e).val('');
            })
            id_editando = 0;
            m1.modal();
        });

        $('#btn-save').on('click',function(){
            let dataset = {}, hasError = [];

            campos.forEach(function(e){
                let valor = $('#'+e).val();

                if(valor.trim() == ''){
                    hasError.push($('[for='+e+']').text());
                }else{
                    dataset[e] = valor;
                }
            })

            if(hasError.length == 0){
                dataset.id = id_editando;
                $.post('backend/transportes/set.php',dataset,function(r,s){
                    r = JSON.parse(r);

                    if(!r.error){
                        if(id_editando == 0){
                            dataset.id = r.data;
                            local_data.push(dataset);
                        }else{
                            local_data[key]= dataset;
                        }

                        print_table();

                        m1.modal('hide');

                    }else{
                        alert(r.mensaje);
                    }
                });
            }else{
                alert('Los siguientes campos son requeridos: \n'+hasError.join('\n'));
            }
        })


    })
})();