$(document).ready(function(){
    $('.sidenav').sidenav();
});

$(document).ready(function(){
    $('select').formSelect();
  });
        
$('.escondido').hide()

$('.btn-center').click((e) => {
    e.preventDefault()
    const selects = Array.from(document.querySelectorAll('.venda-form select'));
    const campos = Array.from(document.querySelectorAll('.venda-form .campo_venda_form'));

    let maior = 0;

    selects.forEach((e, i) =>{
        maior = VerificaMaior(e,maior,campos[i]);
    })
    
    maior++

    $(`select[id="${maior}"]`).closest('.escondido').show()
    $(`select[id="${maior}"]`).closest('.escondido').removeClass('escondido')
})

function VerificaMaior (e,maior,campo){
    if(campo.classList.contains("escondido")){
        return maior;
    }

    let atual =  parseInt(e.id);

    return atual > maior ? atual : maior 
}

$('.venda-form').on('change', () => {
    let precos = [];
    let quantidade = []
    $('.venda-form select').each((i , e) => {
        precos.push(parseFloat(e.options[e.selectedIndex].getAttribute('preco')))
    })


    $('.venda-form input[type="number"]').each((i, e) => {
        $(e).val() < 0 ? $(e).val(0) : null 
        quantidade.push(parseFloat($(e).val()))
    })

    let total = SomaTotal(precos, quantidade);


    console.log(total)
    $('.valor-total').html(`R$${total.toFixed(2)}`)
})

function SomaTotal(precos, quantidade){
    let total = 0;
    for(let i = 0; i < precos.length; i++){
        if(isNaN(precos[i])){
            continue
        }
        total += precos[i] * quantidade[i]
    }
    return total
}