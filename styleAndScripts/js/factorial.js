function factorial()
{
    // get the information in form 
    let userInput = document.getElementById("input_value").value;
    let result = 1; 
    
    // check if numeric
    if(isNaN(userInput))
    {
        result = "Not a number";
    }
   // check if float, by looking for period 
    else if (userInput.toString().indexOf('.') != -1)
    {
        result = "Enter an integer"
    }
    // check if value is going to lead to an overflow/near infinite loop
    else if (parseInt(userInput) > 170)
    {
        result = "Value will cause overflow, enter value less than 171";
    }
    else
    {
        // for case of factorial being zero
        if(parseInt(userInput) == 0)
        {
           result = "1"; 
        }
        else 
        {
            let i = userInput;
            while(i > 1)
            {
                result = result * i;
                i = i - 1;
            }
        }
        
    }
    
    
    // document.getElementById("calc_result").innerHTML = result;
    document.getElementById("result_text").innerHTML = "Result: " + result.toString();
    //document.getElementById("demo").innerHTML = "Hello";


}

function myFunction() {
    // Get the value of the input field with id="numb"
    let x = document.getElementById("numb").value;
    // If x is Not a Number or less than one or greater than 10
    let text;
    if (isNaN(x) || x < 1 || x > 10) {
      text = "Input not valid";
    } else {
      text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
  }

  function factorialII()
{
    // get the information in form 
    let userInput = document.getElementById("numb").value;
    let result = 1; 
    
    // check if numeric
    if(isNaN(userInput))
    {
        result = "not a number";
    }
   // check if float, by looking for period 
    else if (userInput.toString().indexOf('.') != -1)
    {
        result = "Enter an integer"
    }
    // check if value is going to lead to an overflow/near infinite loop
    else if (parseInt(userInput) > 170)
    {
        result = "Value will cause overflow, enter value less than 171";
    }
    else
    {
        // for case of factorial being zero
        if(parseInt(userInput) == 0)
        {
           result = "1"; 
        }
        else 
        {
            let i = userInput;
            while(i > 1)
            {
                result = result * i;
                i = i - 1;
            }
        }
        
    }
    
    
    // document.getElementById("calc_result").innerHTML = result;
    document.getElementById("demo").innerHTML = result.toString();
    //document.getElementById("demo").innerHTML = "Hello";

}