<?php

namespace App\Controllers\Web;

use App\Models\UserModel;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->render('', 'home', ['name'=>'Dev']);
    }


    /**
     * Display the specified resource.
     *
     * @param array $data
     */
    public function show(array $data)
    {
        // $user = $this->model('UserModel');


        $this->render('', 'cadastro', ['data'=>
        [
            'error_password'=>false,
            'success_register'=>false,
            'empty_field'=>false,
            'email_exists'=>false
        ]
    ]);
        // $id = $data['id'];

        // $userLoad = $user->load($id);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->render('users', 'users.create', ['name'=>'Dev']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // store
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param array $data
     */
    public function edit(array $data)
    {
        $this->render('users', 'users.edit', ['name'=>'Dev']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        // update
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param array $data
     */
    public function destroy(array $data)
    {
        // destroy
    }
}