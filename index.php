<?php

require_once __DIR__ . '/vendor/autoload.php';

$crawler = new Crawler(new UrlUploader(), new HtmlParser());

$result = $crawler->parse('https://www.marketcall.ru/');

var_dump($result->countTags());

var_dump($result->countByTag('p'));