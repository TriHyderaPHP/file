<?php
require __DIR__.'/../vendor/autoload.php';

$fi = new Trihydera\File\FileInfo(__DIR__.'/files');

echo json_encode(
    $fi->scan()
);