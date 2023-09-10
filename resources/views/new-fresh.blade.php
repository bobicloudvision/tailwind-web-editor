<html>
<head>

    <link webesembly:head-links="true"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;700" rel="stylesheet">

</head>

<body>

<style>
    html {
        margin: 0px;
        padding: 0px;
    }

    body {
        background: #2c2c2c;
        color: #ffffff;
        font-family: 'Montserrat', sans-serif;

    }

    header {
        margin-bottom: -150px;
        z-index: 100;
        position: absolute;
        width:100%;
    }

    footer {
        padding: 100px;
        background: #323436;
        text-transform: uppercase;
    }
    .navbar-brand {
        font-weight: 700;
        font-size: 31px;
        color:#fff;
    }
    .nav-link {
        color: #fff;
        font-weight: 300;
        font-size: 16px;
    }
    .navbar-nav .nav-link.active, .navbar-nav .nav-link.show {
        color: #fff;
        border-bottom:2px solid #fff;
    }
</style>

<header webesembly:section="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container" style="padding: 20px 0px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between gap-3" id="navbarTogglerDemo02">
                <a class="navbar-brand" href="#">Your Site Title</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex justify-content-center align-items-center" role="search">
                    <button class="btn btn-dark" style="border-radius:0px;width:150px;height:50px" type="submit">Join Now</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<div webesembly:page="homepage">

    <section webesembly:section="hero1" style="
    background-image: url('bg1.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  height: 100%;
">


        <div style="position: absolute; z-index: 0; top: 0px; left: 0px; width: 100%; height: 100%; opacity: 1; pointer-events: none; mix-blend-mode: normal; background-color: rgba(9,9,9,0.38);">

        </div>


        <div webesembly:flex-grid="true">

            <div webesembly:flex-grid-element="5 / 3 / 7 / 13">
                <div webesembly:editable="true">
                    <h1>
                        Welcome to my website.
                    </h1>
                </div>
            </div>

            <div webesembly:flex-grid-element="7 / 3 / 9 / 13">
                <div webesembly:editable="true">
                    <h2>
                        We are a company that does things.
                    </h2>
                </div>
            </div>

            <div webesembly:flex-grid-element="10 / 3 / 12 / 6">
                <button type="button" class="btn btn-dark">
                    View Gallery
                </button>
            </div>

        </div>

    </section>


    <section webesembly:section="hero2" style="
    background-image: url('bg2.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
   height: 100%;
">

        <div style="position: absolute; z-index: 0; top: 0px; left: 0px; width: 100%; height: 100%; opacity: 1; pointer-events: none; mix-blend-mode: normal; background-color: rgba(9,9,9,0.5);"></div>


        <div webesembly:flex-grid="true">

            <div webesembly:flex-grid-element="5 / 3 / 7 / 13">
                <div webesembly:editable="true">
                    <h1>
                    Welcome to my website.
                    </h1>
                </div>
            </div>

            <div webesembly:flex-grid-element="7 / 3 / 9 / 13">
                <div webesembly:editable="true">
                    <h2>
                        We are a company that does things.
                    </h2>
                </div>
            </div>

            <div webesembly:flex-grid-element="14 / 3 / 16 / 6">
                <button type="button" class="btn btn-dark">
                    View Gallery
                </button>
            </div>

        </div>

    </section>

    <section webesembly:section="contact-us">

        <div webesembly:flex-grid="true">

            <div webesembly:flex-grid-element="4 / 2 / 6 / 13">
                <div webesembly:editable="true">
                    <h1>
                        Contact with us
                    </h1>
                </div>
            </div>

            <div webesembly:flex-grid-element="4 / 12 / 18 / 21">
                <div webesembly:editable="true">
                    <p>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=628&amp;height=400&amp;hl=en&amp;q=Sofia Momino Venche 23&amp;t=p&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">

                            </iframe>
                        </div>
                        <style>
                            .mapouter{position:relative;text-align:right;width:100%;height:100%;}
                            .gmap_canvas {overflow:hidden;background:none!important;width:100%;height:100%;}
                            .gmap_iframe {height:100%!important;}
                        </style>
                    </div>
                    </p>
                </div>
            </div>

            <div webesembly:flex-grid-element="6 / 2 / 17 / 11">
                <div webesembly:editable="true">
                    <h4>We value open
                        communication and excellent customer service. Reach us at:
                    </h4>
                    <ul>
                        <li>
                            <p>Phone: 1-800-XYZ-1234 (Mon-Fri, 9:00 AM to
                                5:00 PM)
                            </p>
                        </li>
                        <li><p>Email: info@yoursitetitle.com (respond within
                                24 hours, excluding weekends and holidays)</p></li>
                        <li><p>Contact Form: Fill out form on our website</p>
                        </li>
                        <li><p>Social Media: Follow us on Facebook,
                                Instagram, and Twitter</p></li>
                        <li><p>Visit Our Office: Schedule an appointment at
                                123 Main Street, Your City, State, ZIP.</p></li>
                    </ul>
                    <p>Our team is dedicated to your
                        satisfaction and timely support. Thank you!
                    </p>
                </div>
            </div>

            <div webesembly:flex-grid-element="17 / 2 / 19 / 5">
                <div webesembly:editable="true">
                    <button type="button" class="btn btn-dark">View Gallery</button>
                </div>
            </div>

        </div>

    </section>


</div>


<footer webesembly:section="footer">
    This is my footer
</footer>

</body>
</html>
