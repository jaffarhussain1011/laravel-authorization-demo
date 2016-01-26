<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('index', new \App\Models\Permission);
        return view('permissions.index', ['permissions' => \App\Models\Permission::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('create', new \App\Models\Permission);
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\StorePermissionPostRequest $request) {
        $this->authorize('create', new \App\Models\Permission);
        $permission = \App\Models\Permission::create($request->only(['title', 'slug']));
        return redirect(route('permission.index'));
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
        $permission = \App\Models\Permission::findOrFail($id);
        $this->authorize('update', $permission);
        return view('permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\UpdatePermissionPostRequest $request, $id) {
        $permission = \App\Models\Permission::findOrFail($id);
        $this->authorize('update', $permission);
        $permission->fill($request->only(['title', 'slug']));
        $permission->save();
        return redirect(route('permission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $permission = \App\Models\Permission::findOrFail($id);
        $this->authorize('destroy', $permission);
        $permission->delete();
        return redirect(route('permission.index'));
    }

}
