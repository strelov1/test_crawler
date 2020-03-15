<?php

class Crawler
{
    protected $uploader;
    protected $parser;

    protected $raw_data;
    protected $data;

    public function __construct(IUploader $uploader, IParser $parser)
    {
        $this->uploader = $uploader;
        $this->parser = $parser;
    }

    public function parse($data): self
    {
        $this->raw_data = $this->uploader->load($data);
        $this->data = $this->parser->parse($this->raw_data);
        return $this;
    }

    /**
     * @return array
     */
    public function countTags(): array
    {
        $stat = [];
        foreach ($this->data as $element) {
            if (empty($stat[$element])) {
                $stat[$element] = 1;
            } else {
                $stat[$element] += 1;
            }
        }
        return $stat;
    }

    /**
     * @param $tag
     * @return int
     */
    public function countByTag($tag):int
    {
        $counter = 0;
        foreach ($this->data as $element) {
            if ($element === $tag) {
                $counter++;
            }
        }
        return $counter;
    }
}