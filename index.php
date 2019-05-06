<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Lest chat</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700,300'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css'>
<link rel='stylesheet' href='https://rawgit.com/marvelapp/devices.css/master/assets/devices.min.css'>

      <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  
</head>

<body>
  <div class="container-fluid" style="padding-top: 20px;">
      <div class="row">
        <div class="col-md-4">
          <div class="sidebar">
            <div class="status-bar" style="padding: 5px;">
                 <span><i class="fas fa-cog"></i></span><span style="color: black;font-size: 15px;font-weight: 600">&nbsp&nbspSETTINGS</span>
            </div>
            <div class="user-bar"><span class="name">ACTIVE USERS</span></div>

            <?php 
            // this php script is for connecting with database 
            // data have to fetched from local server 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "form";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $query = "SELECT Name FROM sign_up"; 
            // mysql_query will execute the query to fetch data 
            if ($is_query_run = mysqli_query($conn,$query)) 
            { 
                // echo "Query Executed"; 
                // loop will iterate until all data is fetched 
                while ($query_executed = mysqli_fetch_assoc ($is_query_run)) 
                {   
                    $name=$query_executed['Name'];
                    echo '<table>
                      <tr>
                        <th>
                        <img src="https://picsum.photos/50/50/?random"/>&nbsp&nbsp'.$name.'<button onclick="openbox();" style="float:right;padding:10px;border:none;outline:0;background-color:transparent"><i class="zmdi zmdi-mail-send" style="color:white"></i></button>
                        <th>
                      </tr>
                    </table>';

                }

            } 
            else
            { 
                echo "Error in execution"; 
            } 

            ?> 
        </div>
      </div>


<script type="text/javascript">
  function openbox(){
    document.getElementById('closechat').style.display="block";
    document.getElementById('bgtext').style.display="none";
  }
</script>

<!-- ------------------------------side bar table style-------------------------------------------------------------------- -->
<style type="text/css"> 
  table{
                width: 100%;
                text-align: justify;
                font-family: sans-serif;
                font-size: 20px;
                margin-bottom: 5px;
                border: 2px solid green;
                height: 100%;
                background:rgb(0,0,0,.3);

            }

</style>
<!--  -------------------------------------end-------------------------------------------------------------->




         
        <div class="col-md-8">
          <div class="main">
                <div class="status-bar">
                  <div class="time" style="color: white"></div>
                  
                </div>
                <div class="letschat" id="bgtext" style="display: block;background: rgb(0,0,0,0.5);width: 500px;height: 600px;margin: 0 auto;">
                  <h1 style="font-size: 50px;color: lightblue;text-align: center;padding-top: 100px;" >This is Lets Chat</h1>
                  <img style="margin-left: 100px;margin-top: 50px;" src="https://www.changehealthcare.com/images/default-source/icons/imaging_and_workflow_-_why_we_help_icon_stroke.png?sfvrsn=592b4b03_0">
                </div>
                <div class="chat" id="closechat" id="openbox"style="display: none;">                 
                  <div class="chat-container">
                        <div class="user-bar">
                          <div class="back" onclick="closechat()" style="cursor: pointer;">
                            <i class="zmdi zmdi-arrow-left"></i>
                          </div>
                          <div class="avatar">
                            <img src="https://picsum.photos/36/36/?random" alt="Avatar">
                          </div>
                          <div class="name">
                            <span><?php echo "$name"?></span>
                            <span class="status">online</span>
                          </div>
                          <div class="actions more">
                            <i class="zmdi zmdi-more-vert" ></i>
                          </div>
                        </div>
                        <div class="conversation">
                          <div class="conversation-container" >
                            
                          </div>
                              <form class="conversation-compose">
                                  <div class="emoji">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" id="smiley" x="3147" y="3209"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.153 11.603c.795 0 1.44-.88 1.44-1.962s-.645-1.96-1.44-1.96c-.795 0-1.44.88-1.44 1.96s.645 1.965 1.44 1.965zM5.95 12.965c-.027-.307-.132 5.218 6.062 5.55 6.066-.25 6.066-5.55 6.066-5.55-6.078 1.416-12.13 0-12.13 0zm11.362 1.108s-.67 1.96-5.05 1.96c-3.506 0-5.39-1.165-5.608-1.96 0 0 5.912 1.055 10.658 0zM11.804 1.01C5.61 1.01.978 6.034.978 12.23s4.826 10.76 11.02 10.76S23.02 18.424 23.02 12.23c0-6.197-5.02-11.22-11.216-11.22zM12 21.355c-5.273 0-9.38-3.886-9.38-9.16 0-5.272 3.94-9.547 9.214-9.547a9.548 9.548 0 0 1 9.548 9.548c0 5.272-4.11 9.16-9.382 9.16zm3.108-9.75c.795 0 1.44-.88 1.44-1.963s-.645-1.96-1.44-1.96c-.795 0-1.44.878-1.44 1.96s.645 1.963 1.44 1.963z" fill="#7d8489"/></svg>
                                  </div>
                                <input class="input-msg" name="input" placeholder="Type a message" autocomplete="off" autofocus></input>

                                  <button class="send">
                                    <div class="circle">
                                      <i class="zmdi zmdi-mail-send"></i>
                                    </div>
                                  </button>
                              </form>
                        </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js'></script>

  

    <script  src="js/index.js"></script>

<!-- -------------------------------------------------close chat------------------------------------------------------------- -->
<script type="text/javascript">
  
  function closechat(id){
    document.getElementById("closechat").style.display="none";
    document.getElementById('bgtext').style.display="block";
  }
</script>
<!-- -------------------------------------------------close chat end------------------------------------------------------------- -->



</body>

</html>
