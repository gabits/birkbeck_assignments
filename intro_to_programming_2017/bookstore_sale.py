"""The university bookstore's Kilobyte Day sale gives a discount of 8% on all
computer accessory purchases if the price is below $128. If the purchase price
is at least $128, it'll have a discount of 16%.

Write a program that returns the cashier's calculation for the original price
according to the amount of the purchase.
"""

def sale(price):
    if price < 128.00:
        price *= 0.92
    else:
        price *= 0.84
    return price

print(sale(input("Purchase amount: ")))
