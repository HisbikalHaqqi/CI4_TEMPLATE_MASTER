<?php 
if(isset($_SERVER['HTTP_USER_AGENT'])){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6')!==FALSE || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7')!==FALSE || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8')!==FALSE){
		echo view('errors/error_browser');
		die();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?= base_url('assets/vendor/swal/swal.min.js');?>"></script>

    <script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery.form.js');?>"></script> 
</head>
<style>
    body{
        background-image: url("/assets/image/background.svg");
        background-size:cover;
        background-repeat:no-repeat;
    }
    #banner{
        width:100px;
    }
    hr{
        border:0.2rem solid #1a41eb;
        width:20rem;
    }
    .captcha{
        text-align: center;
        height: 50px;
        background-image: url(<?= base_url('assets/image/captchaBg.jpeg')?>)
    }
    .captcha img{
        height: 50px;
    }
</style>
<body>
    <div id="ajax-loader"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 left">
                <div class="d-flex justify-content-xl-between">
                    <img src="/assets/image/bri.png" id="banner">
                    <h4 class="pt-4 text-white"><?= getEnv('app.name');?></h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12 mt-xl-2">
                <div class="box-wrapper bg-white p-5">
                    <h2>Login</h2>
                    <p class="fs-5">Selamat Datang Kembali, harap login dengan akun kamu</p>
                    <hr>
                    <?php
                        $attributes = ['class' => 'form-login','id' => 'form-login'];
                        echo form_open('',$attributes);
                    ?>
                    <div class="mb-3">
                        <?php
                            $email = [
                                'name'      => 'pernr',
                                'id'        => 'pernr',
                                'value'     => '',
                                'maxlength' => '12',
                                'class'     => 'form-control trim required',
                                'autocomplete'	=> 'off',
                                'rel'       => 'Personal Number'
                            ];
                            echo form_label('Personal Number',$email['id']);
                            echo form_input($email);
                        ?>
                        <span id="span_err_msg_pernr" class="err_input"></span>
                    </div>
                    <div class="mb-3">
                        <?php
                            $password = [
                                'name'      => 'password',
                                'id'        => 'password',
                                'value'     => '',
                                'maxlength' => '12',
                                'class'     => 'form-control trim required',
                                'autocomplete'	=> 'off',
                                'rel'       => 'Password'
                              
                            ];
                            echo form_label('Password',$email['id']);
                            echo form_password($password);
                        ?>
                        <div id="span_err_msg_password" class="err_input"></div>
                    </div>
                    <div class="mb-3">
                        <div class="col captcha">
							<img id="captchaImg" src="<?= base_url('uploads/captcha.png')?>">
						</div>
                    </div>
                    <div class="mb-3">
                        <?php
                            $password = [
                                'name'      => 'captcha',
                                'id'        => 'captcha',
                                'value'     => '',
                                'maxlength' => '12',
                                'class'     => 'form-control trim required',
                                'autocomplete'	=> 'off',
                                'rel'       => 'Captcha'
                            ];
                            echo form_label('Captcha',$email['id']);
                            echo form_password($password);
                        ?>
                        <div id="span_err_msg_captcha" class="err_input"></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid gap-2">
                            <?php
                                $button = [
                                    'name'      => 'btn-login',
                                    'id'        => 'btn-login',
                                    'value'     => 'true',
                                    'type'      => 'submit',
                                    'content'   => 'Login',
                                    'class'     => 'btn btn-primary',
                                ];
                                echo form_button($button);
                            ?>
                        </div>
                    </div>
                    <?= form_close();?>
                   
                </div>
            </div>
        </div>
        <div class="position-absolute bottom-0 end-0 pr-2">
            <p class="fs-6 text-white"><?= getEnv('app.name');?></p>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#form-login').on('submit',function(e){
            e.preventDefault();
            var error = false;
            error     = $(this).formValidation(error);

            if(!error){
                $('#ajax-loader').show();
                $('#btn-login').prop('disabled',true);
                var form_data = new FormData($(this)[0]);

                $.ajax({
                    type        : 'POST',
                    url         : '<?= base_url('user/login');?>',
                    data        : form_data,
                    processData : false,
                    contentType : false,
                    error       : function(){
                        swalNotif("Gagal request data",error);
                    },
                    success:function(data){
                        var res = JSON.parse(data);
                        if(res.msg != ''){
                            $('#ajax-loader').hide();
                            $('#btn-login').prop('disabled',false);
                            swalNotif(res.msg);

                            var src = $('#captchaImg').attr('src');
                            $('#captchaImg').attr('src',src+'?12');
                        }
                        else{
                            window.location.href = res.url;
                        }
                    }

                })
            }
        });

        $('html').bind('contextmenu',function(e){
            return false;
        })

        $.fn.formValidation = function(error){
            var arrErr = [];
            $('.trim',this).each(function(item){
                $(this).val($.trim($(this).val()));
            });
            $('.required', this).each(function(item){
                if($(this).is('input') || $(this).is('select') || $(this).is('textarea')){
                    if($(this).val() == ''){
                        if(!error){
                                $(this).focus();
                            }
                            error = true;
                            arrErr.push($(this).attr('id'));
                            $('#span_err_msg_'+$(this).attr('id')).html($(this).attr('rel')+' harus diisi.');
                            $('#span_err_msg_'+$(this).attr('id')).addClass('text-danger fst-italic fs-6 fw-light');
                        }else{
                            $('#span_err_msg_'+$(this).attr('id')).html('');
                            $('#span_err_msg_'+$(this).attr('id')).addClass('text-danger fst-italic fs-6 fw-light');
                        }
                    }else{
                        $('#span_err_msg_'+$(this).attr('id')).html('');
                        $('#span_err_msg_'+$(this).attr('id')).addClass('text-danger fst-italic fs-6 fw-light');
                    }
                   
            });
            return error;
        }
    });

    function swalNotif(message, type){
        switch(type){
            case 'success':
            case 'error':
                let timerInterval
                Swal.fire({
                    icon:'error',
                    title: message,
                    timer: 2000,
                    showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
                break;
            case 'confirmation':
                Swal.fire({
                    title: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    })
                break;
            default:
                break;
        }
    }
</script>
</html>
