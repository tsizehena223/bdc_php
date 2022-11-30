<?php
include('../includes/head.php');
require '../controllers/start_bdd.php';

?>

<title>BDC | Complétences à acquérir</title>

<body>
    <section class="section gradient-banner">
        <div class="shapes-container">
            <!-- forme arriere plan -->
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
            <div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
            <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
            <div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
            <div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
            <div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 order-2 order-md-1 text-center text-md-left">
                    <center>
                        <h2 style="color: white; ">Mes compétences à acquérir</h2> <br>
                        <a href="accueil.php#aacquérir" class="btn btn-sm btn-outline-danger">Retour</a> <br> <br>
                    </center>
                    <?php
                    $req = $bdd->prepare('SELECT * FROM bdc.skills_a_acquerir WHERE id_user = ? ORDER BY create_time DESC');
                    // $req = $bdd->prepare('SELECT * FROM bdc.skills_a_acquerir WHERE id_user = ? ORDER BY types DESC');
                    $req->execute([$_SESSION['id']]); ?>
                    <table class="table table-bordered">
                        <tr>
                            <th class="table-success">Titres</th>
                            <th class="table-danger">Types</th>
                            <th class="table-info">Descriptions</th>
                            <th class="table-warning">Date</th>
                        </tr>
                        <?php while ($result = $req->fetch()) {

                            $create_time = $result['create_time'];
                            $create_time = strtotime($create_time);

                            $date = date("D d M Y", $create_time);

                        ?>
                            <tr>
                                <th class="table-success"><small><?= $result['title'] ?></small></th>
                                <th class="table-danger"><small><?= $result['types'] ?></small></th>
                                <th class="table-info"><small><?= $result['descriptions'] ?></small></th>
                                <th class="table-warning"><small><i style="color: blue"><?= $date ?></i></small></th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php include '../includes/foot.php' ?>

    <!-- To Top -->
    <div class="scroll-top-to">
        <i class="ti-angle-up"></i>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../plugins/slick/slick.min.js"></script>
    <script src="../plugins/fancybox/jquery.fancybox.min.js"></script>
    <script src="../plugins/syotimer/jquery.syotimer.min.js"></script>
    <script src="../plugins/aos/aos.js"></script>

    <script src="../js/script.js"></script>
</body>

</html>