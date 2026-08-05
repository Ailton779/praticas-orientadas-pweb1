# Práticas Orientadas — Programação Web 1

Repositório com as práticas orientadas da disciplina de Programação Web 1,
desenvolvidas em PHP e Laravel.

## Prática Orientada 1 — Atividades

Sistemas em PHP procedural aplicando estruturas condicionais, repetição,
funções, formulários HTML, sessões e cookies.

| Atividade | Descrição | Conceitos principais |
|---|---|---|
| [Atividade 1](./pratica-orientada-1/atividade-1-classificacao-academica) | Sistema de Classificação Acadêmica | Condicionais, repetição, funções |
| [Atividade 2](./pratica-orientada-1/atividade-2-cadastro-formulario) | Simulador de Cadastro via Formulário | Formulário POST, validação server-side |
| [Atividade 3](./pratica-orientada-1/atividade-3-login-area-restrita) | Sistema de Login com Área Restrita | Sessões, proteção de rota |
| [Atividade 4](./pratica-orientada-1/atividade-4-controle-acesso-cookies) | Controle de Acesso com Cookies | Cookies, persistência entre acessos |
| [Atividade 5](./pratica-orientada-1/atividade-5-desafio-integrador) | Desafio Integrador | Integração de todos os conceitos anteriores |

Cada pasta de atividade contém seu próprio README com objetivo, conceitos
aplicados, instruções de execução e casos de teste sugeridos.

## Como executar qualquer atividade

Todas as atividades da Prática 1 usam o servidor embutido do PHP:

```bash
cd pratica-orientada-1/nome-da-atividade
php -S localhost:8000
```

No Codespaces, a porta é detectada automaticamente e uma notificação
permite abrir a aplicação no navegador (ou acesse pela aba **Ports**).

## Convenção de commits

Este repositório segue o padrão [Conventional Commits](https://www.conventionalcommits.org/):

- `feat:` nova funcionalidade
- `fix:` correção de bug
- `docs:` documentação (READMEs, comentários)
- `chore:` manutenção, estrutura de pastas, configuração
- `style:` formatação sem mudança de lógica
- `refactor:` reorganização de código sem mudar comportamento
