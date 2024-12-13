<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Formulario;
use App\Models\Message;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/messages', function () {
    $messages = \App\Models\Message::all();
    return view('messages', ['messages' => $messages]);
});


Route::get('/formulario', [Formulario::class, 'mostrarFormulario'])->name('formulario');   

Route::post('/formulario', [Formulario::class, 'procesarFormulario'])->name('messages.enviar');  

Route::get('/formulario/lista', [Formulario::class, 'listarMensaje'])->name('messages'); 


Route::delete('/messages/eliminar/{id}', [Formulario::class, 'eliminarMessage'])->name('message.eliminar'); 

