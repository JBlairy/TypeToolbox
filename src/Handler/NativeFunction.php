<?php

namespace ReusableCog\TypeToolbox\Handler;

use ReusableCog\TypeToolbox\Exception\NativeFunctionException;
use stdClass;

final class NativeFunction
{
    public static function base64Decode(string $b64): string
    {
        $b64decoded = base64_decode($b64, true);

        if (false === $b64decoded) {
            throw new NativeFunctionException('Error when trying to base64_decode.');
        }

        return $b64decoded;
    }

    /**
     * @param resource         $file
     * @param int<0, max>|null $lenght
     *
     * @return array<mixed, mixed>
     */
    public static function fgetcsv($file, int $lenght = null, string $separator = ','): array
    {
        $getCSV = fgetcsv($file, $lenght, $separator);

        if (false === $getCSV) {
            throw new NativeFunctionException('fgetcsv error.');
        }

        return $getCSV;
    }

    /**
     * @param resource $file
     */
    public static function fgets($file): string
    {
        $line = fgets($file);

        if (false === $line) {
            throw new NativeFunctionException('Cant get line.');
        }

        return $line;
    }

    public static function fileGetContents(?string $file): string
    {
        if (null === $file || !is_file($file)) {
            throw new NativeFunctionException($file . ' is not a valid file.');
        }

        $content = file_get_contents($file);

        if (false === $content) {
            throw new NativeFunctionException('Cannot get file content:  ' . $file);
        }

        return $content;
    }

    public static function filePutContent(string $path, string $data): void
    {
        $success = file_put_contents($path, $data);

        if (false === $success) {
            throw new NativeFunctionException('Cannot open file:  ' . $path);
        }
    }

    /**
     * @return resource
     */
    public static function fopen(string $path, string $mode = 'r')
    {
        $file = fopen($path, $mode);

        if (false === $file) {
            throw new NativeFunctionException('Cant open file at path ' . $path);
        }

        return $file;
    }

    /**
     * @return array<mixed, mixed>
     */
    public static function jsonDecode(string $string): array
    {
        $decodedArray = json_decode($string, true, 512, JSON_THROW_ON_ERROR);

        if (!is_array($decodedArray)) {
            throw new NativeFunctionException('Unexpected error, $decodedArray must be an array.');
        }

        return $decodedArray;
    }

    /**
     * @param array<mixed, mixed>|stdClass $mixed
     */
    public static function jsonEncode(array|stdClass $mixed): string
    {
        $string = json_encode($mixed);

        if (!is_string($string)) {
            throw new NativeFunctionException('Unexpected error, cant json encode.');
        }

        return $string;
    }

    public static function pregReplace(string $pattern, string $replacement, string $subject): string
    {
        $replacedString = preg_replace($pattern, $replacement, $subject);

        if (!is_string($replacedString)) {
            throw new NativeFunctionException('Unexpected error on pregreplace.');
        }

        return $replacedString;
    }

    public static function strtotime(string $dateString): int
    {
        $date = strtotime($dateString);

        if (false === $date) {
            throw new NativeFunctionException('Cant strtotime with ' . $dateString);
        }

        return $date;
    }

    public static function tempnam(string $fileName): string
    {
        $temporaryFile = tempnam(sys_get_temp_dir(), $fileName);

        if (false === $temporaryFile) {
            throw new NativeFunctionException('Error when creating temporary file with tempnam.');
        }

        return $temporaryFile;
    }
}
