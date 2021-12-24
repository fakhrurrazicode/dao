<div class="bg-wrapper" style="background-image: url('<?php echo base_url() . 'assets/theme/dist/img/bg-2.png' ?>');">
    <div class="container py-5">




        <div class="row align-items-center">
            <div class="col-sm-8">
                <div class="my-3 d-flex align-items-center bd-highlight">
                    <div class="p-2 bd-highlight">
                        <a href="<?= base_url() ?>" class="text-blue">
                            <i class="fa-solid fa-arrow-left fa-2x"></i>
                        </a>
                    </div>
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <h1 class="text-blue">Create Proposal</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center text-sm-end">

                <button class="px-4 btn btn-teal text-white" id="btn-login">Connect</button>
            </div>
        </div>

        <?php if ($this->session->flashdata('flash')) : ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Proposal has been <?= $this->session->flashdata('flash') ?> successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>

        <?php if (validation_errors()) : ?>

            <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
            </div>

        <?php endif; ?>

        <div class="card border-0 shadow-lg">
            <div class="card-body px-5 py-5">
                <form id="form_add_proposal" action="" method="POST">
                    <div class="mb-3">
                        <div class="form-group"> <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-group"> <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="5" aria-label="With textarea" id="description"></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group"> <label for="option" class="form-label">Choices</label>
                            <div class="d-flex align-items-center bd-highlight">
                                <div class="flex-grow-1 bd-highlight">
                                    <div class="form-text">Click "Add" button to add new choice.</div>
                                </div>
                                <div class="ms-3 bd-highlight">
                                    <input class="add px-4 btn btn-secondary" type="button" id="btn_option" value="Add">
                                </div>
                                <div class="ms-3 bd-highlight">
                                    <input class="clear btn btn-light" type="button" id="btn_option" value="Clear All">
                                </div>
                            </div>
                        </div>

                        <div id="new_chq"></div>
                        <input type="hidden" value="1" id="total_chq">

                        <input type="hidden" value="" id="user_addr" name="user_addr">

                    </div>

                    <div class="mb-3">
                        <div class="form-group"> <label for="end_date" class="form-label">End Date</label>
                            </br>
                            <input id="end_date" name="end_date" width="312" />
                        </div>
                    </div>

                    </br>
                    <button id="btn_add_proposal" type="button" onclick="addProposal()" class="px-5 btn btn-primary btn-lg rounded-pill">Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>