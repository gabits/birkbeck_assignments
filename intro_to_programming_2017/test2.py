def printBoundary(n):
    # this function receives a number aas an input and prints asteriscs n times
    asteriscs = n * "*"
    return "%s %s" % (asteriscs , asteriscs)


printBoundary(3)

def printInterior(n):
    asteriscs = n * "*"
    single_asterisc = "*"
    spaces = (n-2) * " "
    return "%s %s%s%s" % (asteriscs , single_asterisc , spaces , single_asterisc)

printInterior(5)

def squares():
    n = int(input("Enter a number equal or bigger than 2: "))
    printBoundary(n)
    print((printInterior(n) + "\n") * n)

squares()
