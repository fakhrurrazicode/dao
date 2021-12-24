<div class="bg-wrapper blue-mask" style="background-image: url('<?php echo base_url() . 'assets/theme/dist/img/bg-1.png' ?>');">
    <div id="proposal-page" class="py-5">



        <div class="container">

            <?php

            function time_elapsed_string($datetime, $full = false)
            {
                date_default_timezone_set('Asia/Jakarta');
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);

                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                );
                foreach ($string as $k => &$v) {
                    if ($diff->$k) {
                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                    } else {
                        unset($string[$k]);
                    }
                }

                if (!$full) $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . ' ago' : 'just now';
            }

            ?>

            <?php if ($this->session->flashdata('flash')) : ?>

                <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                    Proposal has been <?= $this->session->flashdata('flash') ?> successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php endif; ?>

            <?php if (validation_errors()) : ?>

                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>

            <?php endif; ?>

            <div class="mb-3 d-flex align-items-center bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h1 class="text-white fw-bolder display-2">Proposals</h1>
                </div>
                <div class="p-2 bd-highlight" id="div_btn_create" style="display: none;">
                    <a href="<?= base_url() ?>proposal/add" type="button" class="px-4 btn btn-primary">Create</a>
                </div>
                <div class="p-2 bd-highlight">
                    <button class="px-4 btn btn-red text-dark btn-lg" id="btn-login">Connect</button>
                </div>
            </div>

            <div id="proposal-cards">
                <?php foreach ($proposals as $proposal) : ?>
                    <div id="proposal-card" class="border border-2 border-white rounded-3 px-4 py-4 mb-5 text-white">

                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h5 class="my-0"><span class="bg-purple text-white px-4 py-3 d-block text-start fw-medium rounded-3"><?= $proposal['title'] ?></span></h5>
                            </div>
                            <div class="col-sm-6 mt-3 mt-lg-0">
                                <div class="px-4">
                                    <h5 class="my-0"><small><?= time_elapsed_string($proposal['created_at']) ?></small></h5>
                                    <p class="my-0 fw-light"><small><?= "by " . $proposal['publisher']  ?></small></p>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12">
                                <div class="border-bottom border-2 border-white my-4"></div>
                            </div>
                            <div class="col-sm-10">
                                <p class="my-0 px-4 h5 fw-medium"><?= strlen($proposal['description']) > 120 ? substr($proposal['description'], 0, 120) . "..." : $proposal['description']  ?></p>
                            </div>
                            <div class="col-sm-2 text-end">
                                <?php date_default_timezone_set('Asia/Jakarta');
                                if (new DateTime() > new DateTime($proposal['end_date'])) : ?>
                                    <span class="px-3 py-2 badge rounded-pill" style="background: #990000;">Closed</span>
                                <?php else : ?>
                                    <span class="px-3 py-2 badge rounded-pill" style="background: #4cbb17;">Open</span>
                                <?php endif; ?>
                            </div>
                        </div>



                    </div>

                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div>