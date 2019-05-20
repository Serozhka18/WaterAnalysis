<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdatePutRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $user = auth()->user();
        $users = User::where('id', '<>', $user->id)->get();

        return view('users', ['users' => $users]);
    }

    /**
     * @param int $id
     * @return View
     */
    public function editForm(int $id): View
    {
        $user = User::with('roles')->find($id);
        $roles = Role::all();

        return view('user_edit', [
            'user'  => $user,
            'roles' => $roles
        ]);
    }

    /**
     * @param int $id
     * @param UserUpdatePutRequest $request
     * @return RedirectResponse
     */
    public function update(int $id, UserUpdatePutRequest $request): RedirectResponse
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->roles()->sync($request->roles);
        $user->save();

        return redirect()->back();
    }
}
