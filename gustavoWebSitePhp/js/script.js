// Exibir ao usuário se a mensagem foi enviada corretamente
function alertMensagem() {

    var alertNome = document.querySelector('#nome');
    var AlertEmail = document.querySelector('#email');
    var alertMensagem = document.querySelector('#mensagem');
    const success = document.querySelector('#success');
    const failed = document.querySelector('#failed');

    if (alertNome.value === '' || AlertEmail.value === '' || alertMensagem.value === '') {
        failed.style.display = 'block';

    } else {
        success.style.display = 'block';
    }
}

function enviarEmail() {
    var nome = $("#nome");
    var email = $("#email");
    var telefone = $("#telefone");
    var assunto = $("#assunto");
    var mensagem = $("#mensagem");

    /*
     * Configurações do 'ajax' usando o method POST para inserir um dado e passando 
     * as variaveis obtidas do 'form'
     */
    $.ajax({
        url: 'sendEmail.php',
        method: 'POST',
        dataType: 'json',
        data: {
            nome: nome.val(),
            email: email.val(),
            telefone: telefone.val(),
            assunto: assunto.val(),
            mensagem: mensagem.val(),
        },
        success: function(response) {
            $('#form')[0].reset();
        }
    });
}
/*
 * Este metodo é usado para controlar o glider, por utilizar multiplas instancias do glider.js
 * é necessario inicializar o objeto Glider para cada elemento no qual deseja que ele seja 
 * executado. O autor do glide.js disponibizou o codigo abaixo resolvido na 'issue' #24:
 * 
 * https://github.com/NickPiscitelli/Glider.js/issues/24
 *  
 */
window.addEventListener('load', function() {
    [].forEach.call(document.querySelectorAll('.glider'), function(ele) {
        ele.addEventListener('glider-slide-visible', function(event) {
            var glider = Glider(this);
            console.log('Slide Visible %s', event.detail.slide)
        });
        ele.addEventListener('glider-slide-hidden', function(event) {
            console.log('Slide Hidden %s', event.detail.slide)
        });
        ele.addEventListener('glider-refresh', function(event) {
            console.log('Refresh')
        });
        ele.addEventListener('glider-loaded', function(event) {
            console.log('Loaded')
        });
        new Glider(ele, {
            slidesToShow: 1,
            slidesToScroll: 1,
            itemWidth: 150,
            scrollLock: true,
            draggable: true,
            dots: ele.parentNode.querySelector('.dots'),
            rewind: true,
            arrows: {
                prev: ele.parentNode.querySelector('.glider-prev'),
                next: ele.parentNode.querySelector('.glider-next')
            },
            responsive: [{
                breakpoint: 800,
                settings: {
                    slidesToScroll: 'auto',
                    itemWidth: 300,
                    slidesToShow: 'auto',
                    exactWidth: true
                }
            }, {
                breakpoint: 700,
                settings: {
                    slidesToScroll: 4,
                    slidesToShow: 4,
                    dots: false,
                    arrows: false,
                }
            }, {
                breakpoint: 600,
                settings: {
                    slidesToScroll: 3,
                    slidesToShow: 3
                }
            }, {
                breakpoint: 500,
                settings: {
                    slidesToScroll: 2,
                    slidesToShow: 2,
                    dots: false,
                    arrows: false,
                    scrollLock: true
                }
            }]
        });
    });
});