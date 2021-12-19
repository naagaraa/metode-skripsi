<?php

/**
 * 
 * this file is part of action office File Manager for method skripshit
 * 
 * @author      Eka Jaya Nagara     
 * @copyright   Copyright (c), 2021 naagaraa office File Manager function object
 * @license     MIT public license
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
 */

namespace Nagara\Src\Doc;

class FileManager {

    private static $file;
    private static $directory;
    private static $directory_path;

    /**
     * listing files method
     *
     * @param string $directory
     * @return void
     */
    public function listing_files($directory = "")
    {
        // check dir exits
        if (!is_dir($directory)) {
            echo "directory not found at " . getcwd();
            die;
        }else{

            $dirPath = realpath($directory) . DIRECTORY_SEPARATOR;
            $scanDir =  scandir($dirPath); // read directory bro

            // save directory path
            self::$directory_path == $dirPath;

            // loop files
            $files_data = [];
            foreach ($scanDir as $file) {

                // skip file if found
                if ($file == "." || $file == "..") {
                    continue;
                }

                $filepath = $dirPath . $file;
                if (is_file($filepath)) {
                    array_push($files_data, $filepath);
                }
            }

            // return listing file
            self::$file = $files_data;
            return self::$file;
        }

    }


    /**
     * listing directory emthod
     *
     * @param string $directory
     * @return void
     */
    public function listing_directory($directory = "")
    {
         // check dir exits
        if (!is_dir($directory)) {
            echo "directory not found at " . getcwd();
            die;
        }else{
            $dirPath = realpath($directory) . DIRECTORY_SEPARATOR;
            $scanDir =  scandir($dirPath); // read directory bro


            // save directory path
            self::$directory_path == $dirPath;

            // loop files
            $dir_data = [];
            foreach ($scanDir as $file) {

                // skip file if found
                if ($file == "." || $file == "..") {
                    continue;
                }

                $path = $dirPath . $file;
                if (is_dir($path) and is_readable($path)) {
                    array_push($dir_data, $path);
                }
            }

            // return listing file
            self::$directory = $dir_data;
            return self::$directory;
        }

        
    }
}