# Atividade 2 — Gerenciador de Turma

**Objetivo:** criar uma classe `Turma` capaz de armazenar vários objetos
`Aluno`, permitindo listar alunos e calcular a média da turma, utilizando
composição entre classes.

## Estrutura

atividade-2-gerenciador-turma/
├── Aluno.php ← classe Aluno (copiada da atividade 1, pasta autocontida)
├── Turma.php ← classe Turma, composta por objetos Aluno
├── index.php ← formulário + demonstração de uso
└── README.md


## Conceitos aplicados

- **Composição** — `Turma` armazena um array privado de objetos `Aluno`
  (`private array $alunos`). A Turma **tem** Alunos, mas não **é** um Aluno
  — diferente de herança, aqui uma classe é construída a partir de
  instâncias de outra.
- **Encapsulamento** — o array `$alunos` é privado; o acesso externo só
  acontece através dos métodos públicos (`adicionarAluno()`,
  `listarAlunos()`).
- **Tipagem forte** — `declare(strict_types=1)`, parâmetros e retornos
  tipados, incluindo o uso de `Aluno` como type hint no método
  `adicionarAluno(Aluno $aluno)`.
- **Métodos da Turma:**
  - `adicionarAluno(Aluno $aluno): void` — adiciona um objeto Aluno à turma.
  - `listarAlunos(): array` — retorna todos os alunos cadastrados.
  - `totalAlunos(): int` — quantidade de alunos na turma.
  - `calcularMediaTurma(): float` — percorre os alunos (repetição) e
    calcula a média das notas, arredondada com `round()`.
- **Reaproveitamento da Atividade 1** — a lógica de situação
  (`calcularSituacao()`) continua na própria classe `Aluno`, reutilizada
  aqui sem duplicação de código.

## Limitação conhecida

Os alunos adicionados via formulário **não persistem** entre requisições
— cada envio recria a turma com os alunos de exemplo e adiciona apenas o
novo aluno daquele request. Isso é uma escolha consciente para manter o
foco da atividade em POO e composição, sem introduzir sessão ou banco de
dados aqui (esse tipo de persistência já foi trabalhado na Prática
Orientada 1).

## Como executar

```bash
cd atividade-2-gerenciador-turma
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador.

## Casos de teste sugeridos

- Acessar a página sem preencher o formulário → exibe os 4 alunos de
  exemplo (Ana, Bruno, Carla, Diego) e a média da turma já calculada.
- Adicionar um novo aluno com nota válida → aparece na tabela junto com os
  demais (na mesma requisição) e a média é recalculada.
- Tentar adicionar com nota fora do intervalo 0–10 → exibe mensagem de
  erro vinda da `InvalidArgumentException` da classe `Aluno`.
