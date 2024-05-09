<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HAMJAIU-CONTACT US</title>
    <?php require ("./inc/links.php") ?>

    <style>
        .box {
            border-top-color: aqua !important;
        }
    </style>

    <!-- swipper carosal  -->
</head>

<body class="bg-light">
    <div class="container-fluid bg-white">
        <div class="container">
            <?php require ("./components/header.php") ?>
        </div>
    </div>
    <!-- contact us   -->
    
    <div class="my-5 px-4">
        <h2 class="mt-4 mb-1 pt-4 text-center font-bold merinda">CONTACT US</h2>
        <div class="h-line bg-dark mb-5"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nemo
            animi, ex maxime doloribus non voluptas dignissimos nam facere
            blanditiis.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 shadow-none">
                <div class="bg-white p-3">
                    <iframe class="w-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.3305135140567!2d89.20562237533656!3d23.77124207865617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe93815479b2f1%3A0xc77c023655d40590!2sHamja%20Innovative%20Unix!5e0!3m2!1sen!2sbd!4v1714639378794!5m2!1sen!2sbd"
                        height="450" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <h5>Address</h5>
                    <i class="bi bi-geo-alt-fill pe-1"></i><a href="https://maps.app.goo.gl/GBGiAR7UkJ5G1NGB7"
                        class="d-inline block text-decoration-none text-dark" target="_blank">Panti
                        Kumarkhail,kushtia</a><br>

                    <a class="d-inline block text-decoration-none text-dark" href="tel:+01626699">
                        <i class="bi bi-telephone-fill"></i> +01626699
                    </a><br>

                    <a class="d-inline-block text-decoration-none text-dark" href="tel:+01626699">
                        <i class="bi bi-twitter-x pe-1"></i>Twitter </a><br />
                    <a class="d-inline-block text-decoration-none text-dark" href="tel:+01626699">
                        <i class="bi bi-facebook pe-1"></i>Facebook </a><br />

                    <a class="d--block text-decoration-none text-dark" href="tel:+01626699">
                        <i class="bi bi-linkedin pe-1"></i> Linkdin</a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 shadow-none">
                <div class="p-3 mb-3 bg-white rounded">
                    <h3>Send a message</h3>
                    <div class="mb-3">
                        <label for="name_contact" class="form-label">Name</label>
                        <input type="text" class="form-control shadow-none" id="name_contact"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email_contact" class="form-label">Email</label>
                        <input type="email" class="form-control shadow-none" id="email_contact"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="subject_contact" class="form-label">Subject</label>
                        <input type="text" class="form-control shadow-none" id="subject_contact"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="subject_contact" class="form-label">Subject</label>


                        <textarea class="form-control" rows="2" aria-label="With textarea"></textarea>

                    </div>

                    <button type="button" class="btn  custom_bg me-lg-3 me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
        <?php require ("components/footer.php"); ?>
</body>

</html>