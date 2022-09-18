<?php

namespace Tool\General\Domain\Models\Delivery\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
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
          ->text($this->getTemplate()) // どのテンプレートを呼び出すか
          ->with(['data' => $this->data]); // withオプションでセットしたデータをテンプレートへ受け渡す
    }

    /**
     * 件名
     * @return string
     */
    public function getSubject(): string
    {
        return 'Webからお問い合わせを受付致しました' . config('myapp.site_name');
    }

    /**
     * 管理者アドレス
     * @return string
     */
    public function getAdminEmail(): string
    {
        return config('myapp.mail_admin');
    }

    /**
     * 管理者名
     * @return string
     */
    public function getAdminName(): string
    {
        return 'Mud Flood Database';
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
        return 'Mud Flood Database';
    }

    /**
     * テンプレート
     * @return string
     */
    public function getTemplate(): string
    {
        return 'general::contact.mail_admin';
    }
}
