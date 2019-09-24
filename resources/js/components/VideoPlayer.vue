<template>
    <div class="container">

        <div id="webdemy-player"
             style="padding:56.25% 0 0 0;position:relative;"
        >

        </div>

    </div>
</template>

<script>
    import Player from '@vimeo/player'
    export default {
        props:['video','nextVideoUrl'],
        mounted() {
            console.log('Component mounted.')

            var videoOptions = {
                id: this.video.vimeo_video_id,
                width: 500
            };
            var player = new Player('webdemy-player', videoOptions);

            player.on('ended', ()=>{
               console.log('video ended', this.nextVideoUrl);

               window.location.replace(this.nextVideoUrl)
            });



        }
    }
</script>

<style>
    iframe {
        position: absolute;
        top: 0 ;
        left: 0 ;
        width: 100% !important;
        height: 100%;
    }

</style>
