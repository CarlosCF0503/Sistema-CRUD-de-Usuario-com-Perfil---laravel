<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::post('/user/cadastro', function (Request $request) {
    $data = $request->all();

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'id_profile' => $data['id_profile']
    ]);

    return [
        'status' => 200,
        'message' => 'Cadastro realizado com sucesso!',
        'user' => $user
    ];
});

Route::get('/user', function () {
    $users = User::with('profile')->get();

    return [
        'status' => 200,
        'message' => 'Usuários encontrados com sucesso!',
        'users' => $users
    ];
});

Route::put('/user/{id}', function (Request $request, $id) {
    $data = $request->all();

    $user = User::find($id);

    if(!$user){
        return [
            'status' => 404,
            'message' => 'Usuários não encontrado!',
        ];
    }

    $user->update($data);

    return [
        'status' => 200,
        'message' => 'Usuários atualizado com sucesso!',
        'user' => $user
    ];

});

Route::delete('/user/{id}', function ($id) {
    $user = User::find($id);

    if(!$user){
        return [
            'status' => 404,
            'message' => 'Usuários não encontrado!',
        ];
    }

    User::destroy($id);

    return [
        'status' => 200,
        'message' => 'Usuário deletado com sucesso!',
    ];
});
