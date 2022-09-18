<?php

namespace Tool\General\Domain\Models\Register;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRegisterForCustomer extends Mailable
{
    use Queueable, SerializesModels;

    private array $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function data(): array
    {
        return $this->data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from($this->data['email'], config('myapp.site_name'))// 送信元
            ->subject('ユーザー登録を受け付けました｜'. config('myapp.site_name'))// メールタイトル
            ->text('general::auth.register.send.mail_customer_template')// どのテンプレートを呼び出すか
            ->with(['data' => $this->data]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }
}
