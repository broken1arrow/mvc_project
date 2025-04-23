<?php

namespace App\game;

class CardsData
{

    private string $htmlData= '';
    private int $amount = 0;

    public function __construct(string $htmlData, int $amount)
    {
        $this->htmlData = $htmlData;
        $this->amount = $amount;
    }

    public function getHtmlData(): string
    {
        return  $this->htmlData;
    }
    public function getAmount(): int
    {
        return  $this->amount;
    }

    public function __toString(): string
    {
        return "div: {$this->htmlData} worth: {$this->amount}";
    }
}
