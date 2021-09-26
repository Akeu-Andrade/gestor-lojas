<?php


namespace App\View\Modal;


use JsonSerializable;

class ModalHelper implements JsonSerializable
{

    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $corpo;

    public function __construct(string $title, string $corpo)
    {
        $this->title = $title;
        $this->corpo = $corpo;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource.
     *
     * @since 5.4.0
     */
    public function jsonSerialize(): array
    {
        return [
            "title" => $this->title,
            "body" => $this->corpo
        ];
    }
}
