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

## Prática Orientada 2 — Atividades

Evolução dos sistemas da Prática 1 para o paradigma de Programação
Orientada a Objetos, aplicando recursos modernos do PHP 8.x, como preparo
para a estrutura interna do Laravel.

| Atividade | Descrição | Conceitos principais |
|---|---|---|
| [Atividade 1](./pratica-orientada-2/atividade-1-classe-aluno) | Refatoração para Classe | Tipagem forte, encapsulamento, constructor promotion, readonly |
| [Atividade 2](./pratica-orientada-2/atividade-2-gerenciador-turma) | Gerenciador de Turma | Composição entre classes |
| [Atividade 3](./pratica-orientada-2/atividade-3-interfaces-polimorfismo) | Interfaces e Polimorfismo | Interface, implements, polimorfismo |
| [Atividade 4](./pratica-orientada-2/atividade-4-classe-abstrata-trait) | Classe Abstrata e Trait | Herança, classe abstrata, trait |
| [Atividade 5](./pratica-orientada-2/atividade-5-injecao-dependencia) | Injeção de Dependência | DI, separação de responsabilidades |

Cada pasta de atividade contém seu próprio README com objetivo, conceitos
aplicados, instruções de execução e casos de teste sugeridos.

## Como executar qualquer atividade

Todas as atividades das Práticas 1 e 2 usam o servidor embutido do PHP:

```bash
cd pratica-orientada-N/nome-da-atividade
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
