 <template>
    <div class="flex-center position-ref full-height">
        <input type="text" class="search" placeholder="Username Search"/>
        <br>
        <div v-for="d in data">
            <div class="user-block" @click="openuserChat(d);">
                <img class="img-circle" src="/img/default-avatar.png" style="border-radius: 50%;width: 50px;height: 50px;">
                    <span class="user-name">
                        {{d['name']}} 
                    </span>
                    <span style="float:right">100k|Female</span>
                    <span class="user-follow">Assing Chat|Audio|Video</span>
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