<?php

namespace Trihydera\File;

/**
 * Class FileInfo
 *
 * Retrieves information about files in a directory, including file details like size, hash, and modification time.
 */
class FileInfo
{
    private $dir;

    /**
     * FileInfo constructor.
     *
     * @param string $dir The directory path to retrieve file information from.
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    /**
     * Get information about files in the directory.
     *
     * @return array An array containing details of files in the directory.
     */
    public function scan()
    {
        $details = [];
        $this->listFilesRecursively($this->dir, $details);
        return $details;
    }

    /**
     * Recursively list files in a directory and gather details.
     *
     * @param string $dir The directory path to list files from.
     * @param array $details Reference to an array to store file details.
     */
    private function listFilesRecursively($dir, &$details)
    {
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
                $shortCode = substr($hash, 2, 4) . substr($hash, 10, 4);

                $details[] = [
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

    /**
     * Format file size in human-readable format.
     *
     * @param int $bytes The size of the file in bytes.
     * @return string The formatted file size with appropriate units.
     */
    private function formatSize($bytes)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $i = floor(log($bytes, 1024));
        return @round($bytes / pow(1024, $i), 2) . ' ' . $units[$i];
    }
}
