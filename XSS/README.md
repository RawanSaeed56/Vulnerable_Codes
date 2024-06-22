Today we will talk about XSS attack

What is the XSS?
        Cross Site Scripting (XSS) belong to Injection category in OWASP top 10.
        XSS is a vulnerability in a web application that allows a third party to execute a script in the user’s browser 
        there are 3 types of it.

    1-Refected XSS==>input that i have been entred reflected in source code.
    2-Stored XSS==>store XSS in database.
    3-DOM XSS==>(Document Object Model) input reflected in js code and we try to execute js function like alert(),confirm(),..
    
Where we can find it? 
    if you take input from user and don't make any filteration.
What is the Mitigation? 
   use filtration or sanitization function like htmlspecialchars() in PHP=> htmlspecialchars(your input value) then use this value.
