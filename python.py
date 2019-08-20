import mysql.connector

def debug(db,table,column):
    mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="",
        database=db
    )
    cursor = mydb.cursor()
    cursor.execute("SELECT * FROM " + table)
    result = cursor.fetchall()
    ln = len(result)
    i = 0
    l = 1
    while(i < int(ln)):
        idd = result[i][0]
        if (idd != l):
            mycursor.execute("UPDATE " + table + " SET " + column + "=" + str(l) +" WHERE " + column + "=" + str(idd))
            mydb.commit()
			print(column + " column updated")
        i+=1
        l+=1
debug("database name", "table name", "column name")