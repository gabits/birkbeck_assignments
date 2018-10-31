"""Gabriela Mininel Valle @ 14/11/17

The purpose of this program is to receive an integer input referring to a score
and then to assign a grade to it.
"""

def return_grade_for(score):
    if 90 <= score <= 100:
        grade = "A"
    elif 80 <= score < 90:
        grade = "B"
    elif 70 <= score < 80:
        grade = "C"
    elif 60 <= score < 70:
        grade = "D"
    elif 0 <= score < 60:
        grade = "E"
    else:
        return "The value provided is not a valid score between 0 and 100."
    return "Grade %s" % grade

def test_return_grade_for_score():
    a = ([100, 95, 90], 'Grade A')
    b = ([89, 80], 'Grade B')
    c = ([79, 70], 'Grade C')
    d = ([69, 60], 'Grade D')
    e = ([59, 34, 0], 'Grade E')
    invalid = ([3093, -900, -10],
                "The value provided is not a valid score between 0 and 100.")
    grades = [a, b, c, d, e, invalid]
    for score_list in grades:
        for score in score_list[0]:
            compare_equal(return_grade_for(score), score_list[1])
    print("All tests passed!")

def compare_equal(a, b):
    if a != b:
        raise Exception("{a} != {b}".format(a=a, b=b))
    return True

def manual_test():
    score = int(input("Score: "))
    print(return_grade_for(score))

def prompt_manual_test():
    do_manual_test = str(input("Continue to manual test? (y/n)\n"))
    print(do_manual_test)
    if do_manual_test == 'y':
        manual_test()
    return

def run_tests():
    test_return_grade_for_score()
    prompt_manual_test()

if __name__ == '__main__':
    run_tests()
