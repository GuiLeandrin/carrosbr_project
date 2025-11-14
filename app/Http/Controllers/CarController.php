<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;

class CarController extends Controller
{
    public function getCars()
    {
        return Car::select(
            'id',
            'photo1_url',
            'photo2_url',
            'photo3_url',
            'brand',
            'model',
            'color',
            'year',
            'mileage',
            'price',
            'details'
        )->get();
    }

    public function list()
    {
        $cars = $this->getCars();
        return view('adm.config-car', compact('cars'));
    }

    public function showCards()
    {
        $cars = $this->getCars();
        return view('home.products', compact('cars'));
    }

    public function showDetails($id)
    {
        $cars = Car::find($id);

        if (!$cars) {
            return redirect()->back()->with('error', 'Carro não encontrado.');
        }

        return view('home.details', compact('cars'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'photo1_url' => 'required|url|max:255',
                'photo2_url' => 'required|url|max:255',
                'photo3_url' => 'required|url|max:255',
                'brand' => 'required|min:2|max:100',
                'model' => 'required|min:2|max:100',
                'color' => 'required|string|min:3|max:30',
                'year' => 'required|integer',
                'mileage' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'details' => 'nullable|string|max:500',
            ],
            [
                'photo1_url.required' => 'O campo Foto 1 é obrigatório.',
                'photo1_url.url' => 'A URL da Foto 1 deve ser válida.',
                'photo1_url.max' => 'A URL da Foto 1 não pode ultrapassar 255 caracteres.',

                'photo2_url.required' => 'O campo Foto 2 é obrigatório.',
                'photo2_url.url' => 'A URL da Foto 2 deve ser válida.',
                'photo2_url.max' => 'A URL da Foto 2 não pode ultrapassar 255 caracteres.',

                'photo3_url.required' => 'O campo Foto 3 é obrigatório.',
                'photo3_url.url' => 'A URL da Foto 3 deve ser válida.',
                'photo3_url.max' => 'A URL da Foto 3 não pode ultrapassar 255 caracteres.',

                'brand.required' => 'O campo Marca é obrigatório.',
                'brand.min' => 'O campo Marca deve ter pelo menos 2 caracteres.',
                'brand.max' => 'O campo Marca pode ter no máximo 100 caracteres.',

                'model.required' => 'O campo Modelo é obrigatório.',
                'model.min' => 'O campo Modelo deve ter pelo menos 2 caracteres.',
                'model.max' => 'O campo Modelo pode ter no máximo 100 caracteres.',

                'color.required' => 'O campo Cor é obrigatório.',
                'color.string' => 'O campo Cor deve conter apenas texto.',
                'color.min' => 'O campo Cor deve ter pelo menos 3 caracteres.',
                'color.max' => 'O campo Cor pode ter no máximo 30 caracteres.',

                'year.required' => 'O campo Ano é obrigatório.',
                'year.integer' => 'O campo Ano deve ser um número inteiro.',

                'mileage.required' => 'O campo Quilometragem é obrigatório.',
                'mileage.integer' => 'A Quilometragem deve ser um número inteiro.',
                'mileage.min' => 'A Quilometragem não pode ser negativa.',

                'price.required' => 'O campo Preço é obrigatório.',
                'price.numeric' => 'O campo Preço deve ser um número.',
                'price.min' => 'O campo Preço deve ser maior ou igual a zero.',

                'details.string' => 'O campo Detalhes deve conter apenas texto.',
                'details.max' => 'O campo Detalhes pode ter no máximo 500 caracteres.',
            ]
        );

        Car::create([
            'photo1_url' => $request->photo1_url,
            'photo2_url' => $request->photo2_url,
            'photo3_url' => $request->photo3_url,
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return redirect()->route('painel.config.car')
            ->with('success', 'Carro cadastrado com sucesso!');
    }

    public function destroyCar($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->back()->with('error', 'Erro ao excluir carro: carro não encontrado.');
        }

        $car->delete();

        return redirect()->back()->with('success', 'Carro excluído com sucesso!');
    }

    public function edit($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->back()->with('error', 'Carro não encontrado.');
        }

        return view('adm.edit-car', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->back()->with('error', 'Erro ao atualizar: carro não encontrado.');
        }

        $validated = $request->validate(
            [
                'photo1_url' => 'required|url|max:255',
                'photo2_url' => 'required|url|max:255',
                'photo3_url' => 'required|url|max:255',
                'brand' => 'required|min:2|max:100',
                'model' => 'required|min:2|max:100',
                'color' => 'required|string|min:3|max:30',
                'year' => 'required|integer',
                'mileage' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'details' => 'nullable|string|max:500',
            ],
            [
                'photo1_url.required' => 'O campo Foto 1 é obrigatório.',
                'photo1_url.url' => 'A URL da Foto 1 deve ser válida.',
                'photo1_url.max' => 'A URL da Foto 1 não pode ultrapassar 255 caracteres.',

                'photo2_url.required' => 'O campo Foto 2 é obrigatório.',
                'photo2_url.url' => 'A URL da Foto 2 deve ser válida.',
                'photo2_url.max' => 'A URL da Foto 2 não pode ultrapassar 255 caracteres.',

                'photo3_url.required' => 'O campo Foto 3 é obrigatório.',
                'photo3_url.url' => 'A URL da Foto 3 deve ser válida.',
                'photo3_url.max' => 'A URL da Foto 3 não pode ultrapassar 255 caracteres.',

                'brand.required' => 'O campo Marca é obrigatório.',
                'brand.min' => 'O campo Marca deve ter pelo menos 2 caracteres.',
                'brand.max' => 'O campo Marca pode ter no máximo 100 caracteres.',

                'model.required' => 'O campo Modelo é obrigatório.',
                'model.min' => 'O campo Modelo deve ter pelo menos 2 caracteres.',
                'model.max' => 'O campo Modelo pode ter no máximo 100 caracteres.',

                'color.required' => 'O campo Cor é obrigatório.',
                'color.string' => 'O campo Cor deve conter apenas texto.',
                'color.min' => 'O campo Cor deve ter pelo menos 3 caracteres.',
                'color.max' => 'O campo Cor pode ter no máximo 30 caracteres.',

                'year.required' => 'O campo Ano é obrigatório.',
                'year.integer' => 'O campo Ano deve ser um número inteiro.',

                'mileage.required' => 'O campo Quilometragem é obrigatório.',
                'mileage.integer' => 'A Quilometragem deve ser um número inteiro.',
                'mileage.min' => 'A Quilometragem não pode ser negativa.',

                'price.required' => 'O campo Preço é obrigatório.',
                'price.numeric' => 'O campo Preço deve ser um número.',
                'price.min' => 'O campo Preço deve ser maior ou igual a zero.',

                'details.string' => 'O campo Detalhes deve conter apenas texto.',
                'details.max' => 'O campo Detalhes pode ter no máximo 500 caracteres.',
            ]
        );

        $car->update([
            'photo1_url' => $request->photo1_url,
            'photo2_url' => $request->photo2_url,
            'photo3_url' => $request->photo3_url,
            'brand' => $request->brand,
            'model' => $request->model,
            'color' => $request->color,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return redirect()->route('painel.config.car')->with('success', 'Carro atualizado com sucesso!');
    }

}

