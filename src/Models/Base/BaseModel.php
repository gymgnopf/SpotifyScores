<?php

namespace App\Models\Base;

class BaseModel
{
    public function jsonSerialize() {
        $data = [];
        foreach (get_object_vars($this) as $property => $value) {
            $getter = 'get' . ucfirst($property);
            if (method_exists($this, $getter)) {
                $data[$property] = $this->$getter();
            }
        }
        return $data;
    }
}