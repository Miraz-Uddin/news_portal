<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
    public function rules() {
        return [
            'blog_title' => 'required|unique:blogs|max:255',
            'blog_author' => 'required|max:255',
            'blog_description' => 'required',
            'publish_date' => 'required',
            'blog_status' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'blog_title.required' => 'Please Insert a Blog Title',
            'blog_title.unique:blogs' => 'This Blog already exists',
            'blog_title.max:255'  => 'Please keep it short',
            'blog_author.required' => 'Please Give Blog Author\'s name',
            'blog_author.max:255'  => 'Please keep it short',
            'blog_description.required' => 'Please Give Blog Details',
            'publish_date.required' => 'Please Give Blog Publishing Date',
            'blog_status.required' => 'You must select the current Status',
        ];
    }
}
