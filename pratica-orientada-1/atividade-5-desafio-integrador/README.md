# Atividade 5 — Desafio Integrador

**Objetivo:** construir um mini sistema que integre login, cadastro via
formulário, validação e exibição de dados, aplicando todos os conceitos da
unidade.

## Estrutura

atividade-5-desafio-integrador/
├── login.php ← autenticação + inicia sessão
├── cadastro.php ← formulário de cadastro, validado, salvo na sessão
├── dados.php ← exibe os dados cadastrados
├── logout.php ← encerra a sessão
└── README.md


## Fluxo do sistema

login.php → cadastro.php → dados.php
↑ ↑ ↑
└── logout.php (limpa tudo e retorna aqui)


Cada etapa depende da anterior: sem login não se acessa o cadastro, e sem
cadastro preenchido não se acessa a exibição de dados.

## Conceitos aplicados

- **Sessões** — controlam o acesso em cascata: `$_SESSION['usuario_logado']`
  libera o cadastro, e `$_SESSION['cadastro']` libera a exibição dos dados.
- **Autenticação** — mesma lógica da Atividade 3 (usuário/senha fixos).
- **Formulário + validação server-side** — reaproveita as regras da
  Atividade 2 (nome, e-mail, idade, cidade), agora salvando o resultado
  validado diretamente na sessão em vez de exibir na mesma página.
- **Proteção de rotas** — cada página (`cadastro.php`, `dados.php`) verifica
  as condições necessárias no início do script e redireciona
  (`header("Location: ...")`) caso não sejam atendidas.
- **Persistência entre páginas via sessão** — diferente da Atividade 2 (onde
  os dados só existiam durante aquela requisição), aqui o cadastro fica
  disponível em `dados.php` mesmo em uma navegação separada, porque está
  guardado em `$_SESSION`.
- **Logout completo** — `session_unset()` + `session_destroy()` limpam tanto
  o login quanto o cadastro, evitando acesso residual.
- **Segurança básica** — toda saída de dados do usuário passa por
  `htmlspecialchars()`.

## Como executar

```bash
cd atividade-5-desafio-integrador
php -S localhost:8000
```
Acesse `http://localhost:8000/login.php` no navegador.

## Casos de teste sugeridos

- Acessar `cadastro.php` ou `dados.php` direto, sem login → redireciona para `login.php`.
- Login incorreto → mensagem de erro.
- Login correto (`admin` / `1234`) → acesso ao cadastro.
- Acessar `dados.php` logado, mas sem cadastro preenchido → redireciona para `cadastro.php`.
- Cadastro com campos inválidos → mostra os erros, sem avançar.
- Cadastro válido → redireciona para `dados.php`, exibindo a tabela com os dados.
- Logout → limpa sessão inteira; tentar acessar `dados.php` depois deve redirecionar para `login.php`.
