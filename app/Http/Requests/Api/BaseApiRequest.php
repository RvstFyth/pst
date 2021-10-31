<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;


class BaseApiRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->first();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'response' => [],
                'errors' => $errors,
            ],
                Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
