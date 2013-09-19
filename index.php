<?php
	
	//$pageView = new \view\HTMLpage();
	
	session_start();
	
	setlocale(LC_ALL, "sv_SE", "sv_SE.utf-8", "sv", "swedish"); //http://www.webforum.nu/archive/index.php/t-182908.html
	
	$login = false;
	$logout = false;
	
	$userName = "Admin";
	$password = "Password";
	$autoLogin = isset($_POST['autoLogin']);
	

	
	
	
	if($_POST){
		$user = $_POST['userNameId'];
		$pass = $_POST['passwordID'];	
		
		
		
		//Användare och lösenord är rätt, kommer den in här.
		if($user == $userName && $pass == $password){
			
			$logout = true;
			
			
			if(isset($_POST['autoLogin'])){
				echo "DINA UPPGIFTER ÄR SPARADE!!!";
			}
			
			if(!isset($_SESSION['user_sess'])){
				$_SESSION['user_sess']= true;
				
				
			//Meddelandet försvinner..
				if($login == false){
					echo "<br>Du är inloggad!<br/>"; 
					$login = true;
					
				}
				
			}
			
			
          }else{
          	
			
			
			if($user == ''){
				
				echo "<br>FYLL I ANVÄNDARNAMN<br/ >";
			}
			
			elseif($pass == ''){
					
				echo "<br>FYLL I LÖSENORD<br/ >";
				
			}
			else{
				
          		echo "DINA UPPGIFTER ÄR FELAKTIGA!";
			
			}
          }
		  
		
		
	}
	
	
	
	if(isset($_SESSION['user_sess']) && $_SESSION['user_sess']){
		echo"<head> 
             <title>Laboration. Inloggad</title> 
             <meta http-equiv='content-type' content='text/html; charset=utf-8' /> 
             
          </head> 
          <body>
            <h1>Laborationskod am222pr</h1>
				<h2>Admin är inloggad</h2>
				 	 <a href='logout.php'>Logga ut</a>
				 <p><p>".strftime('%A, den %d %B år %Y. Klockan är: [%H:%M:%S] ')."<p>
          </body>
          	";
	}else{
			echo getPage();
			unset($_SESSION['logout_message']);
	}
	
		
	
	/*function logOut(){
		
		unset($_SESSION['user_sess']);
		echo "DU HAR LOGGAT UT!";
	}*/
	
	
	
		
	 function getPage() {
	 	
		//http://stackoverflow.com/questions/2621007/keep-username-in-username-field-when-incorrect-password
		$usernameSave = null; 
				if(isset($_POST['userNameId'])){
					$usernameSave = $_POST['userNameId'];
				}
				
				$logoutMessage = "";
				
				if(isset($_SESSION['logout_message'])){// skapas i logout.php
					$logoutMessage = $_SESSION['logout_message'];
				}
				
	
		return"<head> 
			$logoutMessage
             <title>Laboration. Inte inloggad</title> 
             <meta http-equiv='content-type' content='text/html; charset=utf-8' /> 
             
          </head> 
          <body>
            <h1>Laborationskod am222pr</h1><h2>Ej Inloggad</h2>
				  	
			<form action='?login' method='post' enctype='multipart/form-data'>
				<fieldset>
					
					<legend>Login - Skriv in användarnamn och lösenord</legend>
					<label for='userNameId' >Användarnamn :</label>
					<input type='text' size='20' name='userNameId' id='userNameId' value='".$usernameSave."' />
					<label for='passwordID' >Lösenord  :</label>
					<input type='password' size='20' name='passwordID' id='passwordID' value='' />
					<label for='autoLogin' >Håll mig inloggad  :</label>
					<input type='checkbox' name='autoLogin' id='autoLogin' />
					<input type='submit' name=''  value='Logga in' />
				</fieldset>
			</form>
				 <p><p>".strftime('%A, den %d %B år %Y. Klockan är: [%H:%M:%S] ')."<p>
          </body>";
		  
          }
	
         