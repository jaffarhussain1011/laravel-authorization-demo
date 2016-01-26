<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('index', new \App\Models\Role);
        return view('roles.index', ['roles' => \App\Models\Role::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('create', new \App\Models\Role);
        $list = \App\Models\Permission::lists('title', 'id');
        return view('roles.create', ['pList' => $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StoreRolePostRequest $request) {
        $this->authorize('create', new \App\Models\Role);
        $role = \App\Models\Role::create($request->only(['title', 'slug']))->permissions()->sync($request->get('permissions'));
        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $role = \App\Models\Role::findOrFail($id);
        $this->authorize('update', $role);
        $list = \App\Models\Permission::lists('title', 'id');
//        dd($role->permissions()->lists('id'));
        return view('roles.edit', ['pList' => $list, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdateRolePostRequest $request, $id) {
        $role = \App\Models\Role::findOrFail($id);
        $this->authorize('update', $role);
        $role->fill($request->only(['title', 'slug']));
        $role->save();
        $role->permissions()->sync($request->get('permissions'));
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $role = \App\Models\Role::findOrFail($id);
        $this->authorize('destroy', $role);
        $role->delete();
        return redirect(route('role.index'));
    }

}
