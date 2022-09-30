<?php
namespace Tool\Admin\Domain\Models\Book\Print;
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

use \Mpdf\Mpdf;

/**
 * PDF出力
 *
 */
class PublishPdf extends AppModel
{

  /**
   * PDF出力DIR
   *
   */
  public $outputPath = BOOK_PDF_DIR;

  /**
   * 出力
   *
   */
  public function publish(string $html, string $css, int $page)
  {
    try {
      // インスタンス作成
      $mpdf = new Mpdf([
        'fontdata' => [
          'ipa'    => ['R' => BOOK_PDF_FONT],
          'bold'   => ['R' => BOOK_PDF_FONT2]
        ],
        'format' => array(216, 303),
        'mode' => 'utf-8',
        'margin_left' => 0,
        'margin_right' => 0,
        'margin_top' => 0,
        'margin_bottom' => 0,
        'margin_header' => 0,
        'margin_footer' => 0
      ]);

      // 中身のCSS作成
      $mpdf->WriteHTML($css, 1);

      // 中身のHTML作成
      $mpdf->WriteHTML($html);

      // PDF出力
      $mpdf->Output($this->outputPath . DS . $page . '.pdf');

    } catch (Exception $e) {
      return false;
    }
    return true;
  }
}