<?php

namespace App\Http\Requests;

use App\Operation;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OperationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'type' => [
                'amount' => Rule::in(['income', 'loss'])
            ],
            'date' => 'required|date',
            'amount' => 'required|numeric'
        ];
    }

    public function createOperation($usd)
    {
        Operation::create([
                'title' => $this->title,
                'type' => $this->type,
                'date' => $this->date,
                'amount' => $this->amount,
                'usd' => round($this->amount / $usd, 2),
            ]);
    }

    public function updateOperation(Operation $operation, $usd)
    {
        $operation->update([
                'title' => $this->title,
                'type' => $this->type,
                'date' => $this->date,
                'amount' => $this->amount,
                'usd' => round($this->amount / $usd, 2),
            ]);
    }
}
