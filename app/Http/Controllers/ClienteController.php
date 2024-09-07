<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\cliente;

class ClienteController extends Controller
{
    public function index(){
        $registroCliente = cliente::All(); // $QUERY = "Select * From tblivro;"
        $contador = $registroCliente ->count();

        return 'Clientes: '.$contador.$registroCliente.Response()->json([],Response::HTTP_NO_CONTENT);
    }


   
    //mostrar um tipo de registro especifico
    //crud -> Read (leitura)Select/ Visualisar

    public function show(string $id) //Função com parametro id
    {
        $registroCliente = cliente::find($id); 

        if($registroCliente)//retorna o livro localizado
        {
            return'Clientes Localizados: '.$registroCliente.Response()->json([],Response::HTTP_NO_CONTENT);
        }else //Não retorna
        {
            return 'Clientes não Localizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        


    }


    //Cadastrar Registos
    //crud -> Create(criar/Cadastrar)
    public function store(Request $request){
        
      
        $registroCliente = $request->All();

        $registroVerifica = Validator::make($registroCliente,[
                    'nomeCliente' =>'required' ,
                    'nascCliente' =>'required',
                    'TelefoneCliente' => 'required'
        ]);
          

            if($registroVerifica->fails())
            {
                return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
             
            }

            $registroClienteCad = cliente::create($registroCliente);

            if($registroClienteCad)//retorna o livro localizado
            {
                return'Clientes Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }else //Não retorna
            {
                return 'Clientes não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }
        

    }


     //Alterar registros
    //crud -> update(Alterar)
    public function update(Request $request, string $id){

        $registroCliente = $request->All();

        $registroVerifica = Validator::make($registroCliente,[
                 'nomeCliente' =>'required' ,
                    'nascCliente' =>'required',
                    'TelefoneCliente' => 'required'
 
         ]);

         if ($registroVerifica->fails()) {
            return 'Registros não atualizados'.Response()->json([],Response::HTTP_NO_CONTENT);
         }


         $registroBanco = cliente::Find($id);
         $registroBanco->nomeCliente = $registroCliente['nomeCliente'];
         $registroBanco->nascCliente = $registroCliente['nascCliente'];
         $registroBanco->TelefoneCliente =$registroCliente['TelefoneCliente'];

        $retorno = $registroBanco->save();

         if($retorno){
            return "Livro atualizado com suscesso.".Response()->json([],Response::HTTP_NO_CONTENT);
         }else{
            return "Atenção...Erro: Livro não atualizado".Response()->json([],Response::HTTP_NO_CONTENT);
         }
        

    }



      //Deletar registros
    //crud -> deletar(
    public function destroy(string $id){

        $registroCliente = cliente::find($id) ;

        if($registroCliente->delete()){
            
            return "O livro foi deletado com sucesso";

        }

        return "Algo deu errado: Livro não deletado".response()->json([],Response::HTTP_NO_CONTENT);

    }
}
