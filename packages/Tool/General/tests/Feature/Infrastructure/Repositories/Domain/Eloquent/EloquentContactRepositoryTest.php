<?php

namespace Tool\General\tests\Feature\Infrastructure\Repositories\Domain\Eloquent;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tool\General\Domain\Models\Contact\CheckMode;
use Tool\General\Domain\Models\Contact\ContactRepository;
use Tool\General\Domain\Models\Contact\MailContactForAdmin;
use Tool\General\Domain\Models\Contact\MailContactForCustomer;
use Tool\General\Domain\Models\Contact\SendContact;
use Tool\General\tests\TestCase;
use Tool\General\Infrastructure\Eloquents\EloquentContact;
use Tool\General\tests\RefreshDatabaseLite;

class EloquentContactRepositoryTest extends TestCase
{
    private array $auth;
    private EloquentContact $eloquent;
    private contactRepository $contactRepo;

    use RefreshDatabaseLite;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();

        // テスト対象クラスを用意
        $this->contactRepo = app()->make(ContactRepository::class);
        $this->eloquent = app()->make(EloquentContact::class);
    }

    /**
     * @test
     * list
     */
    public function store_正常系()
    {
        // テストデータ
        $post = [
            'contact' => [
                'name' => '問合太郎',
                'kana' => 'といあわせたろう',
                'email' => 'contact@hoge.co.jp',
                'tel' => '012-345-6789',
                'reply' => '電話での返答',
                'msg' => 'お問い合わせ内容',
                'privacy' => '1',
            ]
        ];

        // テスト対象メソッドを実行
        $result = $this->contactRepo->store($post);

        // 検証
        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function makeMailContactForAdmin_正常系()
    {
        // テストデータ
        $post = ['email' => 'contact@hoge.co.jp'];

        // テスト対象メソッドを実行
        $result = $this->contactRepo->makeMailContactForAdmin($post);

        // 検証
        $this->assertInstanceOf(MailContactForAdmin::class, $result);
    }

    /**
     * @test
     */
    public function makeMailContactForCustomer_正常系()
    {
        // テストデータ
        $post = ['email' => 'contact@hoge.co.jp'];

        // テスト対象メソッドを実行
        $result = $this->contactRepo->makeMailContactForCustomer($post);

        // 検証
        $this->assertInstanceOf(MailContactForCustomer::class, $result);
    }

    /**
     * @test
     */
    public function makeSendContact_正常系()
    {
        // テスト対象メソッドを実行
        $result = $this->contactRepo->makeSendContact();

        // 検証
        $this->assertInstanceOf(SendContact::class, $result);
    }

    /**
     * @test
     */
    public function makeCheckMode_正常系()
    {
        // テストデータ
        $post['contact'] = [
            'name' => '名前'
        ];

        // テスト対象メソッドを実行
        $result = $this->contactRepo->makeCheckMode($post);

        // 検証
        $this->assertInstanceOf(CheckMode::class, $result);
    }
}
