<div class="bg-wrapper" style="background-image: url('<?php echo base_url() . 'assets/theme/dist/img/bg-2.png' ?>');">
    <div class="container">

        <?php

        function dateDiff($mDate)
        {
            date_default_timezone_set('Asia/Jakarta');
            $datetime1 = new DateTime();
            $datetime2 = new DateTime($mDate);

            $interval = date_diff($datetime1, $datetime2);

            if ((int) $interval->format('%d') > 0) {
                return $interval->format('%d days');
            } elseif ((int) $interval->format('%h') > 0) {
                return $interval->format('%h hours');
            } else {
                return $interval->format('%i minutes');
            }
        }

        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body" id="modal_body">
                        ...
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 mb-3 d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">

            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-sm-8">
                <h1 class="fw-bold text-blue"><?= $proposal['title'] ?></h1>
            </div>
            <div class="col-sm-4 text-center text-sm-end">
                <button class="px-4 btn btn-teal text-white" id="btn-login">Connect</button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <p class="mb-4 text-muted opacity-50" style="font-size: 16px"><?php echo !$is_close ? 'Ends in ' . dateDiff($proposal['end_date']) : ''; ?></p>
            </div>
            <?php if ($is_close) : ?>
                <div class="col-sm-6 text-center text-sm-end">
                    <span class="mb-2 px-3 py-2 badge rounded-pill" style="background: #990000; font-size: .8em">Closed</span>
                </div>
            <?php endif ?>
            <div class="col-sm-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <p class="mb-5 h1 display-5 fw-bold text-blue"><?= $proposal['description'] ?></p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <?php if (!$is_close) : ?>
                    <form id="form_vote" action="" method="post">
                        <input type="hidden" name="proposal_id" id="proposal_id" value="<?= $proposal['id'] ?>" />

                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <?php for ($x = 0; $x < count($options); $x++) : ?>
                                <div class="flex-fill">
                                    <input type="radio" class="btn-check" name="flexRadioDefault" autocomplete="off" id="<?= $options[$x]['id'] ?>" value="<?= $options[$x]['id'] ?>">
                                    <label class="btn btn-outline-primary d-block mx-1 py-3" for="<?= $options[$x]['id'] ?>"><?= $options[$x]['opt'] ?></label>
                                </div>
                            <?php endfor; ?>
                        </div>

                        <input type="hidden" value="" id="user_addr" name="user_addr">
                        <input type="hidden" value="" id="user_voting_power" name="user_voting_power">

                        <div class="d-flex justify-content-center align-items-center">
                            <button id="btn_submit_vote" type="button" onclick="submitVote()" class="px-5 mx-1 rounded-2 btn btn-pink w-100 btn-lg m-btn-submit">Submit</button>
                        </div>
                    </form>
                <?php endif ?>
            </div>
        </div>





        <?php if (count($votes) > 0) : ?>

            <div class="mt-5 card border-0 bg-transparent">
                <div class="card-header bg-transparent text-blue fw-bold border-2 border-blue px-1">
                    Result
                </div>
                <div class="card-body px-0">
                    <ul class="list-group list-group-flush">
                        <?php for ($x = 0; $x < count($votingPoints); $x++) : ?>

                            <div class="d-flex align-items-center bd-highlight">
                                <div class="flex-grow-1 bd-highlight fw-bold text-blue">
                                    <?= $votingPoints[$x]['opt'] ?>
                                </div>
                                <div class="bd-highlight text-blue">
                                    <?= $votingPoints[$x]['point'] . ' - ' . $votingPoints[$x]['percentage'] . '%' ?>
                                </div>
                            </div>

                            <div class="mt-1 mb-2 progress">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $votingPoints[$x]['percentage'] ?>%; background-color: #b642f5" aria-valuenow="<?= $votingPoints[$x]['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <?php endfor; ?>
                    </ul>
                </div>
            </div>

            <div class="mt-3 card border-0 bg-transparent">
                <div class="card-header bg-transparent text-blue fw-bold border-2 border-blue px-2">
                    <?= count($votes) ?> votes
                </div>
                <div class="card-body px-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-pink">Token</th>
                                <th class="text-pink text-center">SuperlativeSS</th>
                                <th class="text-pink text-end">Vote</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($votes as $vote) : ?>
                                <tr>
                                    <td><?= $vote['holder_addr'] ?></td>
                                    <td class="text-center"><?= " ( " . $vote['voting_power'] . " SuperlativeSS )" ?></td>
                                    <td class="text-end"><?= $vote['opt'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        <?php endif; ?>

    </div>
</div>