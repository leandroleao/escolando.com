/**
 * Created with JetBrains PhpStorm.
 * User: Vitor
 * Date: 17/07/14
 * Time: 20:06
 * To change this template use File | Settings | File Templates.
 */

//valida numero inteiro com mascara
function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
        return false;
    }
    return true;
}

function MascaraTelefone(tel){
    if(mascaraInteiro(tel)==false){
        event.returnValue = false;
    }
    return formataCampo(tel, '(00) 0000-0000', event);
}

function MascaraCNPJ(cnpj){
    if(mascaraInteiro(cnpj)==false){
        event.returnValue = false;
    }
    return formataCampo(cnpj, '00.000.000/0000-00', event);
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) {
    var boleanoMascara;

    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" );

    var posicaoCampo = 0;
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;;

    if (Digitato != 8) { // backspace
        for(i=0; i<= TamanhoMascara; i++) {
            boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                || (Mascara.charAt(i) == "/"))
            boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
            if (boleanoMascara) {
                NovoValorCampo += Mascara.charAt(i);
                TamanhoMascara++;
            }else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
            }
        }
        campo.value = NovoValorCampo;
        return true;
    }else {
        return true;
    }
}

$(document).ready(function(){

  setTimeout(function(){
      $('.success').fadeOut(1500);
      $('.error').fadeOut(1500);
  }, 2000);


    if($('a.scroll[data-scroll="true"]').length){
        $('html, body').animate({
            scrollTop: ($('a.scroll[data-scroll="true"]').offset().top)
        },1000);
    }

    $(function() {
        $( "#calendario" ).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
            });
        $( "#calendario2" ).datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']});
        });

        $('.submit').click(function(){
            var retorno = true,
                error = $(this).parent('form').parent('#form').find('.error');

            $(this).parent('form').find('*[obrigatorio="true"]').each(function(){
                if(!$(this).val().length){
                    retorno = false;
                    error.html('Valores invalidos, confira todos os campos');
                    error.css('display','block');
                    setTimeout(function(){
                        error.fadeOut(1500);
                    }, 2000);
                }
            });
            console.log();
            return retorno;
        });


    $('input[type="checkbox"]').change(function(){
        var id = $(this).attr('data-link'),
            data_link = $(this).attr('id');

        if($(this).prop('checked')){
            $('#'+id).prop('checked',true);
        }
        else{

            if($(this).attr('id')){
                $('*[data-link="'+data_link+'"]').prop('checked',false);
            }
        }
    });

    $(function() {

        $( "#search" ).autocomplete(
            {
                source: "http://localhost:8080/SiteBase/adm-produtos-get"
            })

    });



});
