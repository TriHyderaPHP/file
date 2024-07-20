<?php
namespace Trihydera\File;

/**
 * Class JsonFile
 * 
 * Handles reading and writing JSON data to files.
 */
class JsonFile
{
    /**
     * Read JSON data from a file.
     * 
     * @param string $file The path to the JSON file.
     * @return array The decoded JSON data.
     * @throws \Exception If the file path is invalid.
     */
    public function read($file)
    {
        // Sanitize the file path
        $file = realpath($file);

        if ($file === false || strpos($file, __DIR__) !== 0) {
            throw new \Exception('Invalid file path');
        }

        $contents = file_exists($file) ? file_get_contents($file) : '[]';
        return json_decode($contents, true);
    }

    /**
     * Write JSON data to a file.
     * 
     * @param string $file The path to the JSON file.
     * @param array $data The data to be encoded as JSON and written to the file.
     * @throws \Exception If the file path is invalid.
     */
    public function write($file, $data)
    {
        // Sanitize the file path
        $file = realpath($file);

        if ($file === false || strpos($file, __DIR__) !== 0) {
            throw new \Exception('Invalid file path');
        }

        file_put_contents($file, json_encode($data));
    }
}
?>