# Atividade 4 — Controle de Acesso com Cookies

**Objetivo:** desenvolver um sistema que armazene o nome do usuário em um
cookie por 7 dias, exibindo mensagem personalizada nos próximos acessos.

## Estrutura

atividade-4-controle-acesso-cookies/
├── index.php
└── README.md


## Conceitos aplicados

- **Cookies (`setcookie()`)** — armazena o nome do usuário com expiração de
  7 dias (`time() + (7 * 24 * 60 * 60)`), diferenciando-se de sessão por
  persistir entre acessos mesmo depois de fechar o navegador.
- **Verificação de cookie existente** — `isset($_COOKIE['nome_usuario'])`
  define se o usuário é "conhecido" ou não, controlando qual conteúdo é
  exibido (formulário de nome vs. mensagem de boas-vindas).
- **Remoção de cookie** — a opção "Esquecer usuário" apaga o cookie
  definindo uma data de expiração no passado (`time() - 3600`).
- **Detalhe técnico importante:** o `setcookie()` só reflete em `$_COOKIE`
  na **próxima** requisição. Por isso, ao salvar um novo nome, o valor é
  também atribuído manualmente a `$_COOKIE['nome_usuario']` na mesma
  execução, para que a mensagem personalizada apareça imediatamente, sem
  precisar recarregar a página.
- **Segurança básica** — nome exibido escapado com `htmlspecialchars()`.

## Como executar

```bash
cd atividade-4-controle-acesso-cookies
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador.

## Casos de teste sugeridos

- Primeiro acesso (sem cookie) → formulário pedindo o nome.
- Após salvar o nome → mensagem "Bem-vindo(a) de volta" imediata.
- Recarregar a página ou reabrir o navegador → cookie persiste, mensagem
  continua aparecendo.
- Verificar no DevTools (aba Application/Storage → Cookies) que
  `nome_usuario` está salvo com expiração de 7 dias.
- Clicar em "Esquecer usuário" → cookie removido, volta a pedir o nome.
