#!python

import mysql.connector
import pandas as pd 
import numpy as np 
from statsmodels.tsa.api import ExponentialSmoothing, SimpleExpSmoothing, Holt
#import statsmodels.api as sm
from datetime import datetime, timedelta
import sys
import warnings

warnings.filterwarnings("ignore")

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="mighty_minds"
)
employeeID = sys.argv[1]
forcastDayCount = int(sys.argv[2])

table = pd.read_sql("SELECT * FROM mood WHERE EmployeeID = "+str(employeeID)+" ORDER BY DatePosted", mydb)

def label_race (row):
   if row['Mood'] == 'Bad' :
      return 0
   if row['Mood'] == 'Okay' :
      return 1
   if row['Mood'] == 'Good' :
      return 2
   if row['Mood'] == 'Great' :
      return 3

table['label'] = table.apply (lambda row: label_race(row), axis=1)

r = pd.date_range(start=table.DatePosted.min(), end=table.DatePosted.max())
table = table.set_index('DatePosted').reindex(r).fillna(0.0).rename_axis('DatePosted').reset_index()
table['DatePosted'] = pd.to_datetime(table['DatePosted']).dt.date
dataLenght = len(table)

for x in range(forcastDayCount):
    date = datetime.strptime(str(table['DatePosted'][x+dataLenght-1]), "%Y-%m-%d")
    modified_date = date+timedelta(days=1)
    modified_date = str(modified_date)[:len(str(modified_date)) - 9]
    table.loc[len(table.index)] = [str(modified_date),'','','','',0]

df = table[['DatePosted','label']]
train=df[0 :dataLenght] 
test=df[dataLenght:]

y_hat_avg = test.copy()
fit1 = ExponentialSmoothing(np.asarray(train['label']) ,seasonal_periods=8, seasonal='add',).fit()
#fit1 = ExponentialSmoothing(np.asarray(train['label']) ,seasonal_periods=7 ,trend='add', seasonal='add',).fit()
y_hat_avg['Holt_Winter'] = fit1.forecast(len(test))
predicted = y_hat_avg['Holt_Winter']
predicted = [round(num, 0) for num in predicted]
predictedlabels =[]

for result in predicted:
    if result==0:
        predictedlabels.append('Bad')
    if result==1:
        predictedlabels.append('Okay')
    if result==2:
        predictedlabels.append('Good')
    if result==3:
        predictedlabels.append('Great')

print(predictedlabels)