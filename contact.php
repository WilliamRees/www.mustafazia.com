<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mustafa Zia | Contact</title>
        <meta name="description" content="#TODO">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/contact.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script>
            var listing_lat = 43.591820;
            var listing_lng = -79.645337;
        </script>        
    </head>
    <body id="Contact-Page">

        <?php include 'header.php';?>

        <div id="TopBanner">
            <div class="inner-wrapper">
                <h1>Contact Mustafa Zia</h1>
            </div>
            <div class="blind"></div>
        </div>

        <section id="ContentBody">

            <div class="inner-wrapper">
                <div class="left">
                    <div class="cms-content" data-nodename="Contact">
                        <?php CMSUtility::ContentLiteral("Contact"); ?>
                    </div>       
                </div>

                <div class="right">
                    <div class="cms-content" data-nodename="ContactRight">
                        <?php CMSUtility::ContentLiteral("ContactRight"); ?>
                    </div>
                    <div class="form-wrapper">

                        <div id="FormError"></div>

                        <form id="ContactForm">
                            <div>
                                <label for="f-name">Name:*</label>
                                <input data-required="true" type="text" name="f-name" id="f-name">
                                <span>^ you must provide a valid name</span>
                            </div>
                            <div>
                                <label for="f-phone">Phone Number:*</label>
                                <input data-required="true" type="text" name="f-phone" id="f-phone">
                                <span>^ you must provide a valid phone number</span>            
                            </div>                
                            <div>
                                <label for="f-email">E-mail:*</label>
                                <input data-required="true" type="email" name="f-email" id="f-email">
                                <span>^ you must provide a valid email</span>            
                            </div>
                            <div>
                                <label for="f-message">Your Message:*</label>
                                <textarea data-required="true" id="f-message" name="f-message" rows="3" cols="50"></textarea>
                                <span>^ you must enter a valid message</span>
                            </div>
                            <small>* Required Fields</small>
                            <input id="f-send" type="submit" class="btn-round" value="Send">
                            <div id="FormSuccess"></div>
                        </form>
                    </div>
                </div>        
            </div>
            
        </section>

        <div id="Map">
        </div>     
        
        <?php include 'footer.php';?>

        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>  
        <script src="js/main.js"></script>

        <script type="text/javascript">
            $(document).ready(function() { mustafazia.contact.init(); });
        </script>
    </body>
</html>
