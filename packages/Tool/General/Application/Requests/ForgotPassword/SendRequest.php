<?php

namespace Tool\General\Application\Requests\ForgotPassword;

use Tool\Common\Application\Requests\CommonRequest;

class SendRequest extends CommonRequest
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
            'email' => 'required|email|exists:users,email',
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
            'email.required' => ':attributeは必ず入力して下さい',
            'email.exists' => ':attributeは存在しません',
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
            'email' => 'メールアドレス',
        ];
    }

    /**
     * @param null $keys
     * @return array
     */
    public function getEmail($keys = null): string
    {
        // 受け取り変数取得
        $values = parent::all($keys);

        // Userデータ設定
        $results['email'] = $values['email'];

        return $results['email'];
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
