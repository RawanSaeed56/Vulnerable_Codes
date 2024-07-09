SQL injection is the placement of malicious code in SQL statements, via web page input.
belong to injection category in OWASP Top 10.

In sqli there are 3 category
*********************First category is in-band******************* 
in-band SQL injection =>attacker recive result as a direct response using same communnication channel.
It have 2 types
1-Error based=> attacker case error in sql so error messsage apper with some information that attacker don't allowed to see

2-Union based=> attecker use the information that apper in error based sql injection to get something that he want like database version

**********************second category inferential (blind)**************
blind SQL injection==> attacker does not recive obvious response from attacked database.
It have 2 types
1-Boolean based blind injection
attacker put boolean condition and know what he want from the response by know different in response if it true or false.

2-Time based blind injection 
if you don't have different in response if condtion true or false then you make database sleep if condtion true to know what you want.

How To Prevent It you can make one of the following
1-Use Parametrized Query
2-Stored procedures
3-Allow-list input validation
