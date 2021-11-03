<html>
<head>
    <title> Home </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="styleAndScripts/css/ZippyBooksStyle.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styleAndScripts/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="styleAndScripts/css/style.css" type="text/css">
</head>
<body>
    <div class="left-div"> 
        <div class="form-popup-II" id="myForm">
                <form action="" class="form-container">
                    <h1>Delete Book</h1>
                    <div>
                    <label>Book Title: </label>
                    <span id="firstName-info" class="info"></span>
                </div>
                <div>
                    <input type="text" id="firstName" name="firstName" class="inputBox" />
                </div>
                  <button type="submit" class="btn btn-danger">Login</button>
                  <button type="button" class="btn btn-danger" onclick="closeForm()" >Close</button>
                </form>
            </div>
        <div class="d-flex justify-content-md-center align-items-center vh-100"> 
            <div class="container-fluid"  style="overflow: hidden;">
                <p class="title"> ZippyBooks </p>
                <form>
                    <a type="button" href="showInfo.php" class="btn btn-primary-1">Print Books</a>
                    <button type="button" class="btn btn-primary-2" id="contact-icon">Add New Book</button>
                    <button type="button" class="btn btn-primary-1" id="contact-nukeButton" name ="contact-nukeButton">Change Price</button>
                    <button type="button" class="btn btn-primary-2" onclick="openForm()">Delete Book</button>
                </form>
            </div>
        </div>
    </div>
    <div class="right-div text-center" style="font-family:Roboto; color:white; font-size:20px;"> 
        <div class="container-fluid">
            <p> Quotes of the day...</p>
        </div>
    </div>
    <div id="contact-popup">
        <form class="contact-form" action="getInfo.php" id="contact-form" method="post" enctype="multipart/form-data">
            <h1>Enter New Book</h1>
            <div>
                <div>
                    <label>Title: </label>
                    <span id="firstName-info" class="info"></span>
                </div>
                <div>
                    <input type="text" id="firstName" name="firstName" class="inputBox" />
                </div>
            </div>
            <div>
                <div>
                    <label>Prince: </label>
                    <span id="lastName-info" class="info"></span>
                </div>
                <div>
                    <input type="text" id="lastName" name="lastName" class="inputBox" />
                </div>
            </div>
            
            <div>
                <div>
                    <label>Quantity: </label><span id="userEmail-info" class="info"></span>
                </div>
                <div>
                    <input type="text" id="userEmail" name="userEmail" class="inputBox" />
                </div>
            </div>
            <div>                
                <button type="submit" class="btn btn-primary" id="sendUser" name="sendUser">Submit</button>
                <button type="button" id="closePopup" class="btn btn-danger">Close</button>
            </div>
        </form>
    </div>

    <div id="contact-nuke-popup">
        <form class="contact-form" action="getInfo.php" id="contact-form" method="post" enctype="multipart/form-data">
            <h1>Delete Book</h1>
            <div>
            <div>
                <div>
                    <label>Book Title: </label>
                    <span id="email-info" class="info"></span>
                </div>
                <div>
                    <label>Price: </label>
                    <span id="email-info" class="info"></span>
                </div>
                <div>
                    <input type="text" id="email" name="email" class="inputBox" />
                </div>
            </div>
                <button type="submit" class="btn btn-primary" id="nukeUser" name="nukeUser">Change Price</button>
                <button type="button" id="closeNukePopup" class="btn btn-danger">Close</button>
            </div>
        </form>
    </div>
    
</body>
</html>

<script>
    $(document).ready(function () 
    {
        // show contact form on click 
        $("#contact-icon").click(function () 
        {
            $("#contact-popup").show();
        });

        $("#contact-nukeButton").click(function () 
        {
            $("#contact-nuke-popup").show();
        });
        
        $("#contact-changePrice").click(function () 
        {
            $("#contact-change-popup").show();
        });
        // hide contact form on click 
        $("#closePopup").click(function () 
        {
            $("#contact-popup").hide();
        });

        $("#closeNukePopup").click(function () 
        {
            $("#contact-nuke-popup").hide();
        });

        $("#closeChangePrice").click(function () 
        {
            $("#contact-change-popup").hide();
        });
    }
    );
</script>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>