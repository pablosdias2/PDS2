document.getElementById('login-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const remember = document.getElementById('remember').checked;

    // Enviar os dados para o servidor (processar_login.php) usando fetch ou outra abordagem.

    // Exemplo usando fetch:
    const response = await fetch('processar_login.php', {
      method: 'POST',
      body: JSON.stringify({ email, password, remember }),
      headers: {
        'Content-Type': 'application/json'
      }
    });

    if (response.ok) {
      // O login foi bem-sucedido, você pode redirecionar o usuário para a página de perfil, por exemplo.
      window.location.href = 'perfil.html';
    } else {
      // O login falhou, você pode exibir uma mensagem de erro.
      alert('Login failed. Please check your credentials.');
    }
  });