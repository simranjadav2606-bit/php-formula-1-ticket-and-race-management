<!DOCTYPE html>
<html>
    <head>
        <title>Validation</title>
            <link href="bootstrap.min.css" REL="stylesheet">
        <script>
            function Validatemail(){
            var email=document.getElementById('em').value;
            const emailerror=document.getElementById('emailerror');
            const atindex=email.indexOf('@');
            const dotindex=email.indexOf('.',atindex);

            if(atindex===-1||dotindex===-1||atindex>dotindex){
                emailerror.textContent='invalid email format."@" must come befor "."';
            }
            else{
                emailerror.textContent="validated email";
            }
         }
            function pwdvalidate()
            {
                var pd=document.getElementById('pwd').value;
                var perror=document.getElementById('pwderror');
                var rng=document.getElementById('rng')
                var flag=1;
                perror.innerHTML="";
                //alert(pd + perror.innerHTML);
                if(pd.length < 8)
                 {
                    perror.innerHTML="Password must be 8 Character long";  
                    flag=1;
                 } 
                if(pd.search(/[A-Z]/) <=-1)    
                {
                    //alert(pd.search(/[A-Z]/));
                    perror.innerHTML=perror.innerHTML + "<br> Should contain Upper case";
                    flag=1;
                }
                if(pd.search(/[a-z]/) <=-1)    
                {
                    //alert(pd.search(/[a-z]/));
                    perror.innerHTML=perror.innerHTML + "<br> Should contain Lower case";
                    flag=1;
                }
                if(pd.search(/[0-9]/) <=-1)    
                {
                    //alert(pd.indexOf());
                    perror.innerHTML=perror.innerHTML + "<br> Should contain digit";
                    flag=1;
                }
                if(pd.search(/[a-zA-Z0-9]/) <=-1)    
                {
                    perror.innerHTML=perror.innerHTML + "<br> Should contain special character";
                    flag=1;
                }
                if(pd.length >=8 && pd.search(/[a-zA-Z0-9]/) >=-1)
                {
                   rng.style="accent-color:green; width:100%";
                 
                }
                if(flag==0)
                {
                    rng.style="accent-color:green; width:100%";
                    rng.value=100;
                }
            }
            

        </script>
    </head>
    <body>
        <div class="container" style="width: 50%;">
            <h2 class="text-dark" align="center">Email Validation</h2>
            <form action="" class="was-validated">
                <label for="">Email Address</label>
                <input type="email" id="em" class="form-control my-4" onblur="Validatemail()" required>
                <div id="emailerror" class="error " style="color: black;">
                
            </div>
            
                <label for="">Password</label>
                <input type="password" id="pwd" class="form-control my-4" onclick="pwdvalidate()" onkeyup="pwdvalidate()" required>
                <p id="pwderror" class="text-danger"></p>
                <input type="range" id="rng" style="accent-color: red; width: 100%;">           
            <button type="button" class="btn btn-dark" style="width:100%" onclick="Validate()" onmouseout="change(0)" onmouseenter="change(1)">VALIDATE</button>
        </form>       
        </div>
    </body>
</html>