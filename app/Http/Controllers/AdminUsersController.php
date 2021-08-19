<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUsersController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(){
        Paginator::useBootstrap();
        $users = $this->user->latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }

    public function store(Request $request){
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('messenger:'.$exception->getMessage().'---line'.$exception->getLine());
            return redirect()->route('users.create');
        }
    }
    public function edit($id){
        $roles = $this->role->all();
        $users = $this->user->find($id);
        $rolesOfUser = $users->roles;
        return view('admin.user.edit',compact('roles','users','rolesOfUser'));
    }
    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $roleIds = $request->role_id;
            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error('messenger:'.$exception->getMessage().'---line'.$exception->getLine());
            return redirect()->route('users.create');
        }
    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->user);
    }
}
