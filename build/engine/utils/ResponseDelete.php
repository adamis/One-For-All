<?php
namespace engine\utils;

class ResponseDelete implements \JsonSerializable
{

    private $status;
    private $size;

    
    public function jsonSerialize()
    {
        return ['status' => $this->getStatus(),
            'size' => $this->getSize()        		
        ];
    }

    // STATUS
    function getStatus()
    {
        return $this->status;
    }

    function setStatus($status)
    {
    	return $this->status= $status;
    }

    // SIZE
    function getSize()
    {
        return $this->size;
    }

    function setSize($size)
    {
    	return $this->size= $size;
    }

}
?>