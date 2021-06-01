<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    //funções principais
    public function index()
    {
        $pessoas = Pessoa::All();
        $html = "";
        foreach ($pessoas as $pessoa) {
            $html .= "<tr>";
            $html .= "<td>$pessoa->nome</td>";
            $html .= "<td>$pessoa->email</td>";
            $html .= "<td>$pessoa->telefone</td>";
            $html .= "<td>$pessoa->cidade</td>";
            $html .= "<td>$pessoa->estado</td>";
            $html .= "<td>$pessoa->categoria</td>";
            $html .= "<td class='d-inline-flex'><a href='/pessoa/edit/$pessoa->id' class='btn-sm mr-1 btn-primary'>Editar</a>
                    <a href='/pessoa/delete/$pessoa->id' class='btn-sm excluir btn-danger'>Excluir</a></td>";
            $html .= "</tr>";
        }
        return view('pessoa.listagem', compact('html'));
    }

    public function indexAdd()
    {
        $estados = $this->getEstados();
        $categorias = $this->getCategoria();
        return view('pessoa.adicionar', compact('estados', 'categorias'));
    }

    public function postAdd(Request $request)
    {
        $validation = $this->validation($request);
        if ($validation->fails()) {
            return $validation->validate();
        }

        Pessoa::create([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'telefone' => $request['telefone'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'categoria' => $request['categoria'],
        ]);

        Session::put('message', 'Contato cadastrado com sucesso!');
        return redirect('/pessoa/listar');
    }

    public function indexEdit($id_pessoa)
    {
        $pessoa = Pessoa::find($id_pessoa);
        $estados = $this->getEstados($pessoa->estado);
        $categorias = $this->getCategoria($pessoa->categoria);

        return view('pessoa.editar', compact('pessoa', 'estados', 'categorias'));
    }

    public function indexPost(Request $request, $id)
    {
        $validation = $this->validation($request);
        if ($validation->fails()) {
            return $validation->validate();
        }

        Pessoa::find($id)->update([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'telefone' => $request['telefone'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'categoria' => $request['categoria'],
        ]);

        Session::put('message', 'Contato atualizado com sucesso!');
        return redirect('/pessoa/listar');
    }

    public function delete($id_pessoa)
    {
        Pessoa::find($id_pessoa)->delete();
        Session::put('message', 'Contato excluido com sucesso!');

        return redirect('/pessoa/listar');
    }

    //funções auxiliares

    private function validation($request)
    {
        return Validator::make($request->all(), [
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'categoria' => 'required|string',
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'O nome precisa ser um texto',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'E-mail inválido!',
            'telefone.required' => 'O campo telefone é obrigatório!',
            'cidade.required' => 'O campo cidade é obrigatório',
            'cidade.string' => 'A cidade precisa ser um texto',
            'estado.required' => 'O campo estado é obrigatório',
            'estado.string' => 'O estado precisa ser um texto',
            'categoria.required' => 'O campo categoria é obrigatório',
            'categoria.string' => 'A categoria precisa ser um texto',

        ]);
    }

    private function getEstados($estado = '')
    {
        $options = "<option value=''>Selecione o estado</option>
        <option value='PB'>Paraíba</option>
        <option value='PE'>Pernambuco</option>
        <option value='RN'>Rio Grande Do Norte</option>
        <option value='BA'>Bahia</option>
        <option value='CE'>Ceará</option>";

        if ($estado) {

            $PB = $estado == 'PB' ? 'selected' : '';
            $PE = $estado == 'PE' ? 'selected' : '';
            $BA = $estado == 'BA' ? 'selected' : '';
            $CE = $estado == 'CE' ? 'selected' : '';
            $RN = $estado == 'RN' ? 'selected' : '';

            $options = "<option value=''>Selecione o estado</option>
            <option value='PB' $PB>Paraíba</option>
            <option value='PE' $PE>Pernambuco</option>
            <option value='RN' $RN>Rio Grande Do Norte</option>
            <option value='BA' $BA>Bahia</option>
            <option value='CE' $CE>Ceará</option>";
        }

        return $options;
    }

    private function getCategoria($categoria = '')
    {
        $options = '<option value="">Selecione a categoria</option>
        <option value="Cliente">Cliente</option>
        <option value="Fornecedor">Fornecedor</option>
        <option value="Funcionário">Funcionário</option>';

        if ($categoria) {
            $cliente = $categoria == 'Cliente' ? 'selected' : '';
            $fornecedor = $categoria == 'Fornecedor' ? 'selected' : '';
            $funcionario = $categoria == 'Funcionário' ? 'selected' : '';

            $options = "<option value=''>Selecione a categoria</option>
            <option value='Cliente' $cliente>Cliente</option>
            <option value='Fornecedor' $fornecedor>Fornecedor</option>
            <option value='Funcionário' $funcionario>Funcionário</option>";
        }

        return $options;
    }
}
