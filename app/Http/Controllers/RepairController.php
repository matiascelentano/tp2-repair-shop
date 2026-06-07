<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Repair;       

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allowed = ['id','nombre_cliente','marca_celular','modelo_celular','fecha_ingreso','estado','created_at'];
        $sort = request('sort');
        $direction = request('direction') === 'asc' ? 'asc' : 'desc';

        $query = Repair::query();
        // Filters
        $q = request('q');
        if ($q) {
            $query->where('nombre_cliente', 'like', "%{$q}%");
        }
        $estadoFilter = request('estado');
        if ($estadoFilter && in_array($estadoFilter, Repair::ESTADOS)) {
            $query->where('estado', $estadoFilter);
        }
        $marcaFilter = request('marca');
        if ($marcaFilter) {
            $query->where('marca_celular', $marcaFilter);
        }
        if ($sort && in_array($sort, $allowed)) {
            $query->orderBy($sort, $direction);
        } else {
            $query->latest();
        }

        $repairs = $query->simplePaginate(10)->withQueryString();

        // For filters UI
        $marcas = Repair::select('marca_celular')->distinct()->orderBy('marca_celular')->pluck('marca_celular');
        $estados = Repair::ESTADOS;

        return view('index', compact('repairs', 'marcas', 'estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Repair::ESTADOS;
        return view('create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nombre_cliente'    => 'required|string|max:255',
            'marca_celular'     => 'required|string|max:255',
            'modelo_celular'    => 'required|string|max:255',
            'descripcion_falla' => 'required|string',
            'fecha_ingreso'     => 'required|date',
            'estado'            => 'required|in:' . implode(',', Repair::ESTADOS),
        ]);

        Repair::create($request->all());
        return redirect()->route('repairs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $repair = Repair::findOrFail($id);
        return view('show', compact('repair'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = Repair::ESTADOS;
        $repair = Repair::findOrFail($id);
        return view('edit', compact('repair', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_cliente'    => 'required|string|max:255',
            'marca_celular'     => 'required|string|max:255',
            'modelo_celular'    => 'required|string|max:255',
            'descripcion_falla' => 'required|string',
            'fecha_ingreso'     => 'required|date',
            'estado'            => 'required|in:' . implode(',', Repair::ESTADOS),
        ]);

        $repair = Repair::findOrFail($id);
        $repair->update($request->all());
        return redirect()->route('repairs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $repair = Repair::findOrFail($id);
        $repair->delete();
        return redirect()->route('repairs.index');
    }

    public function audits(Repair $repair)
    {
        $audits = $repair->audits()->with('user')->latest()->get();
        return view('audits', compact('repair', 'audits'));
    }
}
