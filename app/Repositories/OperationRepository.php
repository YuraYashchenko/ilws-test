<?php

namespace App\Repositories;

use App\Operation;
use GuzzleHttp\Client;

class OperationRepository
{
	public function transform($operations)
	{
		$all = $operations->get()->toArray();
        $operationsClone = clone $operations;

        return collect([
            'all' => $all,
            'loss' => $operations->where('type', 'loss')->sum('amount'),
            'income' => $operationsClone->where('type', 'income')->sum('amount'),
        ]);
	}

    public function getUsd()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
        $courses = json_decode($res->getBody());
        return $usd = $courses[2]->sale;
    }
}