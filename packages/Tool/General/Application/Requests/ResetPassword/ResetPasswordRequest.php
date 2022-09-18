<?php

namespace Tool\General\Application\Requests\ResetPassword;

use Tool\Common\Application\Requests\CommonRequest;

class ResetPasswordRequest extends CommonRequest
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
            'id' => 'required|numeric|min:1',
            'password' => 'required|string',
            'password_confirm' => 'required|string|same:password',
            'token' => 'required|string',
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => 'データが正しくありません',
            'password.required' => ':attributeは必ず入力して下さい',
            'password_confirm.required' => ':attributeは必ず入力して下さい',
            'password_confirm.same' => ':attributeが一致していません',
            'token.required' => ':attributeが正しくありません',
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'password' => 'パスワード',
            'password_confirm' => 'パスワード確認',
            'token' => 'トークン',
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation()
    {
        if (config('app.env') === 'production') {
            $response = no_captcha()->verify($this->{'g-recaptcha-response'});

            $this->merge([
                'recaptcha_success' => $response->isSuccess(),
                'recaptcha_score'   => $response->getScore()
            ]);
        }
    }
}
