$(document).ready(function()
{

$("#myForm").submit(function()
{
  var result='';
	var x =$("#f_name").val();
	var y = $("#l_name").val();
	var z = $("#mail").val();
  var u = $("#uname").val();
  var a = $("#pwd").val();
  var b = $("#repwd").val();

  if(x=='' || y=='' || z=='' || a=='' || b=='' || u=='')
  {
    result +='All fields are mandatory\n';
    alert(result);
    return false;

  }

  if(!validateAlphaNum(u))
  {
    result += 'Username should be alphanumeric\n';
    alert(result);
    return false;


  }
  if(a.length<8)
  {
    result+='password must be atleast 8 characters long\n';
    alert(result);
    return false;

  }



if(!validateEmail(z))
{
  result+="Email address is not valid";
  alert(result);
  return false;

}

var upperCase= new RegExp('[^A-Z]');
var lowerCase= new RegExp('[^a-z]');
var numbers = new RegExp('[^0-9]');

if(!a.match(upperCase) || !a.match(lowerCase) || !a.match(numbers))
{
  result+="password must be a combination of uppercase, lowercase letters and numbers\n";
  alert(result);
  return false;
}

if(a!=b)
{
  result+="passwords do not match";
  alert(result);
  return false;
}
return true;

});



function validateAlphaNum(word)
{
  var letterNumber = /^[0-9a-zA-Z]+$/;
  return letterNumber.test(word);
}



function validateEmail(x)
{
	var letterNumber = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{3,3}$/;
	return letterNumber.test(x);
}
});
