<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //validator de entradas de cliente
 


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

    //metodo que almacena un nuevo estudiante
    public function store(Request $request){
        //validar los datos que se envian
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required'

        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data,400);
        }
        //si no hay errores, se crea el estudiante
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]); 
        //Si no pudiste crear el estudiante, retorna este error
        if (!$student) {
            $data = [
                'message' => 'Error al crear el estudiante',
                'status' => 500
            ];
            return response()->json($data,500);
        }

        //sino retorna el studiante
        $data = [
            'student' => $student,
            'status' => 500
        ];

        return response()->json($data,201);



    }

    //metodo que muestra un estudiante por su id
    public function show($id){
        $student = Student::find($id);
        //si no se encuentra el estudiante, muestra un error
        if (!$student) {
            $data = [
                "message" => 'Estudiante no encontrado',
                "status" => 404
            ];
            return response()->json($data,404);
        }

        //sino, muestra el estudiante
        $data = [
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data,200);


    }

    //metodo para eliminar un estudiante
    public function destroy($id){
        $student = Student::find($id);

        if (!$student) {
            $data = [
                "message" => 'Estudiante no encontrado',
                "status" => 404
            ];

            return response()->json($data,404);
        }
        $student->delete();

        $data = [
            "message" => "Estudiante Eliminado",
            "status" => 200
        ];

        return response()->json($data,200);

    }

    //modificar estudiante
    public function update(Request $request, $id){
        $student = Student::find($id);
        if (!$student) {
            $data = [
                "message" => 'Estudiante no encontrado',
                "status" => 404
            ];
            return response()->json($data,404);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:student',
            'phone' => 'required|digits:10',
            'language' => 'required'

        ]);

        if ($validator->fails()) {
            $data = [
                "message" => 'Error en la validacion de datos',
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data,400);
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->language = $request->language;

        $student->save();

        $data = [
            "message" => "Estudiante Modificado",
            "student" => $student,
            "status" => 200
        ];

        return response()->json($data,200);


    }


     //modificar parcialmente a estudiante
     public function updatePartial(Request $request, $id){
        $student = Student::find($id);
        if (!$student) {
            $data = [
                "message" => 'Estudiante no encontrado',
                "status" => 404
            ];
            return response()->json($data,404);
        }
    
        $validator = Validator::make($request->all(),[
            'name' => 'Max:255',
            'email' => 'email|unique:student',
            'phone' => 'digits:10',
        ]);

        if ($validator->fails()) {
            $data = [
                "message" => 'Error en la validacion de datos',
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data,400);
        }

        if ($request->has('name')) {
            $student->name = $request->name;
        }

        if ($request->has('email')) {
            $student->email = $request->email;
        }

        if ($request->has('phone')) {
            $student->phone = $request->phone;
        }

        if ($request->has('language')) {
            $student->language = $request->language;
        }

        $student->save();

        $data = [
            "message" => 'Estudiante actualizado',
            "student" => $student,
            "status" => 200
        ];

        return response()->json($data,200);



       }
        

    }
