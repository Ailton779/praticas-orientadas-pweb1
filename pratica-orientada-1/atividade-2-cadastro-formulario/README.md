# Atividade 2 — Simulador de Cadastro via Formulário

**Objetivo:** criar um formulário HTML que envie dados via método POST para
um script PHP, realizando validação dos campos e exibindo os dados
organizadamente.

## Estrutura

atividade-2-cadastro-formulario/
├── formulario.php ← formulário HTML (nome, e-mail, idade, cidade)
├── processar.php ← recebe, valida e exibe os dados
└── README.md


## Conceitos aplicados

- **Formulário HTML + método POST** — `formulario.php` envia os dados para
  `processar.php` via `action="processar.php"` e `method="POST"`.
- **Validação de campos no servidor:**
  - Nome: obrigatório, mínimo de 3 caracteres.
  - E-mail: obrigatório e validado com `filter_var(..., FILTER_VALIDATE_EMAIL)`.
  - Idade: obrigatória, precisa ser um número inteiro (`ctype_digit`) e estar
    entre 1 e 120.
  - Cidade: obrigatória.
- Os campos do formulário usam `type="text"` propositalmente (em vez de
  `type="email"`/`type="number"`), para garantir que a validação seja feita
  de fato no PHP, e não barrada antes pelo navegador.
- **Exibição condicional dos dados** — se houver erros, uma lista é exibida;
  caso contrário, os dados cadastrados aparecem organizados em uma tabela.
- **Segurança básica** — todos os dados exibidos passam por
  `htmlspecialchars()` para evitar XSS, e `trim()` é usado para remover
  espaços extras antes da validação.

## Como executar

```bash
cd atividade-2-cadastro-formulario
php -S localhost:8000
```
Acesse `http://localhost:8000/formulario.php` no navegador.

## Casos de teste sugeridos

- Todos os campos preenchidos corretamente → mensagem de sucesso com tabela.
- Campo vazio → mensagem de erro específica do campo.
- E-mail em formato inválido (ex: `teste@`) → erro de validação de e-mail.
- Idade com letras ou fora do intervalo 1–120 → erro de validação de idade.
