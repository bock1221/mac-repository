



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
                	echo "welcome to a bank<br>";
                	echo '<a href="bocks_bank.php?class=register">register now</a>' . "<br> \n";
                	//echo '<a href="mypage_class.php?class=form2">Form 2</a>' . "<br> \n";
                	echo '<a href="bocks_bank.php?class=login">Login Now</a>' . "<br> \n";
                	print_r($_POST);
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
                	//print_r($_SESSION);
                $user=$_SESSION['userinfo']; 
                	$users=$user [1];  
                        echo "hi $users are now logged in" . "<br> \n";
                        echo '<a href="bocks_bank.php?class=debitcredit">New transaction</a>' . "<br> \n";
                        echo '<a href="bocks_bank.php?class=veiw_balance">Veiw balance </a>' . "<br> \n";
                        echo '<a href="bocks_bank.php">Homepage</a>' . "<br> \n";
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
                public function get() {
                        $form = '<br>
                  <FORM action="bocks_bank.php?class=debitcredit" method="post">
                   <fieldset>
                    <LABEL for="amount">Amount: </LABEL>
                   <INPUT type="text" name="amount" id="amount"><BR>
                    <LABEL for="source">Source: </LABEL>
                   <INPUT type="text" name="source" id="source"><BR>
                     				
                    <INPUT type="radio" name="type" value="debit"> Debit<BR>
                    <INPUT type="radio" name="type" value="credit"> Credit<BR>
                  <INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
                   <INPUT type="submit" value="Send"> <INPUT type="reset">
                     </P>
                     </FORM>';

                        echo $form;
                      // session_start();
                       //print_r($_POST);
                       //session_start();
                      // print_r($_SESSION);
                }
                public function post(){ 
                	//$transactions = new transactions;
                $transactions =	new transactions;
                $transactions->addTransaction($_POST['type'],$_POST['amount'],$_POST['source']);
               print_r($_SESSION);
               
                
                
              
              
                        }
        
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
             echo'you are now registerd'. '<br>';
             echo '<a href="bocks_bank.php?class=login">Login Now</a>' . "<br> \n";
                //print_r($combine);   
                   }
              }
          }
                   public function read_login(){
                   	$id =$_POST['username'];
                   	
                  // $row = 1;
                   
                   if ((@$handle = fopen("write/$id.csv", "r")) == FALSE) { 
                   	echo 'your user name is incorrect';
                   	echo '<a href="bocks_bank.php?class=login">Login Now</a>' . "<br> \n";
                   } else{             	
                   	$record = fgetcsv($handle, 0, ","); 
                   		
                   			//$keys = $record;
                   			//$row++;
                   			//print_r($record); 
                       fclose($handle);
                   			//$pass = $record['3']; 
                   			if($record['3'] == $_POST['password']){
                   				session_start();
                   				$_SESSION['userinfo']=$record;
                   				print_r($_SESSION);
                   				//session_destroy();
                   				$obj = new form2;
                   			
                   				
                   			
                   		
                   				//session_start();
                   				//$_SESSION['userinfo'][]=$record;
                   			}else{
                   				echo 'your password is incorrect<br>';
                   				//$_REQUEST = array();
                   				$obj = new homepage; 
                   				//session_start();
                   				//$_SESSION['userinfo']=$record;
                   			}
                   		
                   		
                   			
                   	      // print_r($pass);
                   	       
                   			
                   			
                   			
                }
                   	}
                      } 
                   
                        
        
                     
                 
                     	class transaction  {
                     		
                     		public $type;
                     		public $amount;
                     		public $source;
                     		 
                     		//These are seters for the transaction properties
                     		public function setType($type) {
                     			$this->type = $type;
                     		}
                     		public function setSource($source) {
                     			$this->source = $source;
                     		}
                     		public function setAmount($amount) {
                     			$this->amount = $amount;
                     		//These are getters for the transaction
                     		}
                     		public function getType() {
                     			return $this->type;
                     		}
                     		public function getAmount() {
                     			return $this->amount;
                     		}
                     		public function getSource() {
                     			return $this->source;
                     		}
                     		//This gets the whole transaction as an array
                     		public function getTransaction() {
                     			$transaction = array();
                     			$transaction['type'] = $this->type;
                     			$transaction['amount'] = $this->amount;
                     			$transaction['source'] = $this->source;
                     			return $transaction;
                     		}
                     
                     		//This prints the transaction
                     		public function printTransaction() {
                     			echo '<hr>';
                     			echo 'Transaction type: ' .   $this->type . "<br> \n";
                     			echo 'Transaction amount: ' . $this->amount . "<br> \n";
                     			echo 'Transaction source: ' . $this->source . "<br> \n";
                     
                     		}
                     		
                     	}
                     	class transactions {
                     		//this array property contains the transactions;
                     		public $transactions = array();
                     		public function __construct() {
                     			//this starts the session when the object is instantiated.
                     			session_start();
                     	
                     		}
                     		//This is a method to add transactions;
                     		public function addTransaction($type, $amount, $source) {
                     			//This creates a new transaction
                     			$transaction = new transaction();
                     			//This sets the values for the transaction
                     			$transaction->setType($type);
                     			$transaction->setAmount($amount);
                     			$transaction->setSource($source);
                     			//$this->source=$amount;
                     			//This loads the trnasaction in the the transactions array that is stored in the session.
                     			$_SESSION['transactions'][] = $transaction;
                     			$account = new account(0);
                     			$account->run(); 
                     		}
                     		//This counts the transactions
                     		public function countTransactions() {
                     			$count = count($this->transactions);
                     	
                     			return $count;
                     		}
                     	
                     		//This prints the transactions
                     		public function printTransactions() {
                     			foreach($_SESSION['transactions'] as $transaction) {
                     				$transaction->printTransaction();
                     			}
                     
                     			}
                     		}
                     		class account {
                     			public $starting_balance ;
                     			public $current_balance;
                     			//public $transactions = array();
                     		
                     		
                     			function __construct($starting_balance) {
                     				$this->starting_balance = $starting_balance;
                     				$this->current_balance = $starting_balance;
                     			}
                     			
                     			public function run() {
                     				echo 'Starting Balance: ' . $this->starting_balance . '<br>'. "\n";
                     				foreach($_SESSION['transactions'] as $trans) { 
                     					$transaction=(array)$trans;
                     					echo $transaction['type'] . ' |  ' . $transaction['source'] . ' |   '  .  $transaction['amount'] . '<br>';
                     					if($transaction['type'] == 'debit') {
                     						$this->current_balance = $this->current_balance - $transaction['amount'];
                     					} else {
                     						$this->current_balance = $this->current_balance + $transaction['amount'];
                     					}
                     					}
                     					
                     					}	
                     		 public function __destruct() {
      echo '<br> Your starting balance was: ' . $this->starting_balance . '<br>';
      echo 'Your ending balance is: ' . $this->current_balance . '<br>';       
    }

  }
                     		
                     		 
    ?>
                                      