<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Adldap\Laravel\Facades\Adldap;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::denies('manage-users')) {
                $request->session()->flash('status', 'danger');
                $request->session()->flash('message', 'Você não tem permissão para fazer isso.');
                return redirect()->route('index');
            }

            return $next($request);
        });
    }

    /**
     * Mostra a lista de Usuários.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '<>', 1)->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Mostra o fomulário para adicionar um novo Usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function novo()
    {
        $user = new User();
        return view('users.create')->with('user', $user);
    }

    /**
     * Salva um Usuário novo.
     *
     * @param  \App\Http\Requests\StoreUser  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request, User $user)
    {
        if (User::where('username', $request->username)->first()) {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Usuário já adicionado.');

            return redirect()->route('users.index');
        }

        try {
            $ldap_user = Adldap::search()->users()->findByOrFail('uid', $request->username);
        } catch (\Adldap\Models\ModelNotFoundException $e) {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao buscar pelo usuário: ' . $e->getMessage());

            return redirect()->route('users.index');
        }

        if ($ldap_user->exists) {
            $user = new User();
            $user->username = $ldap_user->uid[0];
            $user->name = $ldap_user->cn[0];
            $user->password = bcrypt(str_random(16));
            $user->role = $request->role;

            if ($user->save()) {
                $request->session()->flash('status', 'success');
                $request->session()->flash('message', 'Usuário adicionado com sucesso!');
            } else {
                $request->session()->flash('status', 'danger');
                $request->session()->flash('message', 'Ocorreu um erro ao adicionar o usuário.');
            }
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Usuário não pode ser adicionado.');
        }

        return redirect()->route('users.index');
    }

    /**
     * Remove PERMANENTEMENTE o Usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            $request->session()->flash('status', 'success');
            $request->session()->flash('message', 'Usuário removido com sucesso!');
        } else {
            $request->session()->flash('status', 'danger');
            $request->session()->flash('message', 'Ocorreu um erro ao remover o usuário.');
        }

        return redirect()->route('users.index');
    }
}
