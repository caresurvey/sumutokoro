<?php

namespace Tool\General\Domain\Models\Delivery\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
          ->from($this->getFromEmail(), $this->getFromName())// 送信元
          ->subject($this->getSubject())// メールタイトル
          ->text($this->getTemplate())// どのテンプレートを呼び出すか
          ->with(['data' => $this->data]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }

    /**
     * 件名
     * @return string
     */
    public function getSubject(): string
    {
        return 'Webからパスワードリセットを受付致しました | ' . config('myapp.site_name');
    }

    /**
     * 送信元アドレス
     * @return string
     */
    public function getFromEmail(): string
    {
        return config('myapp.mail_from');
    }

    /**
     * 送信元名
     * @return string
     */
    public function getFromName(): string
    {
        return config('myapp.site_name');
    }

    /**
     * テンプレート
     * @return string
     */
    public function getTemplate(): string
    {
        return 'general::auth.forget_password.mail_reset';
    }
}
