<?php

/**
 *
 * this file is for image parser text
 *
 *
 * @author      Eka Jaya Nagara
 * @copyright   Copyright (c), 2021 naagaraa
 * @license     MIT public license
 * @describe    this tool using Imagic and base64 hash for make image processing
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 *
 */

namespace Nagara\Src\Img;

use imagick;

// image processing psudo code

// rescaling
// binarisation
// noise removal
// dilation / erotion
// rotation / deskewing
// borders
// transparancy / alpha channel

class ImageProcessing
{

    private $blob = [];
    private $image;
    private $dimension;
    private $imgbase64;

    public function __construct($pathToImage)
    {
        // file validation
        !is_file(realpath($pathToImage)) ? die('soory is not file') : true;
        $this->image = $pathToImage;
        $extention = pathinfo($pathToImage, PATHINFO_EXTENSION);
        $data = file_get_contents($pathToImage);
        $base64 = base64_encode($data);
        $this->imgbase64 = $base64;
        return $this;
    }

    /**
     * show GetDimension Image
     *
     * @return void
     */
    public function GetDimension()
    {
        $imagick = new \Imagick(realpath($this->image));
        $dimension = $imagick->getImageGeometry();
        $this->dimension = $dimension;
        echo "Dimension width : {$this->dimension['width']} DPI and height :{$this->dimension['height']} DPI";
        return $this;
    }

    /**
     * filter image to grayscale
     *
     * @param String|null $img
     * @return void
     */
    public function Grayscale()
    {
        $imagick = new Imagick();
        $decoded = base64_decode($this->imgbase64);

        $imagick->readimageblob($decoded);
        $imagick->autoLevelImage(5);
        $imagick->setImageType(Imagick::IMGTYPE_GRAYSCALE);

        array_push($this->blob, $imagick->getImageBlob());
        return $this;
    }

    /**
     * Rescaling Image defauld value 1200
     *
     * @param integer $DPI
     * @return object
     */
    public function Rescaling($DPI = 1200)
    {
        try {

            // rescaling image
            $imagick = new Imagick();
            $imagick->readimageblob(end($this->blob));

            $imagick->scaleImage($DPI, $DPI, true);
            $dimension = $imagick->getImageGeometry();
            
            // scale image
            if ($dimension >= 300) {
                $imagick->scaleImage($DPI, $DPI, true);
            }

            array_push($this->blob, $imagick->getImageBlob());
            // echo $this->blob;
            // remove old image
            // $imagick->destroy();
            return $this;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * method Binarisation Image
     *
     * @param float $threshold
     * @param integer $channel
     * @return void
     */
    public function Binarisation($threshold = 0.44, $channel = 1)
    {
        try {
            // header("Content-Type: image/jpg");
            $imagick = new Imagick();
            $imagick->readimageblob(end($this->blob));
            $imagick->thresholdimage($threshold * \Imagick::getQuantum(), $channel);

            array_push($this->blob, $imagick->getImageBlob());

            // echo $this->blob;
            // remove old image
            // $imagick->destroy();
            return $this;
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Method Noise Removal Image
     *
     * @param integer $quality
     * @return void
     */
    public function NoiseRemoval()
    {
        $imagick = new Imagick();
        $imagick->readimageblob(end($this->blob));

        $imagick->despeckleImage();
        array_push($this->blob, $imagick->getImageBlob());

        // $imagick->writeImage(realpath($this->image));
        return $this;
    }

    /**
     * beta method Dilation and Erotion
     *
     * @return void
     */
    public function DilationAndErotion($radius = 0, $sigma = 0, $channel = 1)
    {
        // $imagick = new Imagick(realpath($this->image));
        $imagick = new Imagick();
        $imagick->readimageblob(end($this->blob));

        $imagick->sharpenimage($radius, $sigma, $channel);

        array_push($this->blob, $imagick->getImageBlob());

        return $this;
    }

    /**
     * function deskewing / auto rotation
     *
     * @return void
     */
    public function Deskewing()
    {
        $imagick = new Imagick();
        $imagick->readimageblob(end($this->blob));
        $imagick->deskewImage(1);
        array_push($this->blob, $imagick->getImageBlob());
        return $this;

    }

    /**
     * method show reusult image
     *
     * @return void
     */
    public function ShowImage($blob)
    {
        header("Content-Type: image/jpg");
        $imagick = new Imagick();
        $imagick->readimageblob($blob);
        echo $imagick->getImageBlob();
    }

    /**
     * return array image base64
     *
     * @return void
     */
    public function getBlob()
    {
        $imageblob = [];
        foreach ($this->blob as $value) {
            array_push($imageblob, base64_encode($value));
        }
        return $imageblob;
    }

    /**
     * write blob to file
     *
     * @param string $path
     * @param string $blob
     * @return void
     */
    public function writeFile($path = "", $blob = "")
    {
        file_put_contents($path, base64_decode($blob));
    }
}
