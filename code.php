<?php

class Basket
{
    private array $products = [
        'R01' => ['name' => 'Red Widget', 'price' => 32.95],
        'G01' => ['name' => 'Green Widget', 'price' => 24.95],
        'B01' => ['name' => 'Blue Widget', 'price' => 7.95]
    ];
    
    private array $items = [];

    public function add(string $code): void
    {
        if (!isset($this->products[$code])) {
            throw new InvalidArgumentException("Invalid product code: {$code}");
        }
        $this->items[] = $code;
    }

    public function total(): float
    {
        $subtotal = 0;
        $redWidgetCount = 0;

        // Calculate basic total and count red widgets
        foreach ($this->items as $code) {
            $subtotal += $this->products[$code]['price'];
            if ($code === 'R01') {
                $redWidgetCount++;
            }
        }

        // Apply "buy one red widget, get the second half price" offer
        if ($redWidgetCount >= 2) {
            $discount = floor($redWidgetCount / 2) * ($this->products['R01']['price'] / 2);
            $subtotal -= $discount;
        }

        // Apply delivery charges
        $deliveryCharge = match(true) {
            $subtotal >= 90 => 0,
            $subtotal >= 50 => 2.95,
            default => 4.95
        };

        return round($subtotal + $deliveryCharge, 2);
    }
}