<?php

declare(strict_types=1);

class ImageHandlerException extends Exception
{
}

class ImageHandler
{
    public $fileTypes = ['image/jpeg', 'image/png'];

    protected $filepath = '';
    protected $filename = '';
    protected $imageData = [];
    protected $origWidth = 0;
    protected $origHeight = 0;
    protected $mediaType = '';

    public function __construct(string $filepath, string $filename)
    {
        $this->filepath = $filepath;
        $this->filename = $filename;
        $this->imageData = getimagesize($filepath);
        $this->origWidth = $this->imageData[0];
        $this->origHeight = $this->imageData[1];
        $this->mediaType = $this->imageData['mime'];

        if (!in_array($this->mediaType, $this->fileTypes)) {
            throw new ImageHandlerException('File not an accepted image format', 1);
        }
    }

    public function resizeImage(int $newWidth, int $newHeight, string $uploadPath)
    {
        if (($this->origWidth < $newWidth) || ($this->origHeight < $newHeight)) {
            throw new ImageHandlerException('Original image too small', 2);
        }

        $orig_ratio = $this->origWidth / $this->origHeight;
        $new_ratio = $newWidth / $newHeight;

        if ($new_ratio < $orig_ratio) {
            $select_width = $this->origHeight * $new_ratio;
            $select_height = $this->origHeight;
            $x_offset = ($this->origWidth - $select_width) / 2;
            $y_offset = 0;
        } else {
            $select_width = $this->origWidth;
            $select_height = $this->origWidth * $new_ratio;
            $x_offset = 0;
            $y_offset = ($this->origHeight - $select_height) / 2;
        }

        switch ($this->mediaType) {
            case 'image/jpeg':
                $orig = imagecreatefromjpeg($this->filepath);
                break;
            case 'image/png':
                $orig = imagecreatefrompng($this->filepath);
                break;
        }

        $new = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($new, $orig, 0, 0, $x_offset, $y_offset, $newWidth, $newHeight, $select_width, $select_height);

        $path = $this->createFilePath($this->filename, $uploadPath);

        switch ($this->mediaType) {
            case 'image/gif':
                imagegif($new, $path);
                break;
            case 'image/jpeg':
                imagejpeg($new, $path);
                break;
            case 'image/png':
                imagepng($new, $path);
                break;
        }

        return $path;
    }

    public function createFilePath(string $filename, string $uploadPath): string
    {
        $basename = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $basename = preg_replace('/[^A-z0-9]/', '-', $basename);
        $filepath = $uploadPath . $basename . '.' . $extension;
        $i = 0;

        while (file_exists($filepath)) {
            $i += 1;
            $filepath = $uploadPath . $basename . $i . '.' . $extension;
        }

        return $filepath;
    }
}
