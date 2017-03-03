<?php

namespace App\Http\Controllers;

use App\Operation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\OperationRepository;

class FilterController extends Controller
{
	protected $repository;

	public function __construct(OperationRepository $repository)
	{
		$this->repository = $repository;
	}

    public function filterByPeriod(Request $request)
    {
    	$from = Carbon::parse($request->from);
    	$to = Carbon::parse($request->to);

    	$operations = $this->repository->transform(
				Operation::where('date', '>=', $from)->where('date', '<=', $to)->orderBy('date', 'desc')
    		);

    	$operations['dates'] = [
    		'from' => $request->from,
    		'to' => $request->to
    	];

    	return view('operations.index', compact('operations'));
    }
}
