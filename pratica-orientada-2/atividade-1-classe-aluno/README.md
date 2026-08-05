# Atividade 1 — Refatoração para Classe

**Objetivo:** transformar o sistema procedural de classificação acadêmica
(desenvolvido na Prática Orientada 1) em uma classe `Aluno`, aplicando
tipagem forte, encapsulamento e um método para cálculo da situação final.

## Estrutura

atividade-1-classe-aluno/
├── Aluno.php ← classe que representa o aluno
├── index.php ← formulário + demonstração de uso da classe
└── README.md


## Origem / evolução

Esta atividade reaproveita a lógica de
[`pratica-orientada-1/atividade-1-classificacao-academica`](../../pratica-orientada-1/atividade-1-classificacao-academica),
que era uma função solta (`classificarAluno()`), e a reorganiza como
comportamento de um objeto `Aluno`.

## Conceitos aplicados

- **`declare(strict_types=1)`** — ativa tipagem estrita no arquivo, evitando
  conversões implícitas de tipo (ex: `"7"` não vira `7` automaticamente).
- **Tipagem forte** — todas as propriedades e retornos de método são
  tipados (`string`, `float`, `void`).
- **Constructor property promotion (PHP 8.0+)** — a propriedade `$nome` é
  declarada e atribuída diretamente na assinatura do construtor, sem
  precisar repetir a declaração dentro do corpo do método.
- **`readonly` (PHP 8.1+)** — `$nome` é somente leitura após a criação do
  objeto, já que um aluno não deveria "trocar de nome" no sistema.
- **Encapsulamento** — `$nota` é privada e só pode ser alterada através do
  método `setNota()`, que valida o intervalo (0 a 10) antes de aceitar o
  valor. Tentar definir uma nota inválida lança uma
  `InvalidArgumentException`.
- **Método de regra de negócio** — `calcularSituacao()` centraliza a lógica
  de classificação (Aprovado / Recuperação / Reprovado), agora como
  comportamento do próprio objeto `Aluno`, em vez de uma função externa que
  recebia a nota como parâmetro.

## Como executar

```bash
cd atividade-1-classe-aluno
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador.

## Casos de teste sugeridos

- Cadastrar um aluno com nota válida (ex: 8.5) → exibe nome, nota e
  situação "Aprovado".
- Cadastrar com nota entre 5 e 7 → situação "Recuperação".
- Cadastrar com nota abaixo de 5 → situação "Reprovado".
- Tentar cadastrar com nota fora do intervalo 0–10 (ex: 15 ou -2) → exibe
  mensagem de erro vinda da `InvalidArgumentException`.
- Observar a tabela de objetos de exemplo, instanciados diretamente no
  código (`Ana`, `Bruno`, `Carla`, `Diego`), demonstrando o uso da classe
  fora do fluxo do formulário.
