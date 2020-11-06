<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->method()=='PUT')
        {
            $NamaProduk='required|unique:data_produks,NamaProduk, '. $this->get('id');

        }
        else{
            $NamaProduk='required|unique:data_produks,NamaProduk';
        }
        return [
            'NamaProduk'=>$NamaProduk,
            'StokProduk'=>'required|numeric',
            'DeskripsiProduk'=>'required',
            'HargaProduk'=> 'required|numeric',
        ];
    }
}
