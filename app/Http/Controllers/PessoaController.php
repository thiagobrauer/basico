<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use Validator;
use Session;


class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Pessoa::create($request->all());
        // return "teste de roteamento, store";
        $validator = Validator::make($request->all(),
        [
            'nome' => 'required',
            'email' => 'required|email',
            'cpf' => 'required|regex:/^([0-9]){3}\.([0-9]){3}\.([0-9]){3}-([0-9]){2}$/',
            'password' => 'required|regex:/^(.){8}$/',
        ],
        [
            'nome.required' => 'Informe o seu nome animal!',
            'email.required' => 'Informe o seu email animal!',
            'email.email' => 'Já viu email sem "@" seu animal?',
            'cpf.required' => 'Preencha o seu cpf animal',
            'cpf.regex' => 'Preencha o seu cpf corretamente animal',
            'password.required' => 'Preencha a sua senha animal',
            'password.regex' => 'Preencha uma senha de 8 dígitos animal',
        ]        
        );

        if($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();;
        }

        $campos = $request->all();
        $pessoa = Pessoa::create($campos);
        $ret = $pessoa->save();

        if($ret)
            Session::flash('success',$pessoa->nome."cadastrado(a) com sucesso");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }

    public function validaCPF($cpf = null) {
 
        // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cpf = ereg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
        } else {   
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
    
            return true;
        }
    }
}
