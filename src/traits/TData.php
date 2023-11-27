<?php

namespace cmq2080\baidu_aip\traits;

trait TData
{
    protected $data = [];

    protected $allowedKeys = [];

    protected $requiredKeys = [];

    public function setData(string|array $key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $k .= "";
                $v .= "";
                $this->setData($k, $v);
            }
            return $this;
        }

        if (!in_array($key, $this->allowedKeys)) {
            throw new \Exception('Attribute Not Allowed: ' . $key);
        }
        if (!is_string($value)) {
            throw new \Exception('Value Invalid: ' . $key . ' - ' . $value);
        }
        $this->data[$key] = $value;

        return $this;
    }

    public function getData($key = null, $default = null)
    {
        if ($key === null) {
            // 检测必填属性是否都已设置
            foreach ($this->requiredKeys as $v) {
                if (!isset($this->data[$v])) {
                    throw new \Exception('Attribute Required: ' . $v);
                }
            }

            return $this->data;
        }

        if (!in_array($key, $this->allowedKeys)) {
            throw new \Exception('Attribute Not Allowed: ' . $key);
        }
        if (!isset($this->data[$key])) {
            return $default;
        }

        return $this->data[$key];
    }
}
