<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-mail | 404 </title>
    <link rel="icon" href="assets/img/logo/Icon.png" type="image/x-icon" />
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f2f6;
            background-image: linear-gradient(315deg, #f1f2f6 0%, #c9c6c6 74%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container for the 404 error page */
        #errorContainer {
            text-align: center;
            max-width: 500px;
            padding: 20px;
            /* background-color: white; */
            border-radius: 10px;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
        }

        /* Wrapper for the content */
        #contentWrapper {
            padding: 20px;
        }

        /* Image Styling */
        #errorImage {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Heading Styling */
        #errorTitle {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }

        /* Text styling */
        #errorMessage {
            font-size: 16px;
            color: #777;
            margin-bottom: 20px;
        }

        /* Button Wrapper */
        #buttonWrapper {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        /* Button Styling */
        .btn {
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            color: white;
        }

        #homeButton {
            background-color: #333;
        }

        #contactButton {
            background-color: #007bff;
        }

        /* Hover effect for buttons */
        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    <div id="errorContainer" class="error-container">
        <div id="contentWrapper" class="content-wrapper">
            <img id="errorImage" src="/assets/img/404.png" alt="404 Image" class="error-image">
            <h2 id="errorTitle">Page Not Found</h2>
            <p id="errorMessage" class="error-text">Sorry, the page you're looking for doesn't exist. You can return to
                the homepage or contact us if you need help.</p>
            <div id="buttonWrapper" class="button-wrapper">
                <a href="/" id="homeButton" class="btn home-btn">Go Home</a>
                <a href="/contact" id="contactButton" class="btn contact-btn">Contact Us</a>
            </div>
        </div>
    </div>

</body>

</html>