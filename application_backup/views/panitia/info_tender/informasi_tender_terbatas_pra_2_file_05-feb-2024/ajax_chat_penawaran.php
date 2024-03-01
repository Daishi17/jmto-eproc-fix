<script>
    $(document).ready(function() {
        $('#klik_file').click(function() {
            $('#file').toggle();
        });
    })


    $('#file').change(function() {
        var a = $('#file').val().toString().split('\\');
        $('.fake_input_dok').text(a[a.length - 1]);
        $('.nongol_dok').css("display", "block");
    });
    $('#file_img').change(function() {
        var a = $('#file_img').val().toString().split('\\');
        $('.fake_input_dok').text(a[a.length - 1]);
        $('.nongol_dok').css("display", "block");
    });

    function hapus_data_file() {
        $('[name="dokumen_chat"]').val('');
        $('[name="img_chat"]').val('');
        $('.nongol_dok').css("display", "none");
    }

    $(document).ready(function() {
        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        }); // ini Untuk Menu Pengaturan
        pesan()

        function pesan() {
            var id_penerima = $('#id_penerima').val();
            var id_rup = $('[name="id_rup"]').val();
            var id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
            $.ajax({
                type: "post",
                url: "<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'ngeload_chatnya_penawaran/') ?>" + id_rup,
                data: {
                    id_pengirim: id_pengirim,
                    id_penerima: id_penerima,
                },
                dataType: "json",
                success: function(r) {
                    var html = "";
                    var d = r.data;
                    id_pengirim = '<?= $this->session->userdata('id_pegawai') ?>';
                    d.forEach(d => {

                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today = dd + '-' + mm + '-' + yyyy;
                        // console.log(today);

                        var times = new Date(d.waktu)
                        var time = times.toLocaleTimeString()
                        var tanggal = String(times.getDate()).padStart(2, '0');
                        var bulan = String(times.getMonth() + 1).padStart(2, '0');
                        var tahun = times.getFullYear()
                        var lengkapDB = tanggal + '-' + bulan + '-' + tahun
                        // console.log(lengkapDB == today)
                        var kapan = "Today"
                        var tanggal_bulan = tanggal + "-" + bulan
                        if (lengkapDB != today) {
                            kapan = tanggal_bulan
                        }
                        // console.log(kapan)
                        if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == '') {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            } else if (d.dokumen_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.img_chat) {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.img_chat + '"><img width="100%" src="<?= base_url('file_chat/') ?>' + d.img_chat + '"></a>' +
                                    '<br>' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';

                            } else if (d.replay_tujuan) {
                                if (d.dokumen_chat == '') {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.dokumen_chat + '">' + d.dokumen_chat + '</a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.img_chat) {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<a  class="text-primary" target="_blank" href="<?= base_url('file_chat/') ?>' + d.img_chat + '"><img width="100%" src="<?= base_url('file_chat/') ?>' + d.img_chat + '"></a>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                } else {
                                    html += '<div class="d-flex justify-content-end mb-4">' +
                                        '<div class="msg_cotainer_send">' +
                                        '<div class="bs-callout bs-callout-info">' +
                                        'Membalas Chat :' +
                                        '' + d.replay_isi + '' +
                                        '</div>' +
                                        '<br>' + d.isi + '' +
                                        '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                        '</div>' +
                                        '</div>';
                                }

                            } else {
                                html += '<div class="d-flex justify-content-end mb-4">' +
                                    '<div class="msg_cotainer_send">' +
                                    '' + d.isi + '' +
                                    '<span class="msg_time">' + kapan + ',' + time + '</span>' +
                                    '</div>' +
                                    '</div>';
                            }
                        } else if (parseInt(d.id_pengirim) == id_pengirim) {
                            if (d.dokumen_chat == null) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
                            } else if (d.dokumen_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="<?= base_url('/file_chat/') ?>${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
                            } else if (d.img_chat) {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100%" src="<?= base_url('file_chat/') ?>${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
                            } else {
                                html += `<label class="badge badge-primary ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/test1.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}	</span>
                        </div>
                      
                     </div>`;
                            }
                        } else {
                            if (d.nama_pegawai) {
                                if (d.dokumen_chat == null) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div> </div>`;
                                } else if (d.dokumen_chat) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
                                } else if (d.img_chat) {
                                    html += `<label class="badge badge-danger ml-5" >Panitia</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100%" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
                                } else {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/img/proc.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">reply</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                }
                            } else {
                                if (d.dokumen_chat == null) {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">reply</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                } else if (d.dokumen_chat) {
                                    html += `<label class="badge badge-danger ml-5" >${d.nama_usaha}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
                        <a href="https://vms.jmtm.co.id/file_chat/${d.dokumen_chat}"> ${d.dokumen_chat}</a> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                     </div>`;
                                } else if (d.img_chat) {
                                    html += `<label class="badge badge-danger ml-5" >${d.nama_usaha}</label><div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                        <img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">
                        </div>
                        <div class="msg_cotainer">
								<img width="100%" src="https://vms.jmtm.co.id/file_chat/${d.img_chat}"> <br>
                           ${d.isi}								
                           <span class="msg_time">${kapan}, ${time}  	</span>
                        </div>
                      
                     </div>`;
                                } else {
                                    html += '<label class="badge badge-danger ml-5" >' + d.nama_usaha + '</label><div class="d-flex justify-content-start mb-4">' +
                                        '<div class="img_cont_msg">' +
                                        '<img src="<?= base_url('assets/vendor.png') ?>" alt="" class="rounded-circle user_img_msg">' +
                                        '</div>' +
                                        '<div class="msg_cotainer">' +
                                        '' + d.isi + '' +
                                        '<span class="msg_time">' +
                                        '' + kapan + '' +
                                        '' + time + '' +
                                        '<a onclick="Replay(' + "'" + d.id_pengirim + "','" + d.isi + "','" + d.nama_usaha + "'" + ')" href="javascript:;" class="badge badge-sm badge-warning">reply</a>	</span>' +
                                        '</div>' +
                                        '</div>';
                                }
                            }

                        }
                        // notifikasis
                    });
                    // console.log(html)
                    $('#letakpesan').html(html);

                }
            });

        }
        setInterval(() => {
            pesan()
        }, 1000);
        var form_penjelasan_lelang = $('#form_keuangan_add');
        $('#form_keuangan_add').on('submit', function(e) {
            e.preventDefault();
            var isi = $('[name="isi"]').val()
            var id_rup = $('[name="id_rup"]').val()
            $.ajax({
                type: "post",
                url: "<?= base_url('panitia/info_tender/' . $root_jadwal . '/' . 'kirim_pesanya_penawaran/') ?>" + id_rup,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(r) {
                    form_penjelasan_lelang[0].reset();
                    $('.replay_orang').hide();
                    $('[name="replay_tujuan"]').val('');
                    $('[name="replay_isi"]').val('');
                    if (r.status) {
                        $('.search_btn').trigger('click');
                        $('[name="dokumen_chat"]').val('');
                        $('[name="img_chat"]').val('');
                        $('.nongol_dok').css("display", "none");
                        isi.val('');
                        scrollToBottom()
                    }

                }
            });
        });
        scrollToBottom()

        function scrollToBottom() {
            $("#letakpesan").animate({
                scrollToBottom: 0
            }, "slow");

        }
    });

    function Replay(pengirim, isi, usaha) {
        $('.replay_orang').css('display', 'block');
        $('[name="replay_tujuan"]').val(usaha);
        $('[name="replay_isi"]').val(isi);
        $('#nama_usaha_replay').html(usaha)
        $('#replay_tujuan_terlihat').html(isi)
    }

    function hapus_replay() {
        $('.replay_orang').css('display', 'none');
        $('[name="replay_tujuan"]').val('');
        $('[name="replay_isi"]').val('');
        $('#nama_usaha_replay').html('')
        $('#replay_tujuan_terlihat').html('')
    }
</script>