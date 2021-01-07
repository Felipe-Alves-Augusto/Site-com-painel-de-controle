$(function(){


    $('body').on('submit','form',function(){
        var form = $(this);
        $.ajax({
            beforeSend: function(){
                // enquanto tiver fazendo o carregamento fazer uma animação de carregamento
            },
            method:'post',
            dataType:'json',
            data: form.serialize()

        })

    })

})