 <template>
    <div class="flex-center position-ref full-height">
        <h3>Chat List</h3>
        <input type="text"  placeholder="Search" class="search"/>
        <br>
        <div v-for="d in data">
            <div class="user-block" @click="openuserChat(d);">
                <img v-if="d['user_details'] && d['user_details']['profile_pic']" class="img-circle" v-bind:src="'https://cutie.sgp1.digitaloceanspaces.com/'+ d['user_details']['profile_pic']" style="border-radius: 50%;width: 50px;height: 50px;">
                <img v-if="!d['user_details']" class="img-circle" src="/img/default-avatar.png" style="border-radius: 50%;width: 50px;height: 50px;">
                    <span class="user-name">{{d['name']}}</span>
                     <span class="user-follow">Followers:{{d['follow_count']}}</span>
                <img class="img-circle"  src="/img/default-avatar.png" style="border-radius: 50%;width: 50px;height: 50px;float:right">
            </div>
        </div>
    </div>
</template>
<script>
    import { serverBus } from '../app';
    export default {
        props: ['data'],
        data(){
            return { 

            }
        },
        methods:{
            openuserChat(data){
                serverBus.$emit('openuserChat', data)
            }
        }
    }
</script>
<style scoped>

    .user-block{
        flex:1;
        padding: 5px;
        border-bottom: 1px solid #cccccc;
        cursor:pointer;
    }

    .search{
            background: #ccc;
        border-radius: 20px;
        width: 100%;
        height: 32px;
    }
    .user-name{
        position: absolute;
        padding-left: 10px;
        font-size: 15px;
    }
    .user-follow{
        position: absolute;
        padding-left: 10px;
        font-size: 10px;
        padding-top:30px;
    }

</style>