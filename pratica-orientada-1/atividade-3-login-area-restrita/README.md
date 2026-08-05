# Atividade 3 — Sistema de Login com Área Restrita

**Objetivo:** implementar um sistema simples de autenticação utilizando
sessões, permitindo acesso a uma página restrita somente após login válido.

## Estrutura

atividade-3-login-area-restrita/
├── login.php ← formulário de login + autenticação + inicia sessão
├── restrita.php ← página protegida, exige sessão ativa
├── logout.php ← encerra a sessão
└── README.md


## Conceitos aplicados

- **Sessões (`session_start()`)** — usadas para manter o estado de "usuário
  logado" entre requisições diferentes.
- **Autenticação simples** — credenciais fixas (`admin` / `1234`) simulando
  uma base de usuários, comparadas no `login.php`.
- **Proteção de rota** — `restrita.php` verifica `isset($_SESSION['usuario_logado'])`
  no início do script; se não houver sessão ativa, redireciona (`header("Location: ...")`)
  de volta para o login antes de renderizar qualquer conteúdo.
- **Redirecionamento inteligente** — se o usuário já estiver logado e tentar
  acessar `login.php` novamente, é redirecionado direto para `restrita.php`.
- **Logout** — `logout.php` usa `session_unset()` e `session_destroy()` para
  encerrar a sessão corretamente, evitando resíduos de dados.
- **Segurança básica** — saída do nome de usuário escapada com
  `htmlspecialchars()`.

## Como executar

```bash
cd atividade-3-login-area-restrita
php -S localhost:8000
```
Acesse `http://localhost:8000/login.php` no navegador.

## Casos de teste sugeridos

- Acessar `restrita.php` diretamente, sem login → deve redirecionar para `login.php`.
- Login com usuário/senha incorretos → mensagem de erro.
- Login com usuário **admin** e senha **1234** → acesso liberado à área restrita.
- Clicar em "Sair" → sessão encerrada, retorno ao login.
- Tentar acessar `login.php` já logado → redirecionamento automático para `restrita.php`.
