# Atividade 5 — Injeção de Dependência

**Objetivo:** implementar um sistema acadêmico que utilize Injeção de
Dependência para geração de relatórios, separando responsabilidades entre
classes.

## Estrutura

atividade-5-injecao-dependencia/
├── Aluno.php ← classe Aluno (reaproveitada)
├── Turma.php ← classe Turma, composição de Alunos (reaproveitada)
├── FormatoRelatorio.php ← interface (contrato da dependência)
├── FormatoTextoSimples.php ← implementação concreta 1
├── FormatoHtmlTabela.php ← implementação concreta 2
├── RelatorioAcademico.php ← classe que RECEBE a dependência via construtor
├── index.php ← demonstração trocando a dependência injetada
└── README.md


## Conceitos aplicados

- **Injeção de Dependência (DI)** — `RelatorioAcademico` não cria seu
  próprio formato de saída internamente (nunca faz `new FormatoHtmlTabela()`
  dentro de si). Em vez disso, recebe pronto um objeto `FormatoRelatorio`
  através do construtor (`__construct(private readonly FormatoRelatorio $formato)`).
  Quem decide qual formato usar é código **externo** à classe (no caso,
  `index.php`).
- **Interface como contrato da dependência (`FormatoRelatorio`)** —
  `RelatorioAcademico` depende apenas da interface, nunca de uma classe
  concreta específica. Isso permite trocar a implementação sem alterar
  `RelatorioAcademico` em nenhuma linha.
- **Separação de responsabilidades:**
  - `Turma`/`Aluno` → representam os dados acadêmicos.
  - `FormatoTextoSimples`/`FormatoHtmlTabela` → sabem **como formatar** um
    relatório, cada uma à sua maneira.
  - `RelatorioAcademico` → apenas **orquestra** a geração, delegando o
    "como" para o formato injetado.
- **Extensibilidade** — para adicionar um novo formato (ex: JSON, CSV),
  basta criar uma nova classe implementando `FormatoRelatorio` e injetá-la;
  `RelatorioAcademico` continua intocado.

## Como executar

```bash
cd atividade-5-injecao-dependencia
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador. Use os links da página ou o
parâmetro `?formato=texto` / `?formato=html` na URL para trocar o formato
do relatório em tempo real.

## Casos de teste sugeridos

- Acessar com `?formato=html` (ou sem parâmetro) → relatório exibido como
  tabela HTML.
- Acessar com `?formato=texto` → o mesmo relatório, mesma turma, mesmos
  dados, exibido como texto simples dentro de uma tag `<pre>`.
- Observar que `RelatorioAcademico.php` não muda entre um formato e outro
  — só a dependência injetada em `index.php` muda.
