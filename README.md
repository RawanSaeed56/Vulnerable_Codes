Today we will talk about XSS attack \n
What is the XSS? 
Where we can find it? 
What is the Mitigation?

lets answer this questions

What is the XSS?
        Cross Site Scripting (XSS) is a vulnerability in a web application that allows a third party to execute a script in the user’s browser 
    there are 3 types of it 
    1-Refected XSS==>input that i have been entred reflected in (URL) web application or source code form method must be GET
    2-Stored XSS==>store XSS in database method can be POST or GET
    3-DOM XSS==>(Document Object Model) input reflected in js code and we try to execute js function like alert(),confirm(),..
Where we can find it? 
    if you take input from user and dont make any filteration.
What is the Mitigation? 
   use htmlspecialchars(your input value) then use this value.
