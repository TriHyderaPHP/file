<?php
namespace Trihydera\File;

/**
 * Class FileTypes
 * 
 * Defines different file types along with their categories and purposes.
 */
class FileTypes {
    /**
     * Array containing file types with their categories and purposes.
     * 
     * @var array
     */
    public $types = [
        'exe'   => ['category' => 'Windows', 'purpose' => 'Executable file'],
        'msi'   => ['category' => 'Windows', 'purpose' => 'Windows Installer Package'],
        'jpg'   => ['category' => 'Image', 'purpose' => 'JPEG Image'],
        'png'   => ['category' => 'Image', 'purpose' => 'PNG Image'],
        'txt'   => ['category' => 'Text', 'purpose' => 'Plain Text File'],
        'pdf'   => ['category' => 'Document', 'purpose' => 'PDF Document'],
        'doc'   => ['category' => 'Document', 'purpose' => 'Microsoft Word Document'],
        'xlsx'  => ['category' => 'Document', 'purpose' => 'Microsoft Excel Spreadsheet'],
        'zip'   => ['category' => 'Archive', 'purpose' => 'Compressed Archive'],
        'mp3'   => ['category' => 'Audio', 'purpose' => 'MP3 Audio File']
    ];
}
?>