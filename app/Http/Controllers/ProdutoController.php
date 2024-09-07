<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\produto;

class ProdutoController extends Controller
{
    public function index(){
        $registroProduto = tbProdutos::All(); // $QUERY = "Select * From tbProduto;"
        $contador = $registroProduto ->count();

        return 'Produtos: '.$contador.$registroProduto.Response()->json([],Response::HTTP_NO_CONTENT);
    }


   
    //mostrar um tipo de registro especifico
    //crud -> Read (leitura)Select/ Visualisar

    public function show(string $id) //Função com parametro id
    {
        $registroProduto = tbProdutos::find($id); 

        if($registroProduto)//retorna o Produto localizado
        {
            return'Produtos Localizados: '.$registroProduto.Response()->json([],Response::HTTP_NO_CONTENT);
        }else //Não retorna
        {
            return 'Produtos não Localizados: '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
        


    }


    //Cadastrar Registos
    //crud -> Create(criar/Cadastrar)
    public function store(Request $request){
        
      
        $registroProduto = $request->All();

        $registroVerifica = Validator::make($registroProduto,[

            'codigo'=> 'required',
            'tipoProduto'=> 'required',
            'valorProduto'=> 'required',
            'codigoClientefk'=> 'required'
            
        ]);
          

            if($registroVerifica->fails())
            {
                return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);
             
            }

            $registroProdutoCad = tbProdutos::create($registroProduto);

            if($registroProdutoCad)//retorna o Produto localizado
            {
                return'Produtos Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }else //Não retorna
            {
                return 'Produtos não Cadastrados: '.Response()->json([],Response::HTTP_NO_CONTENT);
            }
        

    }


     //Alterar registros
    //crud -> update(Alterar)
    public function update(Request $request, string $id){

        $registroProduto = $request->All();

        $registroVerifica = Validator::make($registroProduto,[
            'codigo'=> 'required',
            'tipoProduto'=> 'required',
            'valorProduto'=> 'required',
            'codigoClientefk'=> 'required'
 
         ]);

         if ($registroVerifica->fails()) {
            return 'Registros não atualizados'.Response()->json([],Response::HTTP_NO_CONTENT);
         }


         $registroBanco = tbProdutos::Find($id);
         $registroBanco->codigo = $registroProduto['codigo'];
         $registroBanco->tipoProduto  = $registroProduto['tipoProduto'];
         $registroBanco->valorProduto =$registroProduto['valorProduto'];
         $registroBanco->codigoClientefk =$registroProduto['codigoClientefk'];

         $registroBanco->save();

         if($retorno){
            return "Produto atualizado com suscesso.".Response()->json([],Response::HTTP_NO_CONTENT);
         }else{
            return "Atenção...Erro: Produto não atualizado".Response()->json([],Response::HTTP_NO_CONTENT);
         }
        

    }



      //Deletar registros
    //crud -> deletar(
    public function destroy(string $id){

        $registroProduto = tbProdutos::find($id) ;

        if($registroProduto->delete()){
            
            return "O Produto foi deletado com sucesso";

        }

        return "Algo deu errado: Produto não deletado".response()->json([],Response::HTTP_NO_CONTENT);

    }
}
