<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class Formulario extends Controller
{
        public function mostrarFormulario() // Método para mostrar el formulario
        {
            return view('formulario');
        }
    
        public function procesarFormulario(Request $request)  // Método para procesar el formulario y almacenar los datos en un archivo CSV
        {

        

            $request->validate([    // Validación de los campos del formulario
                'message' => ['required', 'min:2', 'max:300'],
                'image_url' => 'nullable|url' 
            ]);

            Message::create([
                'text'=>$request->input('message'),
                'image_url' => $request->input('image_url') 
            ]);
            return view ('messages')-> with ('success', 'Mensaje enviado correctamente');
        }

        public function listarMensaje() 
        {
            $messages = Message::all();
            return view('messages', compact('messages'));
        }
        
        // Este método recibe el ID del mensaje a eliminar, añadido en el punto 6
        public function eliminarMessage($id)
{
    $message = Message::find($id); // Buscar el mensaje por ID y eliminarlo si existe

    if ($message) {
        $message->delete();
        return redirect()->back()->with('success', 'Mensaje eliminado correctamente');
    } else {
        return redirect()->back()->withErrors(['error' => 'El mensaje no existe.']);
    }
}

public function store(Request $request)
{

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        Storage::put($filename, file_get_contents($file->getRealPath()));

        // Guardar la URL de la imagen en el campo image_url
        $message->image_url = Storage::url($filename);
    }

}

}