<?php

require __DIR__.'/EnvParser.php';

class Comment
{
    public function __CONSTRUCT(EnvParser $envParser)
    {
        $this->envData = $envParser;
    }

    public function hiData()
    {
        print_r($this->envData->getEnv());
    }
}

$classCom = new Comment(new EnvParser());
$classCom->hiData();
