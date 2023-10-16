document.getElementById('signUp').addEventListener('click', async (e) => {
    e.preventDefault();
    
    // Coletar os dados do formulário
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const acceptTerms = document.getElementById('acceptTerms').checked;
  
    if (!acceptTerms) {
      alert('You must agree to the terms and conditions.');
      return;
    }
  
    // Enviar os dados do formulário para o servidor PHP
    const response = await fetch('processar_registro.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name, email, password }),
    });
  
    if (response.ok) {
      // Registro bem-sucedido, você pode redirecionar o usuário ou exibir uma mensagem de sucesso
      alert('Registration successful! You can now log in.');
    } else {
      // Registro falhou, você pode exibir uma mensagem de erro
      alert('Registration failed. Please check your information and try again.');
    }
  });
  