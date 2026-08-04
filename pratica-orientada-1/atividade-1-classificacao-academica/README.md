# Atividade 1 — Sistema de Classificação Acadêmica

**Objetivo:** receber uma nota e informar a situação do aluno (Aprovado,
Recuperação ou Reprovado).

## Conceitos aplicados

- **Função** `classificarAluno(float $nota): string` — centraliza a regra de
  negócio, retornando a situação com base na nota recebida.
- **Estruturas condicionais** (`if/elseif/else`) — define a faixa de
  classificação:
  - Nota >= 7 → Aprovado
  - Nota >= 5 e < 7 → Recuperação
  - Nota < 5 → Reprovado
  - Fora do intervalo 0–10 → Nota inválida
- **Formulário HTML + POST** — o usuário digita uma nota e o próprio script
  processa e exibe o resultado.
- **Repetição** (`foreach`) — um array de notas de exemplo é percorrido e
  passado pela função de classificação, exibindo os resultados em uma tabela
  automática (demonstra o uso do laço de repetição além do fluxo principal).
- **Validação de entrada** — verifica se o valor enviado é numérico
  (`is_numeric`) antes de processar, e escapa a saída com
  `htmlspecialchars` para evitar problemas de segurança (XSS).

## Como executar

```bash
cd atividade-1-classificacao-academica
php -S localhost:8000
```
Acesse `http://localhost:8000` no navegador.
