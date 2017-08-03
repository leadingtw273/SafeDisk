/*
function test(name1,name2){
	//document.getElementById("demo").innerHTML="My first javascript function";
	//document.write("文檔消失");
	alert(name1+", "+name2);

}
*/
function validate_email(field,alerttxt)
{
with (field)
{
apos=value.indexOf("@")
dotpos=value.lastIndexOf(".")
if (apos<1||dotpos-apos<2) 
  {alert(alerttxt);return false}
else {return true}
}
}

function validate_form(thisform)
{
with (thisform)
{
if (validate_email(email,"Not a valid e-mail address!")==false)
  {email.focus();return false}
}
}

//document.write("<p>test</p>");

//var person = {firstname:"chou",lastname:"john"};

//document.write(person.lastname);


