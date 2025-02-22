<?php

class PhotoAlbum
{
    const IMAGE_DIR = 'img';

    private array $current_file = [];

    private string $rootPath = '';

    public function __construct(array $arr)
    {
        $this->rootPath = ROOT_PATH . '/' . self::IMAGE_DIR;

        if (!file_exists(ROOT_PATH . '/' . self::IMAGE_DIR)) {
             mkdir($this->rootPath, 0777);
        }

        $this->current_file = $arr;
    }

    public function tempFileName(): string
    {
        return $this->current_file['tmp_name'];
    }

    public function fileName(): string
    {
        $ext = $this->extension($this->current_file['full_path']);

        return $this->rootPath . '/' . time() . '.' . $ext;
    }

    public function isImage(): bool
    {
        $tmp = $this->tempFileName();
        $info = getimagesize($tmp);

        return strpos($info['mime'], 'image/') === 0;
    }

    public function extension(string $path): string
    {
        $arr = explode('.', $path);

        return $arr[count($arr) - 1];
    }

    public static function list(): array
    {
        $photos = [];
        foreach(glob((new self([]))->getRootPath() . '/*') as $path) {
            $sz = getimagesize($path);
            $photos[] = [
                'name'  => basename($path),
                'url'   => '/img/' . basename($path),
                'w'     => $sz[0],
                'h'     => $sz[1],
                'wh'    => $sz[3]
            ];
        }

        sort($photos);

        return $photos;
    }

    public function getRootPath(): string
    {
        return $this->rootPath;
    }
}