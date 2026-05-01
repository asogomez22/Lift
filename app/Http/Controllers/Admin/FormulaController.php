<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formula;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormulaController extends Controller
{
    public function index()
    {
        $formulas = Formula::ordered()->get();
        return view('admin.formulas.index', compact('formulas'));
    }

    public function create()
    {
        return view('admin.formulas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:formulas,slug|alpha_dash|max:255',
            'description' => 'nullable|string',
            'formula' => 'required|string',
            'parameters' => 'nullable|json',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer',
        ]);

        $maxOrder = Formula::max('display_order') ?? 0;

        Formula::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'formula' => $request->formula,
            'parameters' => $request->parameters ? json_decode($request->parameters, true) : null,
            'category' => $request->category,
            'is_active' => $request->has('is_active'),
            'display_order' => $request->display_order ?? ($maxOrder + 1),
        ]);

        return redirect()->route('formulas.index')->with('success', 'Fórmula creada correctamente.');
    }

    public function edit(Formula $formula)
    {
        return view('admin.formulas.edit', compact('formula'));
    }

    public function update(Request $request, Formula $formula)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|alpha_dash|max:255|unique:formulas,slug,' . $formula->id,
            'description' => 'nullable|string',
            'formula' => 'required|string',
            'parameters' => 'nullable|json',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer',
        ]);

        $formula->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'formula' => $request->formula,
            'parameters' => $request->parameters ? json_decode($request->parameters, true) : null,
            'category' => $request->category,
            'is_active' => $request->has('is_active'),
            'display_order' => $request->display_order ?? $formula->display_order,
        ]);

        return redirect()->route('formulas.index')->with('success', 'Fórmula ac

tualizada correctamente.');
    }

    public function destroy(Formula $formula)
    {
        $formula->delete();
        return redirect()->route('formulas.index')->with('success', 'Fórmula eliminada correctamente.');
    }

    public function toggleActive(Formula $formula)
    {
        $formula->is_active = !$formula->is_active;
        $formula->save();

        return back()->with('success', 'Estado actualizado correctamente.');
    }
}
