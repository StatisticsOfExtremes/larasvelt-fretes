<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carreteiro;

use App\Models\Veiculo;

use Inertia\Inertia;

class CarreteiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreteiros = Carreteiro::with('veiculos:placa')->get();

        return Inertia::render('Carreteiros',[
            'carreteiros' => $carreteiros
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $carreteiro = Carreteiro::create([
            'nome' => $request->motorista['nome'],
            'cpf' => $request->motorista['identificacao'],
            'telefone' => $request->motorista['telefone']
        ]);


        $truck = Veiculo::create([
            'placa' => $request->veiculo['placa'],
            'antt' => $request->veiculo['antt'],
            'nome_dono' => $request->veiculo['dono']['nome'],
            'identificacao_dono' => $request->veiculo['dono']['identificacao'],
        ]);

        if ($request->carreta['placa'] !== null) {
            $carreta = Veiculo::create([
                'placa' => $request->carreta['placa'],
                'antt' => $request->carreta['antt'],
                'nome_dono' => $request->carreta->dono['nome'],
                'identificacao_dono' => $request->dono['identificacao']
            ]);
        }

        $carreteiro->veiculos()->attach($truck->id, ['ativo' => 1]);




        return to_route('carreteiros.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carreteiro = Carreteiro::find($id);

        $carreteiro->delete();

        return to_route('carreteiros.index');
    }

    public function create() {
        return Inertia::render('Components/CriarCarreteiro');
    }
}
