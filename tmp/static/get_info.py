import glob
import csv
import os

ps = glob.glob('uploads/*.csv')

ps.sort(key = os.path.getmtime)

f_all = open('all.csv', 'w')

for index, p in enumerate(ps):
    print(index, p)
    with open(p, 'r') as f:
        line = f.readline().rstrip()
        f_all.write(line+'\n')
    
