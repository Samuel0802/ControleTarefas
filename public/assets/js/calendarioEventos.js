

function validarFormulario() {

    const formulario = document.getElementById('cadastrareventos');
    const titulo = formulario.elements['title'].value.trim();
    const data = formulario.elements['date'].value.trim();
    const descricao = formulario.elements['descricao'].value.trim();
    
   
    if (titulo === '' || data === '' || descricao === '') {
        alert('Por favor, preencha todos os campos do formulário.');
        return; 
    }
    
    
    alert('Formulário enviado com sucesso!');
   
}