$("#container").click(function(){
    $("#modal-mensagem").modal();
});

// function selectSeat(seat) {
//     if (seat.getAttribute('data-status') === 'livre') {
        
//         // Define o status do assento para selecionado
//         seat.setAttribute('data-status', 'selecionado');
//         seat.style.backgroundColor = 'orange';
//     } else if (seat.getAttribute('data-status') === 'comprado') {
//         alert('Este assento já foi comprado.');
//     }
// }

function reservarAssento(assento) {
    if (assento.getAttribute('data-status') === 'livre') {
        assento.setAttribute('data-status', 'comprado');
        assento.classList.add('comprado'); // Adiciona a classe 'comprado'
    } else if (assento.getAttribute('data-status') === 'comprado') {
        alert('Este assento já foi comprado.');
    }
}




