<?php

namespace Tool\General\Application\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
            'contact.name' => 'required|string|max:255',
            'contact.kana' => 'present|string',
            'contact.email' => 'required|email|string',
            'contact.tel' => 'present|string',
            'contact.reply' => 'required|string',
            'contact.msg' => 'required|string',
            'contact.privacy' => 'required|numeric|between:0,1',
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
            'contact.name.required' => ':attributeは必須です',
            'contact.kana.present' => ':attributeは必須です',
            'contact.email.required' => ':attributeは必須です',
            'contact.email.email' => ':attributeの型が正しくありません',
            'contact.tel.present' => ':attributeは必須です',
            'contact.reply.required' => ':attributeは必須です',
            'contact.msg.required' => ':attributeは必須です',
            'contact.privacy.required' => ':attributeの同意は必須です',
            'g-recaptcha-response.required' => '処理ができませんでした',
            'g-recaptcha-response.recaptcha' => '処理ができませんでした.',
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
            'contact.name' => 'お名前',
            'contact.kana' => 'ふりがな',
            'contact.email' => 'メールアドレス',
            'contact.tel' => '電話番号',
            'contact.reply' => 'ご返答方法',
            'contact.msg' => 'お問い合わせ内容',
            'contact.privacy' => 'プライバシーポリシー',
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
                'recaptcha_score' => $response->getScore()
            ]);
        }
    }
}

