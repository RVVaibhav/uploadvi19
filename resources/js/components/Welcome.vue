 <template>
        <div class="flex-center position-ref full-height">
            <div  v-if="user">
                <div class="user-block">
                <img v-if="user['user_details'] && user['user_details']['profile_pic']" class="img-circle" v-bind:src="'https://cutie.sgp1.digitaloceanspaces.com/'+ user['user_details']['profile_pic']"  style="border-radius: 50%;width: 50px;height: 50px;">
                <img v-if="!user['user_details']" class="img-circle" src="/img/default-avatar.png" style="border-radius: 50%;width: 50px;height: 50px;">
                    <span class="user-name">{{user['name']}}</span>
                </div>
                <!--<div class="user-block">
                    <img class="img-circle"  src="/img/default-avatar.png" style="border-radius: 50%;width: 50px;height: 50px;float:right">
                </div>-->
            </div>
        </div>
</template>
<script>
    import { serverBus } from '../app';
    export default {
        data(){
            return {
                user : null,
            }
        },
        methods: {
        },
        created() {
            serverBus.$on('openuserChat', (data) => {
                console.log(data)
                this.user = data;
            });
        }
    }
</script>
<style scoped>
    .user-block{
        position: absolute;
        top: 16px;
        padding: 5px;
        border-bottom: 1px solid #ccc;
    }
     .user-name{
        position: absolute;
        padding-left: 10px;
        font-size: 15px;
    }
</style>