<?php


interface IParser
{
    public function parse($content): ?array;
}