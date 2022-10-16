<?php

namespace Tool\Admin\tests;

class TestData
{
    /**
     * @var string
     */
    private $tmpPath;

    /**
     * @var string
     */
    private $filePath;

    /**
     * @var
     */
    private $dir;

    /**
     * TestData constructor.
     * @param string $model (ディレクトリ名。articles、contentsなど複数形で)
     */
    public function __construct(string $dir)
    {
        // ディレクトリ名
        $this->dir = $dir;

        // 一時ファイルの場所
        $this->tmpPath = storage_path('app') . '/tmp';

        // 正式ディレクトリの場所
        $this->filePath = storage_path('app') . '/' . $this->dir;

        // テストホスト
        $_SERVER['HTTP_HOST'] = 'localhost';
    }

    /**
     * テスト用画像ファイルを削除
     * @param string $fileName
     * @return bool
     */
    public function makeTestFile(string $fileName): bool
    {
        $filePath1 = $this->filePath . '/' . $fileName . '/' . $fileName . '_2l.jpg';
        $filePath2 = $this->filePath . '/' . $fileName . '/' . $fileName . '_l.jpg';
        $filePath3 = $this->filePath . '/' . $fileName . '/' . $fileName . '_m.jpg';
        $filePath4 = $this->filePath . '/' . $fileName . '/' . $fileName . '_s.jpg';
        $fileDir = $this->filePath . '/' . $fileName . '/';

        if (file_exists($fileDir)) {
            unlink($filePath1);
            unlink($filePath2);
            unlink($filePath3);
            unlink($filePath4);
            rmDir($fileDir);
        }
        mkdir($fileDir);
        touch($filePath1);
        touch($filePath2);
        touch($filePath3);
        touch($filePath4);

        return true;
    }

    public function makeUser(): array
    {
        return [
            'name' => '介護太郎',
            'kana' => 'かいごたろう',
            'zip1' => '070',
            'zip2' => '1122',
            'address' => '旭川市1-1',
            'tel1' => '011',
            'tel2' => '111',
            'tel3' => '2222',
            'fax' => '0166-12-3456',
            'is_authenticated' => 1,
            'authenticated_msg' => '',
            'authenticated_date' => '2022-01-01 12:12:12',
            'company' => '法人',
            'lat' => '43.00000',
            'lng' => '143.00000',
            'msg' => 'メモ',
            'reorder' => 1,
            'prefecture_id' => 2,
            'city_id' => 2,
            'job_type_id' => 2,
            'trade_area_id' => 1,
            'role_id' => 1,
            'user_type_id' => 2,
            'user_id' => 1
        ];
    }

    /**
     * テスト用一時画像ファイルを作成
     * @param string $fileName
     * @return bool
     */
    public function makeTmpFile(string $fileName): bool
    {
        $tmpPath1 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_2l.jpg';
        $tmpPath2 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_l.jpg';
        $tmpPath3 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_m.jpg';
        $tmpPath4 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_s.jpg';
        $tmpDir = $this->tmpPath . '/' . $fileName . '/';
        if (file_exists($tmpDir)) {
            unlink($tmpPath1);
            unlink($tmpPath2);
            unlink($tmpPath3);
            unlink($tmpPath4);
            rmDir($tmpDir);
        }
        mkdir($tmpDir);
        touch($tmpPath1);
        touch($tmpPath2);
        touch($tmpPath3);
        touch($tmpPath4);

        return true;
    }

    /**
     * テスト用画像ファイルを削除
     * @param string $fileName
     * @return bool
     */
    public function removeTestFile(string $fileName): bool
    {
        $filePath1 = $this->filePath . '/' . $fileName . '/' . $fileName . '_2l.jpg';
        $filePath2 = $this->filePath . '/' . $fileName . '/' . $fileName . '_l.jpg';
        $filePath3 = $this->filePath . '/' . $fileName . '/' . $fileName . '_m.jpg';
        $filePath4 = $this->filePath . '/' . $fileName . '/' . $fileName . '_s.jpg';
        $fileDir = $this->filePath . '/' . $fileName . '/';
        unlink($filePath1);
        unlink($filePath2);
        unlink($filePath3);
        unlink($filePath4);
        rmdir($fileDir);

        return true;
    }

    /**
     * テスト用一時画像ファイルを削除
     * @param string $fileName
     * @return bool
     */
    public function removeTmpFile(string $fileName): bool
    {
        $tmpPath1 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_2l.jpg';
        $tmpPath2 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_l.jpg';
        $tmpPath3 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_m.jpg';
        $tmpPath4 = $this->tmpPath . '/' . $fileName . '/' . $fileName . '_s.jpg';
        $tmpDir = $this->tmpPath . '/' . $fileName . '/';
        unlink($tmpPath1);
        unlink($tmpPath2);
        unlink($tmpPath3);
        unlink($tmpPath4);
        rmdir($tmpDir);

        return true;
    }


    public function requestCompanyStore(): array
    {
        // 初期値を含めてデータ設定
        $results['company']['name'] = '追加法人';
        $results['company']['display'] = 0;
        $results['company']['preview'] = 1;
        $results['company']['longname'] = '';
        $results['company']['kana'] = '';
        $results['company']['email'] = '';
        $results['company']['zip1'] = '';
        $results['company']['zip2'] = '';
        $results['company']['address'] = '';
        $results['company']['tel1'] = '';
        $results['company']['tel2'] = '';
        $results['company']['tel3'] = '';
        $results['company']['fax'] = '';
        $results['company']['lat'] = config('myapp.default_lat');
        $results['company']['lng'] = config('myapp.default_lng');
        $results['company']['search_words'] = '';
        $results['company']['msg'] = '';
        $results['company']['start'] = '';
        $results['company']['president'] = '';
        $results['company']['history'] = '';
        $results['company']['capital'] = '';
        $results['company']['staff'] = '';
        $results['company']['area_center_id'] = 2;
        $results['company']['prefecture_id'] = 2;
        $results['company']['city_id'] = 2;
        $results['company']['trade_area_id'] = 2;

        // データを返す
        return $results;
    }

    public function requestCompanyUpdate(): array
    {
        // 初期値を含めてデータ設定
        $results['company']['id'] = 1;
        $results['company']['name'] = '変更法人';
        $results['company']['display'] = 1;
        $results['company']['preview'] = 1;
        $results['company']['longname'] = '';
        $results['company']['kana'] = '';
        $results['company']['email'] = '';
        $results['company']['zip1'] = '';
        $results['company']['zip2'] = '';
        $results['company']['address'] = '';
        $results['company']['tel1'] = '';
        $results['company']['tel2'] = '';
        $results['company']['tel3'] = '';
        $results['company']['fax'] = '';
        $results['company']['lat'] = config('myapp.default_lat');
        $results['company']['lng'] = config('myapp.default_lng');
        $results['company']['search_words'] = '';
        $results['company']['msg'] = '';
        $results['company']['start'] = '';
        $results['company']['president'] = '';
        $results['company']['history'] = '';
        $results['company']['capital'] = '';
        $results['company']['staff'] = '';
        $results['company']['area_center_id'] = 2;
        $results['company']['prefecture_id'] = 2;
        $results['company']['city_id'] = 2;
        $results['company']['trade_area_id'] = 2;

        // データを返す
        return $results;
    }

    public function requestSpotStore(): array
    {
        // 初期値を含めてデータ設定
        $results['spot']['display'] = 0;
        $results['spot']['preview'] = 1;
        $results['spot']['name'] = '追加事業所';
        $results['spot']['longname'] = '';
        $results['spot']['zip1'] = '';
        $results['spot']['zip2'] = '';
        $results['spot']['address'] = '';
        $results['spot']['tel1'] = '';
        $results['spot']['tel2'] = '';
        $results['spot']['tel3'] = '';
        $results['spot']['is_meeting'] = 0;
        $results['spot']['heading'] = '';
        $results['spot']['message'] = '';
        $results['spot']['monthly_price_min'] = 0;
        $results['spot']['monthly_price_max'] = 0;
        $results['spot']['movein_price_min'] = 0;
        $results['spot']['movein_price_max'] = 0;
        $results['spot']['room_size'] = '';
        $results['spot']['lat'] = config('myapp.default_lat');
        $results['spot']['lng'] = config('myapp.default_lng');
        $results['spot']['search_words'] = '';

        // spot_detailsテーブルデータ設定
        $results['spot']['spot_detail']['kana'] = '';
        $results['spot']['spot_detail']['subname'] = '';
        $results['spot']['spot_detail']['email'] = '';
        $results['spot']['spot_detail']['fax'] = '';
        $results['spot']['spot_detail']['rooms'] = '';
        $results['spot']['spot_detail']['staff'] = '';
        $results['spot']['spot_detail']['staffs'] = '';
        $results['spot']['spot_detail']['staff_age'] = '';
        $results['spot']['spot_detail']['nurses'] = '';
        $results['spot']['spot_detail']['nurse_time'] = '';
        $results['spot']['spot_detail']['build_start'] = '';
        $results['spot']['spot_detail']['open_start'] = '';
        $results['spot']['spot_detail']['website'] = '';
        $results['spot']['spot_detail']['introducer'] = '';
        $results['spot']['spot_detail']['phone'] = '';
        $results['spot']['spot_detail']['reserved_phone'] = '';
        $results['spot']['spot_detail']['feature'] = '';
        $results['spot']['spot_detail']['comment'] = '';
        $results['spot']['spot_detail']['comment2'] = '';
        $results['spot']['spot_detail']['company_name'] = '';
        $results['spot']['spot_detail']['company_staff'] = '';
        $results['spot']['spot_detail']['proarea'] = '';

        // データを返す
        return $results;
    }

    public function requestSpotUpdate(): array
    {
        // 初期値を含めてデータ設定
        $results['spot']['id'] = 1;
        $results['spot']['name'] = '変更事業所';
        $results['spot']['display'] = 1;
        $results['spot']['preview'] = 1;
        $results['spot']['zip1'] = '';
        $results['spot']['zip2'] = '';
        $results['spot']['address'] = '';
        $results['spot']['tel1'] = '';
        $results['spot']['tel2'] = '';
        $results['spot']['tel3'] = '';
        $results['spot']['vacancy'] = '1';
        $results['spot']['document'] = '1';
        $results['spot']['viewing'] = '1';
        $results['spot']['is_book'] = '1';
        $results['spot']['is_meeting'] = '1';
        $results['spot']['heading'] = '';
        $results['spot']['message'] = '';
        $results['spot']['monthly_price_min'] = '100';
        $results['spot']['monthly_price_max'] = '200';
        $results['spot']['for_check_monthly'] = 1;
        $results['spot']['movein_price_min'] = '1000';
        $results['spot']['movein_price_max'] = '2000';
        $results['spot']['for_check_movein'] = 1;
        $results['spot']['is_selfpay'] = 1;
        $results['spot']['room_size'] = '';
        $results['spot']['lat'] = '43.0000';
        $results['spot']['lng'] = '143.0000';
        $results['spot']['area_center_id'] = 1;
        $results['spot']['category_id'] = 1;
        $results['spot']['city_id'] = 2;
        $results['spot']['prefecture_id'] = 2;
        $results['spot']['price_range_id'] = 2;
        $results['spot']['space_id'] = 2;
        $results['spot']['spot_plan_id'] = 1;
        $results['spot']['trade_area_id'] = 2;
        $results['spot']['company_id'] = 2;
        $results['spot']['spot_icon_item'] = [];
        $results['spot']['spot_prices'] = [];
        $results['spot']['spot_detail']['id'] = 1;
        $results['spot']['spot_detail']['email'] = '';
        $results['spot']['spot_detail']['proarea'] = '';
        $results['icons'][0]['id'] = 1;
        $results['icons'][0]['name'] = 'name';
        $results['icons'][0]['spot_icon_type_id'] = 1;
        $results['icons'][0]['spot_icon_genre_id'] = 1;
        $results['prices'][0]['id'] = 1;
        $results['prices'][0]['name'] = 'name';
        $results['search_words'] = '';

        // データを返す
        return $results;
    }

    public function spotEmptyData(): array
    {
        for ($i = 2; $i <= 10; $i++) {
            $spotIconGenreComment[] = ['spot_icon_genre_id' => $i];
        }
        for ($i = 2; $i <= 66; $i++) {
            $spotIconStatus[] = ['spot_icon_item_id' => $i];
        }
        for ($i = 2; $i <= 7; $i++) {
            $spotPrice[] = [
                'description' => '',
                'ps' => '',
                'reorder' => 1,
                'price_genre_id' => $i,
            ];
        }

        $results['spotIconGenreComment'] = new \Tool\Admin\Domain\Models\SpotIconGenreComment\StoreData($spotIconGenreComment);
        $results['spotIconStatus'] = new \Tool\Admin\Domain\Models\SpotIconStatus\StoreData($spotIconStatus);
        $results['spotPrice'] = new \Tool\Admin\Domain\Models\SpotPrice\StoreData($spotPrice);

        return $results;
    }

    public function requestNewsStore(): array
    {
        // 初期値を含めてデータ設定
        $results['news']['name'] = '追加お知らせ';
        $results['news']['display'] = 0;
        $results['news']['preview'] = 1;
        $results['news']['body'] = '';
        $results['news']['more'] = '';
        $results['news']['url'] = '';

        return $results;
    }

    public function requestNewsUpdate(): array
    {
        // 初期値を含めてデータ設定
        $results['news']['id'] = 1;
        $results['news']['name'] = '変更お知らせ';
        $results['news']['display'] = 1;
        $results['news']['preview'] = 1;
        $results['news']['body'] = '';
        $results['news']['more'] = '';
        $results['news']['url'] = '';

        return $results;
    }

    public function requestUserStore(): array
    {
        // 初期値を含めてデータ設定
        $results['user']['name'] = '追加ユーザー';
        $results['user']['enabled'] = 0;
        $results['user']['kana'] = '';
        $results['user']['zip1'] = '';
        $results['user']['zip2'] = '';
        $results['user']['address'] = '';
        $results['user']['tel1'] = '';
        $results['user']['tel2'] = '';
        $results['user']['tel3'] = '';
        $results['user']['fax'] = '';
        $results['user']['email'] = 'add' . rand(100,999) . '@hoge.co.jp';
        $results['user']['password'] = 'password';
        $results['user']['is_authenticated'] = 1;
        $results['user']['authenticated_msg'] = '';
        $results['user']['authenticated_date'] = '';
        $results['user']['company'] = '';
        $results['user']['lat'] = '43.0000';
        $results['user']['lng'] = '143.0000';
        $results['user']['msg'] = '';
        $results['user']['prefecture_id'] = 1;
        $results['user']['city_id'] = 1;
        $results['user']['job_type_id'] = 1;
        $results['user']['role_id'] = 3;
        $results['user']['trade_area_id'] = 1;
        $results['user']['user_type_id'] = 1;

        return $results;
    }

    public function requestUserUpdate(): array
    {
        // 初期値を含めてデータ設定
        $results['user']['id'] = 1;
        $results['user']['enabled'] = 1;
        $results['user']['name'] = '変更ユーザー';
        $results['user']['kana'] = 'へんこうゆーざー';
        $results['user']['zip1'] = '070';
        $results['user']['zip2'] = '1111';
        $results['user']['address'] = '';
        $results['user']['tel1'] = '090';
        $results['user']['tel2'] = '111';
        $results['user']['tel3'] = '2222';
        $results['user']['fax'] = '0123-456-7890';
        $results['user']['email'] = 'root@hoge.co.jp';
        $results['user']['password'] = 'password';
        $results['user']['is_authenticated'] = 1;
        $results['user']['authenticated_msg'] = '';
        $results['user']['authenticated_date'] = '';
        $results['user']['company'] = '所属';
        $results['user']['lat'] = '43.0000';
        $results['user']['lng'] = '143.0000';
        $results['user']['msg'] = '';
        $results['user']['prefecture_id'] = 2;
        $results['user']['city_id'] = 2;
        $results['user']['job_type_id'] = 2;
        $results['user']['role_id'] = 2;
        $results['user']['trade_area_id'] = 2;
        $results['user']['user_type_id'] = 2;

        return $results;
    }

    public function requestSpotImageStore(): array
    {
        $post['photo']['upload'] = $this->base64();

        return $post;
    }

    public function base64(): string
    {
        return 'data:image/jpeg;base64,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TQPtAAAAAAAQAEgAAAABAAIASAAAAAEAAjhCSU0EJgAAAAAADgAAAAAAAAAAAAA/gAAAOEJJTQPyAAAAAAAKAAD///////8AADhCSU0EDQAAAAAABAAAAB44QklNBBkAAAAAAAQAAAAeOEJJTQPzAAAAAAAJAAAAAAAAAAABADhCSU0nEAAAAAAACgABAAAAAAAAAAI4QklNA/UAAAAAAEgAL2ZmAAEAbGZmAAYAAAAAAAEAL2ZmAAEAoZmaAAYAAAAAAAEAMgAAAAEAWgAAAAYAAAAAAAEANQAAAAEALQAAAAYAAAAAAAE4QklNA/gAAAAAAHAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAOEJJTQQIAAAAAAAQAAAAAQAAAkAAAAJAAAAAADhCSU0EHgAAAAAABAAAAAA4QklNBBoAAAAAA0sAAAAGAAAAAAAAAAAAAAAPAAAAFAAAAAsAcwBhAG0AcABsAGUAXwBtAGkAbgBpAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAUAAAADwAAAAAAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAAAAABAAAAABAAAAAAAAbnVsbAAAAAIAAAAGYm91bmRzT2JqYwAAAAEAAAAAAABSY3QxAAAABAAAAABUb3AgbG9uZwAAAAAAAAAATGVmdGxvbmcAAAAAAAAAAEJ0b21sb25nAAAADwAAAABSZ2h0bG9uZwAAABQAAAAGc2xpY2VzVmxMcwAAAAFPYmpjAAAAAQAAAAAABXNsaWNlAAAAEgAAAAdzbGljZUlEbG9uZwAAAAAAAAAHZ3JvdXBJRGxvbmcAAAAAAAAABm9yaWdpbmVudW0AAAAMRVNsaWNlT3JpZ2luAAAADWF1dG9HZW5lcmF0ZWQAAAAAVHlwZWVudW0AAAAKRVNsaWNlVHlwZQAAAABJbWcgAAAABmJvdW5kc09iamMAAAABAAAAAAAAUmN0MQAAAAQAAAAAVG9wIGxvbmcAAAAAAAAAAExlZnRsb25nAAAAAAAAAABCdG9tbG9uZwAAAA8AAAAAUmdodGxv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eG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOmNycz0iaHR0cDovL25zLmFkb2JlLmNvbS9jYW1lcmEtcmF3LXNldHRpbmdzLzEuMC8iIGRjOmZvcm1hdD0iaW1hZ2UvanBlZyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxNCAoTWFjaW50b3NoKSIgeG1wOk1vZGlmeURhdGU9IjIwMTctMTItMDNUMTM6MTM6MDgrMDk6MDAiIHhtcDpDcmVhdGVEYXRlPSIyMDEzLTEwLTA1VDE1OjUyOjEzIiB4bXA6UmF0aW5nPSIwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDE3LTEyLTAzVDEzOjEzOjA4KzA5OjAwIiBhdXg6U2VyaWFsTnVtYmVyPSJENjg1MDE0NDgiIGF1eDpMZW5zSW5mbz0iNTAvMSAyMDAvMSAyOC8xMCAzNS8xMCIgYXV4OkxlbnM9IjUwLjAtMjAwLjAgbW0gZi8yLjgtMy41IiBhdXg6TGVuc1NlcmlhbE51bWJlcj0iMjQwMDI1Mzg4IiBhdXg6Rmxhc2hDb21wZW5zYXRpb249IjAvMSIgcGhvdG9zaG9wOkRhdGVDcmVhdGVkPSIyMDEzLTEwLTA1VDE1OjUyOjEzIiBwaG90b3Nob3A6TGVnYWN5SVBUQ0RpZ2VzdD0iMkYxNjdBRDkxRTAzOThBOTlFNjUxMDRBMDJENjBDNDkiIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJBZG9iZSBSR0IgKDE5OTgpIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjJiNjNmZjEzLWJkOGYtMTc0ZC05NTU2LTUzYzZkODlmYjBlOCIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJCRUM1QzhBQzJDNjMzNDIzOUJFQUJDRTYzOTM4QjY2NCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyMDE0ZDUzZi05YzM0LTRiYWQtOGY5Zi04MDdiN2RjZWQyYzciIGNyczpSYXdGaWxlTmFtZT0iUEEwNTg3NjkuT1JGIiBjcnM6VmVyc2lvbj0iOC4yIiBjcnM6UHJvY2Vzc1ZlcnNpb249IjYuNyIgY3JzOldoaXRlQmFsYW5jZT0iQXMgU2hvdCIgY3JzOkF1dG9XaGl0ZVZlcnNpb249IjEzNDM0ODgwMCIgY3JzOlRlbXBlcmF0dXJlPSI0MzAwIiBjcnM6VGludD0iKzMiIGNyczpTYXR1cmF0aW9uPSIrNSIgY3JzOlNoYXJwbmVzcz0iNzMiIGNyczpMdW1pbmFuY2VTbW9vdGhpbmc9IjAiIGNyczpDb2xvck5vaXNlUmVkdWN0aW9uPSIyNSIgY3JzOlZpZ25ldHRlQW1vdW50PSIwIiBjcnM6U2hhZG93VGludD0iMCIgY3JzOlJlZEh1ZT0iMCIgY3JzOlJlZFNhdHVyYXRpb249IjAiIGNyczpHcmVlbkh1ZT0iMCIgY3JzOkdyZWVuU2F0dXJhdGlvbj0iMCIgY3JzOkJsdWVIdWU9IjAiIGNyczpCbHVlU2F0dXJhdGlvbj0iMCIgY3JzOlZpYnJhbmNlPSIrMjciIGNyczpIdWVBZGp1c3RtZW50UmVkPSIwIiBjcnM6SHVlQWRqdXN0bWVudE9yYW5nZT0iMCIgY3JzOkh1ZUFkanVzdG1lbnRZZWxsb3c9IjAiIGNyczpIdWVBZGp1c3RtZW50R3JlZW49IjAiIGNyczpIdWVBZGp1c3RtZW50QXF1YT0iMCIgY3JzOkh1ZUFkanVzdG1lbnRCbHVlPSIwIiBjcnM6SHVlQWRqdXN0bWVudFB1cnBsZT0iMCIgY3JzOkh1ZUFkanVzdG1lbnRNYWdlbnRhPSIwIiBjcnM6U2F0dXJhdGlvbkFkanVzdG1lbnRSZWQ9IjAiIGNyczpTYXR1cmF0aW9uQWRqdXN0bWVudE9yYW5nZT0iMCIgY3JzOlNhdHVyYXRpb25BZGp1c3RtZW50WWVsbG93PSIwIiBjcnM6U2F0dXJhdGlvbkFkanVzdG1lbnRHcmVlbj0iMCIgY3JzOlNhdHVyYXRpb25BZGp1c3RtZW50QXF1YT0iMCIgY3JzOlNhdHVyYXRpb25BZGp1c3RtZW50Qmx1ZT0iMCIgY3JzOlNhdHVyYXRpb25BZGp1c3RtZW50UHVycGxlPSIwIiBjcnM6U2F0dXJhdGlvbkFkanVzdG1lbnRNYWdlbnRhPSIwIiBjcnM6THVtaW5hbmNlQWRqdXN0bWVudFJlZD0iMCIgY3JzOkx1bWluYW5jZUFkanVzdG1lbnRPcmFuZ2U9IjAiIGNyczpMdW1pbmFuY2VBZGp1c3RtZW50WWVsbG93PSIwIiBjcnM6THVtaW5hbmNlQWRqdXN0bWVudEdyZWVuPSIwIiBjcnM6THVtaW5hbmNlQWRqdXN0bWVudEFxdWE9IjAiIGNyczpMdW1pbmFuY2VBZGp1c3RtZW50Qmx1ZT0iMCIgY3JzOkx1bWluYW5jZUFkanVzdG1lbnRQdXJwbGU9IjAiIGNyczpMdW1pbmFuY2VBZGp1c3RtZW50TWFnZW50YT0iMCIgY3JzOlNwbGl0VG9uaW5nU2hhZG93SHVlPSIwIiBjcnM6U3BsaXRUb25pbmdTaGFkb3dTYXR1cmF0aW9uPSIwIiBjcnM6U3BsaXRUb25pbmdIaWdobGlnaHRIdWU9IjAiIGNyczpTcGxpdFRvbmluZ0hpZ2hsaWdodFNhdHVyYXRpb249IjAiIGNyczpTcGxpdFRvbmluZ0JhbGFuY2U9IjAiIGNyczpQYXJhbWV0cmljU2hhZG93cz0iMCIgY3JzOlBhcmFtZXRyaWNEYXJrcz0iMCIgY3JzOlBhcmFtZXRyaWNMaWdodHM9IjAiIGNyczpQYXJhbWV0cmljSGlnaGxpZ2h0cz0iMCIgY3JzOlBhcmFtZXRyaWNTaGFkb3dTcGxpdD0iMjUiIGNyczpQYXJhbWV0cmljTWlkdG9uZVNwbGl0PSI1MCIgY3JzOlBhcmFtZXRyaWNIaWdobGlnaHRTcGxpdD0iNzUiIGNyczpTaGFycGVuUmFkaXVzPSIrMS4wIiBjcnM6U2hhcnBlbkRldGFpbD0iMjUiIGNyczpTaGFycGVuRWRnZU1hc2tpbmc9IjAiIGNyczpQb3N0Q3JvcFZpZ25ldHRlQW1vdW50PSIwIiBjcnM6R3JhaW5BbW91bnQ9IjAiIGNyczpDb2xvck5vaXNlUmVkdWN0aW9uRGV0YWlsPSI1MCIgY3JzOkNvbG9yTm9pc2VSZWR1Y3Rpb25TbW9vdGhuZXNzPSI1MCIgY3JzOkxlbnNQcm9maWxlRW5hYmxlPSIwIiBjcnM6TGVuc01hbnVhbERpc3RvcnRpb25BbW91bnQ9IjAiIGNyczpQZXJzcGVjdGl2ZVZlcnRpY2FsPSIwIiBjcnM6UGVyc3BlY3RpdmVIb3Jpem9udGFsPSIwIiBjcnM6UGVyc3BlY3RpdmVSb3RhdGU9IjAuMCIgY3JzOlBlcnNwZWN0aXZlU2NhbGU9IjEwMCIgY3JzOlBlcnNwZWN0aXZlQXNwZWN0PSIwIiBjcnM6UGVyc3BlY3RpdmVVcHJpZ2h0PSIwIiBjcnM6QXV0b0xhdGVyYWxDQT0iMCIgY3JzOkV4cG9zdXJlMjAxMj0iMC4wMCIgY3JzOkNvbnRyYXN0MjAxMj0iMCIgY3JzOkhpZ2hsaWdodHMyMDEyPSIwIiBjcnM6U2hhZG93czIwMTI9IjAiIGNyczpXaGl0ZXMyMDEyPSIwIiBjcnM6QmxhY2tzMjAxMj0iMCIgY3JzOkNsYXJpdHkyMDEyPSIrMTciIGNyczpEZWZyaW5nZVB1cnBsZUFtb3VudD0iMCIgY3JzOkRlZnJpbmdlUHVycGxlSHVlTG89IjMwIiBjcnM6RGVmcmluZ2VQdXJwbGVIdWVIaT0iNzAiIGNyczpEZWZyaW5nZUdyZWVuQW1vdW50PSIwIiBjcnM6RGVmcmluZ2VHcmVlbkh1ZUxvPSI0MCIgY3JzOkRlZnJpbmdlR3JlZW5IdWVIaT0iNjAiIGNyczpDb252ZXJ0VG9HcmF5c2NhbGU9IkZhbHNlIiBjcnM6VG9uZUN1cnZlTmFtZTIwMTI9IkxpbmVhciIgY3JzOkNhbWVyYVByb2ZpbGU9IkFkb2JlIFN0YW5kYXJkIiBjcnM6Q2FtZXJhUHJvZmlsZURpZ2VzdD0iRkQ2NzZEMzUzMDA3MDgyNzVFRjVDQjRFQTY2OTkzRUQiIGNyczpMZW5zUHJvZmlsZVNldHVwPSJMZW5zRGVmYXVsdHMiIGNyczpVcHJpZ2h0VmVyc2lvbj0iMTM0MjE3NzI4IiBjcnM6VXByaWdodENlbnRlck1vZGU9IjAiIGNyczpVcHJpZ2h0Q2VudGVyTm9ybVg9IjAuNSIgY3JzOlVwcmlnaHRDZW50ZXJOb3JtWT0iMC41IiBjcnM6VXByaWdodEZvY2FsTW9kZT0iMCIgY3JzOlVwcmlnaHRGb2NhbExlbmd0aDM1bW09IjM1IiBjcnM6VXByaWdodFByZXZpZXc9IkZhbHNlIiBjcnM6VXByaWdodFRyYW5zZm9ybUNvdW50PSIwIiBjcnM6SGFzU2V0dGluZ3M9IlRydWUiIGNyczpIYXNDcm9wPSJGYWxzZSIgY3JzOkFscmVhZHlBcHBsaWVkPSJUcnVlIj4gPGRjOmRlc2NyaXB0aW9uPiA8cmRmOkFsdD4gPHJkZjpsaSB4bWw6bGFuZz0ieC1kZWZhdWx0Ij5PTFlNUFVTIERJR0lUQUwgQ0FNRVJBPC9yZGY6bGk+IDwvcmRmOkFsdD4gPC9kYzpkZXNjcmlwdGlvbj4gPHBob3Rvc2hvcDpEb2N1bWVudEFuY2VzdG9ycz4gPHJkZjpCYWc+IDxyZGY6bGk+eG1wLmRpZDoyYTU4ZGM1YS0xN2MxLTQ2YTAtODE0MC1mMzIyZGFkZGNlZDM8L3JkZjpsaT4gPC9yZGY6QmFnPiA8L3Bob3Rvc2hvcDpEb2N1bWVudEFuY2VzdG9ycz4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iZGVyaXZlZCIgc3RFdnQ6cGFyYW1ldGVycz0iY29udmVydGVkIGZyb20gaW1hZ2UveC1vbHltcHVzLXJhdyB0byBpbWFnZS90aWZmIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDoyYjYzZmYxMy1iZDhmLTE3NGQtOTU1Ni01M2M2ZDg5ZmIwZTgiIHN0RXZ0OndoZW49IjIwMTMtMTAtMDZUMjA6MDA6MTkrMDk6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDYW1lcmEgUmF3IDguMiAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMyNzkwYzU5LWM3ZTEtZTM0MS04OTE2LTg2YjAzZGJlOTEzNyIgc3RFdnQ6d2hlbj0iMjAxMy0xMC0wNlQyMDowMDoyNiswOTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY29udmVydGVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJmcm9tIGltYWdlL3RpZmYgdG8gaW1hZ2UvanBlZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iZGVyaXZlZCIgc3RFdnQ6cGFyYW1ldGVycz0iY29udmVydGVkIGZyb20gaW1hZ2UvdGlmZiB0byBpbWFnZS9qcGVnIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDpmZTYyNGYyMS0wODdhLTA0NDktODU4Yy01YjQwODAyYmRmYjAiIHN0RXZ0OndoZW49IjIwMTMtMTAtMDZUMjA6MDA6MjYrMDk6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjIwMTRkNTNmLTljMzQtNGJhZC04ZjlmLTgwN2I3ZGNlZDJjNyIgc3RFdnQ6d2hlbj0iMjAxNy0xMi0wM1QxMzoxMzowOCswOTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozMjc5MGM1OS1jN2UxLWUzNDEtODkxNi04NmIwM2RiZTkxMzciIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MmI2M2ZmMTMtYmQ4Zi0xNzRkLTk1NTYtNTNjNmQ4OWZiMGU4IiBzdFJlZjpvcmlnaW5hbERvY3VtZW50SUQ9IkJFQzVDOEFDMkM2MzM0MjM5QkVBQkNFNjM5MzhCNjY0Ii8+IDxjcnM6VG9uZUN1cnZlUFYyMDEyPiA8cmRmOlNlcT4gPHJkZjpsaT4wLCAwPC9yZGY6bGk+IDxyZGY6bGk+MjU1LCAyNTU8L3JkZjpsaT4gPC9yZGY6U2VxPiA8L2NyczpUb25lQ3VydmVQVjIwMTI+IDxjcnM6VG9uZUN1cnZlUFYyMDEyUmVkPiA8cmRmOlNlcT4gPHJkZjpsaT4wLCAwPC9yZGY6bGk+IDxyZGY6bGk+MjU1LCAyNTU8L3JkZjpsaT4gPC9yZGY6U2VxPiA8L2NyczpUb25lQ3VydmVQVjIwMTJSZWQ+IDxjcnM6VG9uZUN1cnZlUFYyMDEyR3JlZW4+IDxyZGY6U2VxPiA8cmRmOmxpPjAsIDA8L3JkZjpsaT4gPHJkZjpsaT4yNTUsIDI1NTwvcmRmOmxpPiA8L3JkZjpTZXE+IDwvY3JzOlRvbmVDdXJ2ZVBWMjAxMkdyZWVuPiA8Y3JzOlRvbmVDdXJ2ZVBWMjAxMkJsdWU+IDxyZGY6U2VxPiA8cmRmOmxpPjAsIDA8L3JkZjpsaT4gPHJkZjpsaT4yNTUsIDI1NTwvcmRmOmxpPiA8L3JkZjpTZXE+IDwvY3JzOlRvbmVDdXJ2ZVBWMjAxMkJsdWU+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9InciPz7/4gJASUNDX1BST0ZJTEUAAQEAAAIwQURCRQIQAABtbnRyUkdCIFhZWiAHzwAGAAMAAAAAAABhY3NwQVBQTAAAAABub25lAAAAAAAAAAAAAAAAAAAAAAAA9tYAAQAAAADTLUFEQkUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA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';
    }

    public function tmpPath(): string
    {
        return $this->tmpPath;
    }

    public function filePath(): string
    {
        return $this->filePath;
    }

    public function fileName(): string
    {
        return 'content';
    }

}
