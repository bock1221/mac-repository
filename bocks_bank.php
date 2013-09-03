



<?php
$obj = new program;
//$obj2=new writeinfo;
        class program {
                public function __construct() {
                        if(isset($_REQUEST['class'])) {
                                $class = $_REQUEST['class'];
                                $obj = new $class();
                        } else {
                                $obj = new homepage();
                        }
                        //print_r($_REQUEST);
                }
        }
        class page {
                public function __construct() {
                        if($_SERVER['REQUEST_METHOD'] == 'GET') {
                                $this->get();
                        } else {
                                $this->post();
                        }
                }
                protected function get() {
                        echo "welcome to a bank<br>";
                        echo '<a href="bocks_bank.php?class=register">register now</a>' . "<br> \n";
                        //echo '<a href="mypage_class.php?class=form2">Form 2</a>' . "<br> \n";
                        echo '<a href="bocks_bank.php?class=login">Login Now</a>' . "<br> \n";
                }

                protected function post() {
                        //print_r($_POST);
                }
        }
        class register extends page {
                public function get() {
                        echo 'Hi please register now' . "<br> \n";
                        //echo '<a href="mypage_class.php?class=register">register</a>' . "<br> \n";
                        //echo '<a href="mypage_class.php?class=form2">Form 2</a>' . "<br> \n";
                        //echo '<a href="mypage_class.php">Homepage</a>' . "<br> \n";

                       
                     		$form = '<FORM action="bocks_bank.php?class=register" method="post">
                     				<P>
                     				
                     				<LABEL for="firstname">First name: </LABEL>
                     				<INPUT type="text" name="firstname" id="firstname"><BR>
                     				<LABEL for="lastname">Last name: </LABEL>
                     				<INPUT type="text" name="lastname" id="lastname"><BR>
                     				<LABEL for="username">Username: </LABEL>
                     				<INPUT type="text" name="username"id="username"><BR>
                     				<LABEL for="password">Password: </LABEL>
                     				<INPUT type="password" name="password"id="password"><BR>
                     				<INPUT type="submit" value="Send"> <INPUT type="reset">
                     				</P>
                     				</FORM>';
                     				
                        echo $form;
                }
                public function post(){
                $obj = new writeinfo;
               // $this->$login = $login_form;
               // echo $login;
                $obj->write(); 
               
                }
                     				
        }
        class form2 extends page {
                public function __construct() {
                        echo 'Form 2' . "<br> \n";
                        echo '<a href="bocks_bank.php.php?class=register">Form 1</a>' . "<br> \n";
                        echo '<a href="bocks_bank.php.php?class=form2">Form 2</a>' . "<br> \n";
                        echo '<a href="bocks_bank.php.php">Homepage</a>' . "<br> \n";
                }
        }
        class homepage extends page {}
                     				
        class login extends page{
          public function get(){
           echo "login to get free money";
                     				
            $login_form = '<FORM action ="bocks_bank.php?class=login" method="post">
            		
                     				            <p>Your Username <input type="text"name="username">
                     				            <p>Your password enter now <input type="text"name="password">
                     				            <input type ="submit" name="submit" value ="Submit Now"/>';
          echo $login_form;
          } 
        
        public function post() { 
          $obj = new writeinfo;
          $obj->read_login();
          
          }
        }
                     				
        class debitcredit extends page {
                public function post() {
                        $form = '<br>
                  <FORM action="bocks_bank.php?page=bankform" method="post">
                   <fieldset>
                    <LABEL for="amount">Amount: </LABEL>
                   <INPUT type="text" name="amount" id="lastname"><BR>
                    <LABEL for="source">Source: </LABEL>
                   <INPUT type="text" name="source" id="lastname"><BR>
                     				
                    <INPUT type="radio" name="type" value="debit"> Debit<BR>
                   <INPUT type="text" name="password"id="password"><BR>
                   <INPUT type="submit" value="Send"> <INPUT type="reset">
                     </P>
                     </FORM>';

                        echo $form;
                }
              /*  public function post(){
                $obj = new writeinfo;
                  $obj->write();     // $this->$login = $login_form;
               // echo $login;
              
                        }*/
        
        }
        class writeinfo  {
                   
                   
          public function write() {
           	$first =$_POST['firstname'];
          	$last= $_POST['lastname'];
          	$username=$_POST['username'];
          	$password=$_POST['password'];
          	if($first==NULL || $last==NULL || $username==NULL || $password==NULL){
            
                 
                
                 echo 'Hi please register now thanks' . "<br> \n";
                 echo'please fill in all fields'."<br> \n" ;
                 echo '<a href="bocks_bank.php?class=register">register</a>' . "<br> \n";
                 //echo '<a href="mypage_class.php?class=form2">Form 2</a>' . "<br> \n";
                 //echo '<a href="mypage_class.php">Homepage</a>' . "<br> \n";
                 
                 
                
          	}else{
          	
          	$id = $_POST['username'];
          	// $car = array('firstname', 'lastname', 'username' , 'password');
          	//// $cat = array('firstname', 'lastname', 'username' , 'password') ;
          	// $combine =  array_combine($keys,$_POST);  
           // print_r($_POST);
            // $combine[]=$car;
           //  $combine[]=$cat;
            
             if(@$handle=fopen("write/$id.csv", 'r')) {
             echo "this username is already taken";
             echo '<a href="bocks_bank.php?class=register">register now</a>' . "<br> \n";
             
             	
             }else{
          	 $id = $_POST['username'];
             //print_r($combine);
            // foreach($combine as){
             	
            // }
             $username = fopen("write/$id.csv", 'w');
             fputcsv($username ,$_POST );
             echo'you are now registerd';
             echo '<a href="bocks_bank.php?class=login">Login Now</a>' . "<br> \n";
                //print_r($combine);   
                   }
              }
          }
                   public function read_login(){
                   	$id =$_POST['username'];
                   	
                   $row = 1;
                   if (($handle = fopen("write/$id.csv", "r")) !== FALSE) {
                   	while (($record = fgetcsv($handle, 0, ",")) !== FALSE) {
                   		if($row == 1) {
                   			$keys = $record;
                   			$row++;
                  ; 			print_r($record); 
                   			
                   			$pass = $record['3']; 
                   			if($pass == $_POST['password']){
                   				$obj = new form2;
                   			}
                   		
                   		
                   			
                   	      // print_r($pass);
                   	       
                   			
                   			
                   			
                }
                   	}
                      }
                      fclose($handle);
                      //$pass = array_slice($record,3,1);
                    //  echo "$pass";
                      }
        
                     }
                            
    ?>
                                      