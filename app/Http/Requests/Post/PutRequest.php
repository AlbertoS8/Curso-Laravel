<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PutRequest extends FormRequest
{

    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator){
        $response = new Response($validator->errors(),422);
        throw new ValidationException($validator, $response); 
    }

    public function rules(): array
    {
        return [
            "title"         =>  "required|min:5|max:500",
            "slug"          =>  "required|min:5|max:500|unique:posts,slug,".$this->route('post')->id,
            "content"       =>  "required|min:7|max:500",
            "category_id"   =>  "required|integer",
            "description"   =>  "required|min:7",
            "posted"        =>  "required",
            "image"         =>  "mimes:jpeg,jpg,png|max:10240"

            // "title"      =>  "required",
            
        ];
    }
}
