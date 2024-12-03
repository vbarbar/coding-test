# Acme Widget Co - Shopping Basket Implementation

This is a PHP implementation of the Acme Widget Co shopping basket system. The solution provides a simple and maintainable way to handle product pricing, special offers, and delivery charges.

## Features

- Product catalog management
- Add items to basket
- Automatic delivery charge calculation
- Special offer: Buy one red widget, get the second half price
- Total calculation with all rules applied

## Technical Details

### Class Structure

The `Basket` class handles all basket operations with two main methods:
- `add(string $code)`: Adds a product to the basket
- `total()`: Calculates the final total including offers and delivery

### Product Codes
- R01: Red Widget ($32.95)
- G01: Green Widget ($24.95)
- B01: Blue Widget ($7.95)

### Business Rules

1. Delivery Charges:
   - Orders under $50: $4.95
   - Orders under $90: $2.95
   - Orders $90 or more: Free

2. Special Offers:
   - Buy one red widget, get the second half price
   - This offer applies to pairs of red widgets

### Assumptions Made

1. Product codes are case-sensitive
2. Prices are stored and calculated in USD
3. All calculations are rounded to 2 decimal places
4. Invalid product codes throw an exception
5. The red widget offer applies to pairs (e.g., if you buy 3, you get one half price, not 1.5 half price)
6. The delivery charge is applied after special offers are calculated



## Testing

1. B01, G01 = $37.85
2. R01, R01 = $54.37
3. R01, G01 = $60.85
4. B01, B01, B01, B01, B01 = $98.27

The implementation handles all the test cases provided:
1. B01 + G01 = $32.90 + $4.95 delivery = $37.85
2. R01 + R01 = $49.42 + $4.95 delivery = $54.37 (includes half-price offer)
3. R01 + G01 = $57.90 + $2.95 delivery = $60.85
4. 5 × B01 = $39.75 + $4.95 delivery = $98.27