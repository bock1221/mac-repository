



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
                        echo 'register' . "<br> \n";
                        //echo '<a href="mypage_class.php?class=register">register</a>' . "<br> \n";
                        //echo '<a href="mypage_class.php?class=form2">Form 2</a>' . "<br> \n";
                        //echo '<a href="mypage_class.php">Homepage</a>' . "<br> \n";

                       
                     		$form = '<FORM action="bocks_bank.php?class=register" method="post">
                     				<P>
                     				<LABEL for="firstname">First name: </LABEL>
                     				<INPUT type="text" name="firstname" id="firstname"><BR>
                     				<LABEL for="lastname">Last name: </LABEL>
                     				<INPUT type="text" name="lastname" id="lastname"><BR>
                     				<LABEL for="email">email: </LABEL>
                     				<INPUT type="text" name="email"id="email"><BR>
                     				<LABEL for="password">password: </LABEL>
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
                     				            <p>Your email <input type="text"name="email">
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
                public function __construct() {
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
                public function post(){
                $obj = new writeinfo;
                  $obj->write();     // $this->$login = $login_form;
               // echo $login;

                        }
        
        }
        class writeinfo  {
                   
                   
          public function write() {
          	
          	$id = $_POST['email'];
          	// $car = array('firstname', 'lastname', 'username' , 'password');
          	//// $cat = array('firstname', 'lastname', 'username' , 'password') ;
          	// $combine =  array_combine($keys,$_POST);  
           // print_r($_POST);
            // $combine[]=$car;
           //  $combine[]=$cat;
            
             if(@$handle=fopen("write/$id.csv", 'r')) {
             echo "this username is already taken";	
             
             	
             }else{
          	 $id = $_POST['email'];
             //print_r($combine);
            // foreach($combine as){
             	
            // }
             $username = fopen("write/$id.csv", 'w');
             fputcsv($username ,$_POST );
                //print_r($combine);   
                   }
          }
                   public function read_login(){
                   	$id =$_POST['email'];
                   $row = 1;
                   if (($handle = fopen("write/$id", "r")) !== FALSE) {
                   	while (($record = fgetcsv($handle, 0, ",")) !== FALSE) {
                   		if($row == 1) {
                   			$keys = $record;
                   			$row++;
                   			print_r($record);
                }
                   	}
                      }
                         }
        }
                            
    ?>
                                      