'''
仕様
使い方：python correlation.py "提出されたファイルへのパス"
提出ファイルと解答ファイルのデータから相関を取り、評価する
出力：(正常時)相関値、(エラー時)なし
'''
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
    try:
        received_fp = sys.argv[1]
        answer_fp = '../app/Python/STS.gs.images.txt'

        received_scores = fp_to_scores(received_fp)
        answer_scores = fp_to_scores(answer_fp)

        correlation = round(np.corrcoef(received_scores, answer_scores)[0, 1], 2)
        if np.isnan(correlation):
            raise Exception()

    except Exception:
        pass

    else:
        print(correlation)

if __name__ == '__main__':
    main()
