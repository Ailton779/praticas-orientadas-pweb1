<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    /**
     * Lista apenas as notas do usuário autenticado.
     */
    public function index()
    {
        $notas = Nota::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notas.index', compact('notas'));
    }

    /**
     * Exibe o formulário de criação de nota.
     */
    public function create()
    {
        return view('notas.create');
    }

    /**
     * Salva uma nova nota associada ao usuário autenticado.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Nota::create([
            'user_id' => Auth::id(),
            'titulo' => $validated['titulo'],
            'conteudo' => $validated['conteudo'], // criptografado automaticamente pelo Mutator
        ]);

        return redirect()->route('notas.index')
            ->with('success', 'Nota criada com sucesso!');
    }

    /**
     * Exibe uma nota específica (somente se pertencer ao usuário).
     */
    public function show(Nota $nota)
    {
        $this->authorize('view', $nota);

        return view('notas.show', compact('nota'));
    }

    /**
     * Exibe o formulário de edição (somente se pertencer ao usuário).
     */
    public function edit(Nota $nota)
    {
        $this->authorize('update', $nota);

        return view('notas.edit', compact('nota'));
    }

    /**
     * Atualiza a nota (somente se pertencer ao usuário).
     */
    public function update(Request $request, Nota $nota)
    {
        $this->authorize('update', $nota);

        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $nota->update($validated); // conteudo criptografado automaticamente pelo Mutator

        return redirect()->route('notas.index')
            ->with('success', 'Nota atualizada com sucesso!');
    }

    /**
     * Remove a nota (soft delete - somente se pertencer ao usuário).
     */
    public function destroy(Nota $nota)
    {
        $this->authorize('delete', $nota);

        $nota->delete(); // soft delete, graças ao trait SoftDeletes na Model

        return redirect()->route('notas.index')
            ->with('success', 'Nota excluída com sucesso!');
    }
}
