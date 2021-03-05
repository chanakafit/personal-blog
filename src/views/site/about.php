<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title                   = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>About</h2>
                <p>I'm currently working at <a href="https://omobio.net" target="_blank">Omobio (Pvt) Ltd</a> as an
                    Associate Technical Lead with the 5+ Years of industry experience. I do freelancing and contributing
                    to open source project at my free time. Outside of work, I'm very much interested in watching Movies
                    and TV Shows.</p>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= Yii::$app->urlManager->baseUrl ?>/theme/assets/img/about.jpg" class="img-fluid"
                         style="border-radius: 10px" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3>Software Engineer</h3>
                    <p class="font-italic">
                        I started working at Omobio as an intern and joined the company as an Software Engineer just
                        after I graduate from Faculty of IT, University of Moratuwa.
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-rounded-right"></i> <strong>Birthday:</strong> Dec 17, 1991</li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Website:</strong> <a href="#">chanakalk.com</a>
                                </li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Phone:</strong><a
                                            href="tel:94713971776"> (94) 71 3971776</a></li>
                                <li><i class="bi bi-rounded-right"></i> <strong>City:</strong> City : Colombo, LK</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul>
                                <li><i class="bi bi-rounded-right"></i> <strong>Age:</strong> <?= date( 'Y' ) - 1991 ?>
                                </li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Degree:</strong> B.Sc (Hons) in IT &
                                    Management
                                </li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Email:</strong> <a
                                            href="mailto:hello@chanakalk.com">hello@chanakalk.com</a>
                                </li>
                                <li><i class="bi bi-rounded-right"></i> <strong>Freelance:</strong> Available</li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        During my employment at Omobio I have awarded the title of <strong>Git Master</strong> in 2018
                        and 2019. Git Master is awarded for having the best use of git tool and Practices, Best
                        use of Gitlab, Best work of CI/CD, Best knowledge of version controlling throughout the year
                        2018 and 2019 consecutively at Omobio Annual award ceremony.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Skills</h2>
            </div>

            <div class="row skills-content">

                <div class="col-lg-6">
                    <h4>Languages & Frameworks</h4>

                    <div class="progress">
                        <span class="skill">PHP <i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Yii 2 | Yii 1.1<i class="val">80%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Javascript | Jquery<i class="val">40%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Reactjs <i class="val">30%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>


                    <div class="progress">
                        <span class="skill">Angular <i class="val">30%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>


                    <div class="progress">
                        <span class="skill">Laravel <i class="val">30%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <h4>Databases</h4>

                    <div class="progress">
                        <span class="skill">MySQL<i class="val">60%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Clickhouse<i class="val">50%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">SQLite <i class="val">40%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <h4>Dev Tools</h4>

                    <div class="progress">
                        <span class="skill">PhpMyAdmin <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Mysql Workbench <i class="val">75%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">GIT Lab | GitHub | Bitbucket <i class="val">85%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Linux | Ubuntu<i class="val">60%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Docker <i class="val">40%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Jenkins <i class="val">50%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">SonarQube <i class="val">50%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <h4>Other Technologies</h4>

                    <div class="progress">
                        <span class="skill">GIT <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Kafka <i class="val">50%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill">Wordpress <i class="val">70%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                 aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Skills Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Facts</h2>
                <!--                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint-->
                <!--                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia-->
                <!--                    fugiat sit in iste officiis commodi quidem hic quas.</p>-->
            </div>

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                          class="purecounter"></span>
                    <p>Years Experience</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="752" data-purecounter-duration="1"
                          class="purecounter"></span>
                    <p>Stack Overflow Reputation</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                          class="purecounter"></span>
                    <p>Awards</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1"
                          class="purecounter"></span>
                    <p>Open Source Contribution</p>
                </div>

            </div>

        </div>
    </section><!-- End Facts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
                <!--                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint-->
                <!--                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia-->
                <!--                    fugiat sit in iste officiis commodi quidem hic quas.</p>-->
            </div>

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <img src="<?= Yii::$app->urlManager->baseUrl?>/theme/assets/img/freelancer.png" class="testimonial-img" alt="">
                            <h3>Brandicon S.</h3>
                            <h4><a href="http://egypt.asatsa.com/">Asatsa</a></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Great developer! Was a complicated job to work with collecting data from 2 old sites and
                                connecting it with a totally new theme and plugins. But he never gave up and found the
                                solution. He managed to save us months of work by finding the solution and importing the
                                data. Bravo!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

</main><!-- End #main -->
