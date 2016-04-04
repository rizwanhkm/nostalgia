import re
fs = open('finalyeardetails.csv')
sql = open('rollNumberDetails.sql', 'w')
for line in fs:
  strippedline = line.strip();
  parts = strippedline.split(',')
  rollNumber = parts[0]
  name = parts[1]
  splitagain = parts[2].split('-')
  if (rollNumber[0:4] == '1011'):
    department = "ARCH"
    gender = re.findall(r'\((.*?)\)',splitagain[0])[0]
  else :
    department = splitagain[1]
    gender = re.findall(r'\((.*?)\)',splitagain[2])[0]
  string = 'INSERT INTO `rollnodetails`(`rollNo`, `studentName`, `Department`, `Gender`) VALUES ('
  string += "'" + rollNumber + "','" + name.strip() +"','" + department+ "','" + gender + "');\n"
  print string
  sql.write(string)
