<?php
$combos = file_get_contents('combos.json');
$combos = json_decode($combos,true);
?>


<!--Promociones-->
                <div class="row text-center">
                    <div class="col-xs-12">
                        <h2 class="section-title">Promociones</h2>
                        <p class="parra text-muted">¿Cuál es tu hamburguesa favorita?</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <article class="promos-item">
                            <figure>
                                <a href="#promos-01" data-toggle="modal">
                                    <img src="images/promos/img-promos_01.png" alt="promos 01" class="img-responsive">
                                    <div>
                                        <span class="glyphicons glyphicons-fast-food"></span>
                                    </div>
                                </a>
                            </figure>
                            <article class="promos-caption text-center">
                                <h4>Combo 1</h4>
                                <p class="text-muted"><?php echo "$". $combos['combo1'];?></p>
                            </article>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="promos-item">
                            <figure>
                                <a href="#promos-02" data-toggle="modal">
                                    <img src="images/promos/img-promos_02.png" alt="promos 02" class="img-responsive">
                                    <div>
                                        <span class="glyphicons glyphicons-plus"></span>
                                    </div>
                                </a>
                            </figure>
                            <article class="promos-caption text-center">
                                <h4>Combo 2</h4>
                                <p class="text-muted"><?php echo "$". $combos['combo2'];?></p>
                            </article>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="promos-item">
                            <figure>
                                <a href="#promos-03" data-toggle="modal">
                                    <img src="images/promos/img-promos_03.png" alt="promos 03" class="img-responsive">
                                    <div>
                                        <span class="glyphicons glyphicons-fast-food"></span>
                                    </div>
                                </a>
                            </figure>
                            <article class="promos-caption text-center">
                                <h4>Combo 3</h4>
                                <p class="text-muted"><?php echo "$". $combos['combo3'];?></p>
                            </article>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="promos-item">
                            <figure>
                                <a href="#promos-04" data-toggle="modal">
                                    <img src="images/promos/img-promos_04.png" alt="promos 04" class="img-responsive">
                                    <div>
                                        <span class="glyphicons glyphicons-fast-food"></span>
                                    </div>
                                </a>
                            </figure>
                            <article class="promos-caption text-center">
                                <h4>Combo 4</h4>
                                <p class="text-muted"><?php echo "$". $combos['combo4'];?></p>
                            </article>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="promos-item">
                            <figure>
                                <a href="#promos-05" data-toggle="modal">
                                    <img src="images/promos/img-promos_05.png" alt="promos 05" class="img-responsive">
                                    <div>
                                        <span class="glyphicons glyphicons-fast-food"></span>
                                    </div>
                                </a>
                            </figure>
                            <article class="promos-caption text-center">
                                <h4>Combo 5</h4>
                                <p class="text-muted"><?php echo "$". $combos['combo5'];?></p>
                            </article>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <article class="promos-item">
                            <figure>
                                <a href="#promos-06" data-toggle="modal">
                                    <img src="images/promos/img-promos_06.png" alt="promos 06" class="img-responsive">
                                    <div>
                                        <span class="glyphicons glyphicons-fast-food"></span>
                                    </div>
                                </a>
                            </figure>
                            <article class="promos-caption text-center">
                                <h4>Combo 6</h4>
                                <p class="text-muted"><?php echo "$". $combos['combo6'];?></p>
                            </article>
                        </article>
                    </div>
                </div>