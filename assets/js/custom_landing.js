$(document).ready(function() {
    $('.table_berita').DataTable();
});
$('.jarallax').jarallax({
    videoVolume: 1000,
    onInit: function() {
        var self = this;
        var video = self.video;
        video.unmute();
    }
});

function hidupkan() {
    $('.jarallax').jarallax({
        videoVolume: 1000,
        onInit: function() {
            var self = this;
            var video = self.video;
            video.unmute();
        }
    });
    $('#video1').hide()
    $('#video2').show()
}

function matikan() {
    location.reload('<?= base_url() ?>')
}