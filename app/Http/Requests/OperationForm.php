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
            'amount' => 'required|numeric'
        ];
    }

    public function createOperation()
    {
        Operation::create([
                'title' => $this->title,
                'type' => $this->type,
                'amount' => $this->amount
            ]);
    }

    public function updateOperation(Operation $operation)
    {
        $operation->update($this->all());
    }
}
