document.getElementById('change-password-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const renewPassword = document.getElementById('renewPassword').value;

    // Realize validações no lado do cliente, como comparar newPassword com renewPassword
    if (newPassword !== renewPassword) {
      alert('As senhas não coincidem. Por favor, tente novamente.');
      return;
    }

    // Enviar os dados para o servidor para alterar a senha do usuário
    // Você precisa implementar a lógica do servidor para lidar com esses dados.

    // Exemplo de envio usando fetch:
    fetch('alterar_senha.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ currentPassword, newPassword }),
    })
      .then(response => response.json())
      .then(data => {
        alert(data.message);
      })
      .catch(error => {
        console.error(error);
        alert('Erro ao alterar a senha');
      });
  });