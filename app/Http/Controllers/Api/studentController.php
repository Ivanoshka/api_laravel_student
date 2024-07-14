<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //METODOS QUE SE VAN A EJECUTAR CUANDO SE VISITEN LA URL


    //metodo que muestra todos los studiantes
    public function index(){
        $students = Student::all();

        //si estudiantes se encuentra vacio, muestra el siguiente mensaje
        if ($students->isEmpty()) {
            $data = [
                'message' => 'No se encontraron estudiantes',
                'status' => 200
            ];
            return response()->json($data,200);

        }
        //sino retorna todos los estudiantes
        return response()->json($students,200);
    }
}
