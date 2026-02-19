<?php

interface Reader
{
    public function read();
}

interface Writer
{
    public function write($value);
}

class Configure implements Reader,Writer
{
    public function write($value)
    {
        // 書き込みの処理
    }

    public function read()
    {
        // 読み込みの処理
    }
}