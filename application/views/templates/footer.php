<script>
    $('#end_date').datetimepicker({
        footer: true,
        modal: true
    });

    // ======================================

    $('.add').on('click', add);
    $('.remove').on('click', remove);
    $('.clear').on('click', clear);

    function add() {
        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = "<input class='mt-2 form-control' type='text' id='new_" + new_chq_no + "' name='choices[]'>";

        $('#new_chq').append(new_input);

        $('#total_chq').val(new_chq_no);
    }

    function remove() {
        var last_chq_no = $('#total_chq').val();

        if (last_chq_no > 1) {
            $('#new_' + last_chq_no).remove();
            $('#total_chq').val(last_chq_no - 1);
        }
    }

    function clear() {
        let last_chq_no = $('#total_chq').val();

        if (last_chq_no > 1) {

            for (let i = 2; i <= last_chq_no; i++) {
                $('#new_' + i).remove();
            }

            $('#total_chq').val(1);
        }
    }

    // ==================================================================

    const serverUrl = "https://rzetrannh8bc.usemoralis.com:2053/server";
    const appId = "fSOQIim8OSyN6heheoKg91LEaslind6xTCkcOyBL";
    Moralis.start({
        serverUrl,
        appId
    });

    let tokenAmount = 0;

    let user = Moralis.User.current();
    if (user) {
        syncUser(user);
    }

    function btnConnectClicked() {
        const btnLogin = document.getElementById("btn-login");

        if (btnLogin.innerText == "Connect") {
            login();
        } else {
            logOut();
        }
    }

    async function login() {
        let user = Moralis.User.current();
        if (!user) {
            
            let details = navigator.userAgent;
            let regexp = /android|iphone|kindle|ipad/i;
            let isMobileDevice = regexp.test(details);
            
            if (isMobileDevice) {
                user = await Moralis.authenticate({
                        signingMessage: "Log in to superlativesecretsociety.com",
                        provider: "walletconnect",
                        mobileLinks: [
                            "metamask",
                            "trust",
                            "walletlink",
                        ]
                    })
                    .then(function(user) {
                        console.log("logged in user:", user);
                        console.log(user.get("ethAddress"));

                        syncUser(user);
                    })
                    .catch(function(error) {
                        console(error);
                    });
            } else {
                user = await Moralis.authenticate({
                        signingMessage: "Log in to superlativesecretsociety.com",
                    })
                    .then(function(user) {
                        console.log("logged in user:", user);
                        console.log(user.get("ethAddress"));

                        syncUser(user);
                    })
                    .catch(function(error) {
                        console(error);
                    });
            }
            
            // user = await Moralis.authenticate({
            //         signingMessage: "Log in to superlativesecretsociety.com"
            //     })
            //     .then(function(user) {
            //         console.log("logged in user:", user);
            //         console.log(user.get("ethAddress"));

            //         syncUser(user);
            //     })
            //     .catch(function(error) {
            //         console(error);
            //     });
        } else {
            syncUser(user);
        }

    }

    async function syncUser(user) {
        const userAddr = user.get("ethAddress");

        let userAddrAbbr = userAddr.substring(0, 4) + "..." + userAddr.slice(-4);
        // alert(userAddrAbbr);

        // document.getElementById("user_addr").value = userAddr;
        $('#user_addr').val(userAddr);

        // change login button to address
        document.getElementById("btn-login").innerText = userAddrAbbr;
        document.getElementById("btn-login").className = "px-4 btn btn-outline-primary";


        const userEthNFTs = await Moralis.Web3.getNFTs();

        // console.log(userEthNFTs);

        const result = userEthNFTs.filter(
            (nft) =>
            nft["token_address"] ==
            "0xa7ee407497b2aeb43580cabe2b04026b5419d1dc"
        );

        // console.log(result);

        const tokenIds = [];

        result.forEach(function(nft) {
            tokenIds.push(nft.token_id);
        });

        console.log(tokenIds);

        $('#user_voting_power').val(tokenIds.length);

        tokenAmount = tokenIds.length;

        $.get(
            "<?= base_url(); ?>admin/is_admin/" + userAddr,
            function(data) {
                var x = document.getElementById("div_btn_create");
                if (data == 1) {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        );
    }

    async function logOut() {
        await Moralis.User.logOut();
        console.log("logged out");

        document.getElementById("btn-login").innerText = "Connect";
        document.getElementById("btn-login").className = "px-4 btn btn-primary";

        document.getElementById("div_btn_create").style.display = "none";
    }

    document.getElementById("btn-login").onclick = btnConnectClicked;



    // =============================================================================

    function addProposal() {
        const userAddr = $('#user_addr').val();
        $.get(
            "<?= base_url(); ?>admin/is_admin/" + userAddr,
            function(data) {
                if (data == 1) {
                    document.getElementById("form_add_proposal").submit();
                } else {
                    alert("You are not an admin!");
                }
            }
        );
    }

    function submitVote() {
        if (tokenAmount > 0) {
            $.get(
                "<?= base_url(); ?>proposal/is_already_vote/" + $('#proposal_id').val() + "/" + $('#user_addr').val(),
                function(data) {
                    if (data == 1) {
                        document.getElementById("modal_body").innerText = "You already vote!";
                        $('#exampleModal').modal('show');
                    } else {
                        document.getElementById("form_vote").submit();
                    }
                }
            );
        } else {
            document.getElementById("modal_body").innerText = "You don't have any SuperlativeSS!";
            $('#exampleModal').modal('show');
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>