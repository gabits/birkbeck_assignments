def consumption(kilometres):
    GASOLINE_COST_PER_L = 0.9
    PRICE_PER_L = 1/12
    cost_per_km = GASOLINE_COST_PER_L * PRICE_PER_L * kilometres
    return cost_per_km + 0.5            # the 0.5 is to round up the cost


kilometres = float(input("Enter amount of Kilometres: "))

print("Price: %.2f" % (consumption(kilometres)))
