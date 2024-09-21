 

 
 function mudarTexto() {
    const textoInput = document.getElementById('texto');
    const novoTexto = textoInput.value.trim(); // Obtém o valor do campo de entrada e remove espaços em branco em excesso

    // Verifica se o campo de entrada de texto está vazio
    if (novoTexto === '') {
        console.log('O campo de texto está vazio. Por favor, insira um texto válido.');
        return; // Sai da função se o campo de texto estiver vazio
    }
    
    // Aqui você pode fazer o que quiser com o novo texto
    console.log('Novo texto:', novoTexto);


}