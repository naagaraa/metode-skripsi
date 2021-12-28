<?php

/**
 * Update ingrate libraries pdfparser from smalot
 * 
 * @author : Miyuki Nagara
 * @date : 2021-12-28
 *
 * References :
 * - https://github.com/smalot/pdfparser
 */

namespace Nagara\Src\Doc;

class PdfParser
{
   /**
    * Parse PDF file
    *
    * @param string $filename
    * @return string
    */
   public static function parseFile($filename)
   {
      // Parse pdf file and build necessary objects.
      $parser = new \Smalot\PdfParser\Parser;
      $pdf    = $parser->parseFile($filename);
      $text = $pdf->getText();
      return $text;
   }

}
