<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create($request->validated());

            return redirect()->route('users.index')->with('success', 'Usuario creada exitosamente.');
        } catch (Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()->with('error', 'El Usuario ya existe.');
            }

            return redirect()->back()->with('error', 'Hubo un error al crear el Usuario.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->validated());

            return redirect()->route('users.index')->with('success', 'Usuario actualizada exitosamente.');
        } catch (Exception $e) {
            if ($e instanceof \Illuminate\Database\QueryException) {
                return redirect()->back()->with('error', 'El Usuario ya existe.');
            }

            return redirect()->back()->with('error', 'Hubo un error al actualizar el Usuario.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = "";
        $user = User::find($id);
        if ($user->status == 1) {
            User::where('id', $user->id)
                ->update([
                    'status' => 0
                ]);
            $message = 'Usuario Desactivada';
        } else {
            User::where('id', $user->id)
                ->update([
                    'status' => 1
                ]);
            $message = 'Usuario Activada';
        }

        return redirect()->route('users.index')->with('success', $message);
    }
}
