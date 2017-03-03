<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\Request;
use App\Http\Requests\OperationForm;
use App\Repositories\OperationRepository;

class OperationsController extends Controller
{
    protected $repository;

    public function __construct(OperationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operations = $this->repository->transform(
                Operation::latest('date')
            ); 
        
        return view('operations.index', compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationForm $form)
    {
        $usd = $this->repository->getUsd(); 

        $form->createOperation($usd);

        return redirect()->route('operations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        return view('operations.edit', compact('operation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperationForm $form, Operation $operation)
    {
        $usd = $this->repository->getUsd(); 

        $form->updateOperation($operation, $usd);

        return redirect()->route('operations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();
    }
}
