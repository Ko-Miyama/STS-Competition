import sys
import numpy as np

def fp_to_scores(fp):
    scores = []
    with open(fp) as f:
        for line in f.readlines():
            if line != '':
                scores.append(float(line[:-1]))
    return scores

def main():
    received_fp = sys.argv[1]
    answer_fp = '../app/Python/STS.gs.images.txt'

    received_scores = fp_to_scores(received_fp)
    answer_scores = fp_to_scores(answer_fp)

    correlation = round(np.corrcoef(received_scores, answer_scores)[0, 1], 2)
    
    print(correlation)

if __name__ == '__main__':
    main()
