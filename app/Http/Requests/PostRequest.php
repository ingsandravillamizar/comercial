<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules(): array
    {
        $post = $this->route()->parameter('post');
        $rules=[
            'name'=> 'required',
            'slug' => 'required|unique:posts',
            'status'=> 'required|in:1,2',
            'file'=> 'image'     // validar que solo sea archivos de tipo imagen
            
        ];

        if($post){
            //Esto es modificar el array de reglas para cuando sea edicion permita modificar el post y evalue el slug unico pero sin incluirlo
            $rules['slug'] = "required|unique:posts,slug, $post->id";
        }

        if($this->status == 2){
            $rules = array_merge($rules,  [    // ME HAce una union de los dos arrays
                'category_id'=> 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        } 

        return $rules;
    }
}
