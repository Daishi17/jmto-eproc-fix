<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header border-dark bd-blue-700">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fa-solid fa-user px-1"></i>
                            <small><strong>User Setting</strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <style>
                        figure {
                            width: 500px;
                            aspect-ratio: 8 / 5;
                            --bg: hsl(330 80% calc(90% - (var(--hover) * 10%)));
                            --accent: hsl(280 80% 40%);
                            transition: background 0.2s;
                            margin: 0;
                            position: relative;
                            overflow: hidden;
                            border-radius: 1.5rem;
                        }

                        figure:after {
                            content: "";
                            position: absolute;
                            width: 20%;
                            aspect-ratio: 1;
                            border-radius: 50%;
                            bottom: 0%;
                            left: 10%;
                            filter: blur(25px);
                            transform:
                                translateX(calc(var(--hover) * 15%)) scale(calc(1 + (var(--hover) * 0.2)));
                            transition: transform 0.2s, background 0.2s;
                        }

                        .img2 {
                            position: absolute;
                            top: 12%;
                            left: 10%;
                            width: 70%;
                            transform:
                                translateX(calc(var(--hover) * -15%)) scale(calc(1 + (var(--hover) * 0.2)));
                            transition: transform 0.2s;
                        }

                        article {
                            --hover: 0;
                        }

                        article:hover {
                            --hover: 1;
                        }

                        .mainDiv {
                            display: flex;
                            min-height: 100%;
                            align-items: center;
                            justify-content: center;
                            background-color: #f9f9f9;
                            font-family: 'Open Sans', sans-serif;
                        }

                        .cardStyle {
                            width: 700px;
                            border-color: white;
                            background: #fff;
                            padding: 36px 0;
                            border-radius: 4px;
                            margin: 30px 0;
                            box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
                        }

                        #signupLogo {
                            width: 100px;
                        }

                        .formTitle {
                            font-weight: 600;
                            margin-top: 20px;
                            color: #2F2D3B;
                            text-align: center;
                        }

                        .inputLabel {
                            font-size: 12px;
                            color: #555;
                            margin-bottom: 6px;
                            margin-top: 24px;
                        }

                        .inputDiv {
                            width: 70%;
                            display: flex;
                            flex-direction: column;
                            margin: auto;
                        }

                        input {
                            height: 40px;
                            font-size: 16px;
                            border-radius: 4px;
                            border: none;
                            border: solid 1px #ccc;
                            padding: 0 11px;
                        }

                        input:disabled {
                            cursor: not-allowed;
                            border: solid 1px #eee;
                        }

                        .buttonWrapper {
                            margin-top: 40px;
                        }

                        .submitButton {
                            width: 70%;
                            height: 40px;
                            margin: auto;
                            display: block;
                            color: #fff;
                            background-color: #065492;
                            border-color: #065492;
                            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
                            box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
                            border-radius: 4px;
                            font-size: 14px;
                            cursor: pointer;
                        }

                        .submitButton:disabled,
                        button[disabled] {
                            border: 1px solid #cccccc;
                            background-color: #cccccc;
                            color: #666666;
                        }


                        @keyframes spin {
                            0% {
                                transform: rotate(0deg);
                            }

                            100% {
                                transform: rotate(360deg);
                            }
                        }
                    </style>
                    <article>
                        <div class="row">
                            <div class="col-md-4">
                                <figure>
                                    <img class="img2" src="https://img.freepik.com/free-vector/reset-password-concept-illustration_114360-7866.jpg" alt="">
                                </figure>
                            </div>
                            <div class="col-md-3">
                                <div class="mainDiv">
                                    <div class="cardStyle" style="padding: 10px;">
                                        <?php if ($this->session->flashdata('message')) { ?>
                                            <?= $this->session->flashdata('message'); ?>
                                        <?php } ?>
                                        <form action="<?= base_url('user_setting/ubah_password_panitia') ?>" method="post">
                                            <div class="inputDiv">
                                                <label class="inputLabel" for="password">New Password</label>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <input type="password" id="password" name="password" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" class="btn btn-secondary" onclick="myFunction1()" style="margin-left: 20px;"> <i class="fas fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="inputDiv">
                                                <div class="row">
                                                    <label class="inputLabel" for="confirmPassword">Confirm Password</label>
                                                    <div class="col-md-10">
                                                        <input type="password" id="confirmPassword" name="confirmPassword">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" class="btn btn-secondary" onclick="myFunction2()" style="margin-left: 20px;"> <i class="fas fa fa-eye"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttonWrapper">
                                                <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary">
                                                    <span>Continue</span>
                                                    <span id="loader"></span>
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div style="padding: 20px;background-color: LightGray;border-radius:20px">
                                    <label for="" style="font-size: 30px;">Saran:</label> <br>
                                    1. Panjang password sebaiknya minimal 8 karakter <br>
                                    2. Terdiri atas kombinasi huruf, angka dan symbol <br><br>
                                    Misal: kintek!#
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</main>