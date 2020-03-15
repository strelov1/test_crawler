<?php

class UrlUploader implements IUploader
{
    public function load($content)
    {
        $handle = curl_init();

        curl_setopt($handle, CURLOPT_URL, $content);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($handle);

        curl_close($handle);

        return $output;
    }
}