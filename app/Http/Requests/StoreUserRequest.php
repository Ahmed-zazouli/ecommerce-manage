<?php

namespace App\Http\Requests;

use App\Exceptions\NotAuthorizedException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Auth\Access\AuthorizationException ;


class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->user_type_id == 4 ) {
            return true;
        }else{  
            return false;

        }
       
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function failedAuthorization() {
        $exception = new NotAuthorizedException('This action is unauthorized.', 403);
        
        
        throw $exception->redirectTo("/admin/unauthorize");
    }

    
}
