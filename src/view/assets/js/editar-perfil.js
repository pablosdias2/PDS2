document.getElementById('profile-form').addEventListener('submit', function (e) {
    e.preventDefault();
    
    // Coletar os dados do formulário
    const fullName = document.getElementById('fullName').value;
    const about = document.getElementById('about').value;
    const team = document.getElementById('team').value;
    const country = document.getElementById('Country').value;
    const email = document.getElementById('Email').value;
    
    // Enviar os dados para o servidor para atualizar o perfil do usuário
    // Você precisará implementar a lógica do servidor para lidar com esses dados.
    
    // Exemplo de envio usando fetch:
    fetch('atualizar_perfil.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        fullName,
        about,
        team,
        country,
        email,
      }),
    })
      .then(response => response.json())
      .then(data => {
        // Lidar com a resposta do servidor, como exibir uma mensagem de sucesso.
        alert(data.message);
      })
      .catch(error => {
        console.error(error);
        alert('Erro ao atualizar o perfil');
      });
  });