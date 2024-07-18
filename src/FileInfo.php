<?php
namespace TriHydera\File;

class FileInfo {
	private $dir;

 	public function __construct($dir) {
		$this->dir = $dir;
 	}

 	public function getInfo() {
    $details = [];
    $this->listFilesRecursively($this->dir, $details);
    return $details;
}

private function listFilesRecursively($dir, &$details) {
    $files = scandir($dir);

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $dir . '/' . $file;

        if (is_dir($path)) {
            $this->listFilesRecursively($path, $details);
        } else {
            $hash = md5_file($path);
            $size = filesize($path);
            $modified = filemtime($path);
            $formattedSize = $this->formatSize($size);
            $shortCode = substr($hash, 2, 4).substr($hash, 10, 4);

            $details[$file] = [
                'id' => $shortCode,
                'name' => $file,
                'modified' => date('Y-m-d H:i', $modified),
                'size_raw' => $size,
                'size' => $formattedSize,
                'hash' => $hash,
                'path' => $path
            ];
        }
    }
}

 	private function formatSize($bytes) {
		$units = array('B', 'KB', 'MB', 'GB', 'TB');
 		$i = floor(log($bytes, 1024));
 		return @round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
 	}
}
?>