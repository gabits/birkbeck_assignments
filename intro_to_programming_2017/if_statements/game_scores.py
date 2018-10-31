def take_scores():
    a = input("Score A: ")
    b = input("Score B: ")
    return a, b

def compare():
    a, b = take_scores()
    return "A wins!" if a > b else "It's a tie!" if a == b else "B wins!"

if __name__ == '__main__':
    print(compare())
