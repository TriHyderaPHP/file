<?php
namespace TriHydera\File;

class JsonFile {
private $log;

    public function __construct() {
$this->log = $log;
}

    public function read(string $file)
    {
        $split = explode('/..', $file);

        $contents = file_exists($file) ? file_get_contents($file) : '[]';
return json_decode($contents, true);
    }

    public function write(string $file, array $data)
    {
        $split = explode('/..', $file);

        file_put_contents($file, json_encode($data));
    }
}

?>